<?php

class MGeneric extends CI_Model {
	var $table;					//Nombre de la tabla primaria
	var $indexable = array();	//Array de campos sobre los que se indexa para las busquedas
	var $langTable;				//Nombre de la tabla de idioma, en caso de que corresponda
	var $langFields = array();	//Array de campos que son multiidioma
	var $langDefault = 'es';	//Idioma por defecto de los campos multiidioma de la tabla
	var $fk;					//Nombre de la foreign key en tablas que referencian a la tabla primaria
	var $filters = '';			//Array de filtros a usar para obtener los listados
	var $pk;
	
	public function __construct(){
		parent::__construct();
	}

	public function getAll($num=100000, $offset=0, $sort='', $type='DESC', $keywords='') {
		if ($sort == '') $sort=$this->pk;
		
		$this->onGetAll();
		
		if ($keywords != '') {
			$q = "(1=0";
			foreach ($this->indexable as $index)
				$q .= " OR " .(strpos($index, ".")?$index:($this->table.".".$index)) . " LIKE '%" . $keywords . "%'";
			//$this->db->or_like($index, $keywords);
			$q .= ")";
			$this->db->where($q);
		}
		
		if ($this->filters != '')
			$this->db->where($this->filters);
				
		if ($sort != '')
			$query = $this->db->order_by($sort, $type)->get($this->table, $num, $offset);	
		else 
			$query = $this->db->get($this->table, $num, $offset);	
		
		//echo $this->db->last_query();
		
		return $query;
	}

	/*
	public function get($id) {
		$query = $this->db->get_where($this->table, array('id' => $id));
		return $query;
	}
	*/
	public function get($id) {
		$this->db->select($this->table . '.* ');
		$this->onGet();
		$query = $this->db->get_where($this->table, array($this->table . '.' . $this->pk => $id));
		return $query;
	}	

	/*
	public function update($id, $data) {
		foreach ($data as $key=>$value) {
			if ($this->db->field_exists($key, $this->table))
				$finalData[$key] = $value;
		}
				
		$this->db->where('id', $id);
		$this->db->update($this->table, $finalData); 
	}
	*/
	
	public function onGetAll() {
	}
	public function onGet() {
	}
	
	public function update($id, $data) {
		#$this->db->query("SET time_zone = '-06:00'"); //Set timezone de Mexico

		//Actualizar los datos del artista
		$finalData = array();
		foreach ($data as $key=>$value) {
			if ($this->db->field_exists($key, $this->table))
				$finalData[$key] = $value;
		}
		//Insertar los campos localizados pero para el idioma por default
		foreach ($this->langFields as $langField) {
			$finalData[$langField] = $data[$langField . '_' . $this->langDefault];
		}
		$this->db->where($this->pk, $id);
		$this->db->update($this->table, $finalData);
		
		//Actualizar datos de idioma
		if (count($this->langFields)) {
			foreach ($this->config->item('languages') as $lang) {
				$langData['idioma'] = $lang;
				foreach ($this->langFields as $langField) 
					$langData[$langField] = $data[$langField . '_' . $lang];
				$this->db->where($this->fk, $id);
				$this->db->where('idioma', $lang);
				$this->db->update($this->langTable, $langData);
			}
		}		
	}	

	/*
	public function insert($data) {
		foreach ($data as $key=>$value) {
			if ($this->db->field_exists($key, $this->table))
				$finalData[$key] = $value;
		}
				
		$this->db->insert($this->table, $finalData); 
		return $this->db->insert_id();
	}
	*/
	public function insert($data) {	
		//$this->db->query("SET time_zone = '-06:00'"); //Set timezone de Mexico
		
		foreach ($data as $key=>$value) {
			if ($this->db->field_exists($key, $this->table))
				$finalData[$key] = $value;
		}
		
		//Insertar los campos localizados pero para el idioma por default
		foreach ($this->langFields as $langField) {
			$finalData[$langField] = $data[$langField . '_' . $this->langDefault];
		}
		$this->db->insert($this->table, $finalData); 
		$id = $this->db->insert_id();
		$data[$this->pk] = $id;
		
		//Insertar datos de idioma
		if (count($this->langFields)) {
			foreach ($this->config->item('languages') as $lang) {
				$langData[$this->fk] = $id;
				$langData['idioma'] = $lang;
				foreach ($this->langFields as $langField)
					$langData[$langField] = $data[$langField . '_' . $lang];
				$this->db->insert($this->langTable, $langData);
			}			
		}
		
		return $id;
	}
	

	public function deleteWhere($arr_fields) {
		$this->db->where($arr_fields);
		$this->db->delete($this->table); 
	}

	public function delete($id) {
		$this->db->where(array('id'=>$id));
		$this->db->delete($this->table); 
	}

	public function totalRows() {
    	return $this->db->query('select count(*) as total from '.$this->table)->row()->total;
    }


	public function count($keywords = '') {
		$this->onGetAll();
		
		if ($keywords != '') {
			$q = "(1=0";
			foreach ($this->indexable as $index)
				$q .= " OR " . $index . " LIKE '%" . $keywords . "%'";
			//$this->db->or_like($index, $keywords);
			$q .= ")";
			$this->db->where($q);
		}

		if ($this->filters != '')
			$this->db->where($this->filters);
		
		return $this->db->count_all_results($this->table);
	}

	public function countWhere($arr_fields){
		$this->db->where($arr_fields);
		return $this->db->count_all_results($this->table);
	}
	
	public function getWhere($arr_fields){
		$this->db->where($arr_fields);
		return $this->db->get($this->table);
	}
	
	public function getByName($name){
		$q = "select * from ".$this->table." where nombre like '%" . $name . "%'  COLLATE 'utf8_general_ci'";
		$data = $this->db->query($q);
		return $data;
	}	
    
    //funcion que modifica la url concatenandole el id al final
    function modificarURL($id){
        $this->db->select('url');
        $row = $this->db->get_where($this->table,array('id'=>$id))->row();
        
        $info = pathinfo($row->url);
        if(isset($info['extension']) && $info['extension']){
            $extension = '.' .$info['extension'];
        }else{
            $extension = '';
        }
        $row->url =  basename($row->url,$extension);
        
        //si la url ya tiene el id no hace el update
        if(strstr($row->url, '-'.$id)){
            
        }else{
            $this->db->where('id', $id);
            $this->db->update($this->table, array('url' => $row->url . '-' . $id . $extension));     
        }
        
    }
	
	public function getList($filters='', $orderby='', $pager='') {
		parse_str($filters, $parameters);
		parse_str($pager, $pagerinfo);
		if ($orderby) {
			$this->db->order_by($orderby);
		}
		if ($pagerinfo) {
			if ($pagerinfo['limit']) $this->db->limit($pagerinfo['limit']);
			if ($pagerinfo['offset']) $this->db->offset($pagerinfo['offset']);
		}
		return $this->db->get_where($this->table, $parameters)->result();
	}
	
	public function getBy($filters) {
		parse_str($filters, $parameters);
		return $this->db->get_where($this->table, $parameters)->row();
	}

	public function countBy($filters) {
		parse_str($filters, $parameters);
		$this->db->where($parameters);
		return $this->db->count_all_results($this->table);
	}
	
	public function update_batch($data) {
		return $this->db->update_batch($this->table, $data, 'id');
	}
	
}