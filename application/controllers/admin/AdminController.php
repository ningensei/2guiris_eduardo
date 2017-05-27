<?php
class AdminController extends MY_Controller {

    // --------------------------------------------------------------------

    /**
     * __construct()
     *
     * Class    Constructor PHP 5+ - not need if not setting things
     *
     * @access    public
     * @return    void
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->config('admin');

        $this->data['languages'] = $this->config->item('languages');
		$this->data['appName'] = $this->config->item('appName');
		$this->data['version'] = $this->config->item('appVersion');
		$this->data['currentSection'] = ($_SERVER['HTTP_HOST'] == 'lab.id4you.com') ? $this->uri->segment(3) : $this->uri->segment(2);
		$this->data['currentModule'] = "";
		$this->pageSegment = 0;
        $this->limit = 20;        
		
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('admin');
		
		$this->is_admin = TRUE;
		// Configuracion por defecto de uploads
		$this->uploadsFolder = './uploads/';
		$this->uploadsMIME = 'gif|jpg|png|swf';
		$this->uploads = array();
				
		$this->breadcrumbs = array();
		
        //Carga de módulos
		$this->data['modules'] = array(

			array(
				"label"		=>	"admins",
				"name"		=>	"<i class='glyphicon glyphicon-user'></i> Administradores",
				"url"		=>	"admins",
			),

			array(
				"label"		=>	"catalogo",
				"name"		=>	"<i style='font-size: 20px;' class='fa fa-table' aria-hidden='true'></i>Catálogo",
				"url"		=>	"#",
				"sections"	=>	array(
									array(
										"label"		=>	"composiciones",
										"name"		=>	"<i style='font-size: 20px;' class='fa fa-headphones' aria-hidden='true'></i> Listado de composiciones",
										"url"		=>	"composiciones"
									),
									array(
										"label"		=>	"audios",
										"name"		=>	"<i style='font-size: 20px;' class='fa fa-headphones' aria-hidden='true'></i> Audios",
										"url"		=>	"audios"
									),
									array(
										"label"		=>	"videos",
										"name"		=>	"<i style='font-size: 20px;' class='fa fa-video-camera' aria-hidden='true'></i> Videos",
										"url"		=>	"videos"
									),
									array(
										"label"		=>	"partituras",
										"name"		=>	"<i style='font-size: 20px;' class='fa fa-music' aria-hidden='true'></i> Partituras",
										"url"		=>	"partituras"
									),
								)
			),

			array(
				"label"		=>	"biografia",
				"name"		=>	"<i style='font-size: 20px;' class='fa fa-book' aria-hidden='true'></i> Biografía",
				"url"		=>	"#",
				"sections"	=>	array(
									array(
										"label"		=>	"distinciones",
										"name"		=>	"Distinciones",
										"url"		=>	"distinciones"
									),
									array(
										"label"		=>	"enlaces",
										"name"		=>	"Enlaces de Interés",
										"url"		=>	"enlaces"
									),
								)
			),
			
			array(
				"label"		=>	"novedades",
				"name"		=>	"<i style='font-size: 20px;' class='fa fa-file-text-o' aria-hidden='true'></i> Novedades",
				"url"		=>	"novedades",
			),

			array(
				"label"		=>	"textos",
				"name"		=>	"<i style='font-size: 20px;' class='fa fa-font' aria-hidden='true'></i>Textos",
				"url"		=>	"#",
				"sections"	=>	array(
									array(
										"label"		=>	"tesis",
										"name"		=>	"Tesis - Info",
										"url"		=>	"tesis"
									),
									array(
										"label"		=>	"tesis_archivos",
										"name"		=>	"Tesis - Archivos",
										"url"		=>	"tesis_archivos"
									),
									array(
										"label"		=>	"otros",
										"name"		=>	"Otros",
										"url"		=>	"otros"
									),
								)
			),

			array(
				"label"		=>	"imagenes",
				"name"		=>	"<i style='font-size: 18px;' class='fa fa-picture-o' aria-hidden='true'></i> Imágenes",
				"url"		=>	"imagenes",
			),

			array(
				"label"		=>	"contacto",
				"name"		=>	"<i style='font-size: 18px;' class='fa fa-info' aria-hidden='true'></i> Info de Contacto",
				"url"		=>	"contacto",
			),

			array(
				"label"		=>	"contactos",
				"name"		=>	"<i style='font-size: 18px;' class='fa fa-comment-o' aria-hidden='true'></i> Contactos",
				"url"		=>	"contactos",
			),

			array(
				"label"		=>	"visitas",
				"name"		=>	"<i style='font-size: 18px;' class='fa fa-eye' aria-hidden='true'></i> Visitas",
				"url"		=>	"visitas",
			),

		);		
		
		foreach ($this->data['modules'] as $module) {
			$currentModule = $module['url'];
			if (isset($module['sections'])) {
				foreach ($module['sections'] as $section) {
					if ($this->data['currentSection'] == $section['url']) {
						$this->data['currentModule'] = $currentModule;
						break;
					}
				}
			}
		}
			
		//Controller memory
		if ($this->router->method == 'index') {
			if ($this->session->userdata('owner') == $this->router->class) {
				if (count($_POST)) {
					$this->session->set_userdata('search', $_POST);
				}
				else {
					if ($this->session->userdata('search')) {
						$_POST = array_merge($_POST, $this->session->userdata('search'));
					}
					$this->session->set_userdata('search', $_POST);
				}
			}
			else {
				$this->session->unset_userdata('search');
			}
			$this->session->set_userdata('owner', $this->router->class);
		}
				
		//Destroy session data
		if (!isset($_POST['sort']) && !isset($_POST['keywords']) && !$this->uri->segment($this->pageSegment-1)) { //Look for index segment
			$this->session->unset_userdata('sort');
			$this->session->unset_userdata('sortType');
			$this->session->unset_userdata('keywords');
		}

		//Sort for listings
		if (isset($_POST['sort'])) {
			$this->session->set_userdata('sort', $_POST['sort']);
			$this->session->set_userdata('sortType', $_POST['sortType']);
		}
		if ($this->session->userdata('sort')) {
			$sort = $this->session->userdata('sort');
			$sortType = $this->session->userdata('sortType');
			$this->data['sort'] = $sort;
			$this->data['sortType'] = $sortType;
		} else {
			$this->data['sort'] = "";
			$this->data['sortType'] = "";
		}

		//Filters
		if (isset($_POST['keywords'])) {
			$this->session->set_userdata('keywords', $_POST['keywords']);
		}
		if ($this->session->userdata('keywords')) {
			$this->data['keywords'] = $this->session->userdata('keywords');
		} else {
			$this->data['keywords'] = "";
		}
		
		//si no esta iniciada la sesion redirijo al login
		if( !$this->session->userdata('admin_id') ){
			redirect(site_url('admin/login'));
			exit();
		}
    }
    
    function reset(){
		$this->session->unset_userdata('keywords');
		$this->data['keywords'] = "";
		redirect(site_url('admin/'.$this->page));
	}
	
	function initDates() {
		if (!empty($_POST['from']) && !empty($_POST['to'])) {
			$from_date = strtotime($_POST['from']);
			$to_date = strtotime($_POST['to']);
		}
		elseif ($this->session->userdata('from') && $this->session->userdata('to')) {
			$from = $this->session->userdata('from');
			$to = $this->session->userdata('to');
			$from_date = strtotime($from['ymd']);
			$to_date = strtotime($to['ymd']);
		}
		else {
			$from_date = mktime(0, 0, 0, date('m')-1, date('d'), date('Y'));
			$to_date = time();
		}

		$from = array('ymd' => date('Y-m-d', $from_date), 'year' => date('Y', $from_date), 'month' => date('m', $from_date), 'day' => date('d', $from_date));
		$to = array('ymd' => date('Y-m-d', $to_date), 'year' => date('Y', $to_date), 'month' => date('m', $to_date), 'day' => date('d', $to_date));
	
		$this->session->set_userdata('from', $from);
		$this->session->set_userdata('to', $to);

		$this->data['from'] = $from;
		$this->data['to'] = $to;
	}	
	
	function init(){	
        $this->initDates();
		$this->loadPagination();
		$this->data['header'] = $this->load->view('admin/header', $this->data, true);
		$this->data['footer'] = $this->load->view('admin/footer', $this->data, true);				
		if (isset($this->data['page_title'])) {
			$this->breadcrumbs[] = "<a href='".$this->data['route']."'>".$this->data['page_title']."</a>";
		}
	}
	
	function index(){
		//Pagination
		$this->pconfig['total_rows'] = $this->model->count($this->data['keywords']);
		$this->pconfig['uri_segment'] = $this->pageSegment;
		$this->pagination->initialize($this->pconfig);		
		$this->data['pages'] = $this->pagination->create_links();
		$this->data['totalRows'] = $this->pconfig['total_rows'];
		
		$this->data['sort'] = ($this->data['sort']) ? $this->data['sort'] : ((isset($this->model) && isset($this->model->defaultSort))?$this->model->defaultSort:"") ;
		$this->data['sortType'] = ($this->data['sortType']) ? $this->data['sortType'] : ((isset($this->model) && isset($this->model->defaultSortType))?$this->model->defaultSortType:"") ;
		
		$this->data['data'] = $this->model->getAll($this->pconfig['per_page'],$this->uri->segment($this->pconfig['uri_segment']), $this->data['sort'], isset($this->data['sortType'])?$this->data['sortType']:'desc', $this->data['keywords']);
        $this->data['saved'] = isset($_GET['saved'])?$_GET['saved']:'';
		$this->load->view('admin/' . $this->page, $this->data);
    }
    

	function add() {
		$this->onBeforeEdit('');
		$this->breadcrumbs[] = "Nuevo";
		
		$this->data['row'] = '';
		
		$this->onEditReady('');
		$this->load->view('admin/' . $this->page . '_form', $this->data);
	}

	function edit($id) {
		$this->onBeforeEdit($id);

		//Get data
		$results = $this->model->get($id);

		foreach ($results->result() as $row)
			$this->data['row'] = $row;
        
		$this->onEditReady($id);
		
		$this->load->view('admin/' . $this->page . '_form', $this->data);
	}

	function config($id) {
		$this->onBeforeEdit($id);

		//Get data
		$results = $this->model->get($id);
		foreach ($results->result() as $row)
			$this->data['row'] = $row;
		$this->data['data'] = $this->model->getAll(100, 0);
			
		$this->load->view('admin/' . $this->page . '_config', $this->data);
	}

	function photos($id) {
		//Get fotos
		$results = $this->modelPhoto->getAll($id)->result();
		$this->data['results'] = $results;			
		$this->data['id'] = $id;			
		$this->load->view('admin/' . $this->page . '_fotos', $this->data);
	}

	function delete($id) {
		$this->onBeforeDelete($id);
		
		$this->model->delete($id);
		
		if (count($this->uploads)>0) {
			foreach ($this->uploads as $upload) {
				if (isset($upload['resizes'])){
					foreach ($upload['resizes'] as $resize) {
						unlink(realpath($this->uploadsFolder . $id . '_' . $resize['suffix'] . '.jpg'));
					}
				}
				
				if( file_exists('.' . $upload['folder'] . $id . '/' . $upload['prefix'] . $id . '.jpg') ){
					unlink('.' .$upload['folder'] . $id . '/' . $upload['prefix'] . $id . '.jpg');
				}
			}
			
			rmdir('.' . $upload['folder'] . $id . '/');
		}

		$this->onAfterDelete($id);

		redirect(site_url('admin/'.$this->page));
	}
	
	function onBeforeEdit($id="") {
	}
	
	function onEditReady($id="") {
	}
	
	function onBeforeSave(){
	}
	
    function onBeforeUpload($upload_path){
    }
    
	function onAfterSave($id) {
	}
	
	function onBeforeDelete($id) {
	}
	
	function onAfterDelete($id) {
	}
	
	function save() {
		extract($_POST);
		
		
		$this->onBeforeSave();		

		if ($this->validate && $this->form_validation->run() == FALSE) {
			$this->data['errorsFound'] = TRUE;

			if ($_POST['id'] != '')
				$this->edit($_POST['id']);
			else
				$this->add();
			return;
		}	

		foreach ($_POST as $key=>$value){			
			$data[$key] = $value;
		}

		//Delete files marked for deletion
		foreach ($this->uploads as $upload) {
            if(isset($_POST['delete_' . $upload['name']])){
                if ($_POST['delete_' . $upload['name']] == '1')
				    $data[$upload['name']] = "";
            }
		}
		
		if (isset($id) && $id != '')
			$this->model->update($id, $data); 
		else
			$id = $this->model->insert($data);

		//File uploads
		if (count($_FILES)>0) {
			$config['upload_path'] = $this->uploadsFolder;
			$config['allowed_types'] = $this->uploadsMIME;
			$config['max_size']	= '10000000';
			$this->load->library('upload', $config);

			//carpeta uploads
			if(!is_dir($this->uploadsFolder))
				mkdir($this->uploadsFolder,0777);
					
			foreach ($this->uploads as $upload) {
			
				$config['allowed_types'] = $upload['allowed_types'];
				$config['max_size']	= $upload['maxsize'];
				$config['upload_path'] = "." . $upload['folder'] . $id. '/';
			
				//1er nivel dentro de carpeta uploads
				if(!is_dir("." . $upload['folder']))
					mkdir("." . $upload['folder']);
			
				//2do nivel dentro de carpeta uploads
				if(!is_dir($config['upload_path'])) {
					mkdir($config['upload_path'], 0777);
				}
			
				$this->upload->initialize($config);
			
                $this->onBeforeUpload($config['upload_path']);
				if ($this->upload->do_upload($upload['name'])) {
					
                    $data = $this->upload->data();
					
					//Image resizes
					if (isset($upload['resizes'])) {
						
						$this->load->library('image_lib');
						foreach ($upload['resizes'] as $resize) {
							$config['image_library'] = 'gd2';
							$config['maintain_ratio'] = TRUE;
							$config['source_image']	= $config['upload_path'] . $data['file_name'];
							$config['width'] = $resize['width'];
							$config['height'] = $resize['height'];
							$config['new_image'] = $resize['prefix'] . $id . $resize['suffix'] . '.'.$data['file_ext'];
							$newname = $config['new_image'];
							$this->image_lib->initialize($config); 
							$this->image_lib->resize();							
						}
					}
				
					//Keep original?
					if ($upload['keep']) {
						$newname = $upload['prefix'] . $id . (isset($upload['suffix'])?$upload['suffix']:'' ). $data['file_ext'];						
						rename($config['upload_path'] . $data['file_name'], $config['upload_path'] . $newname);
					}
					else
						unlink($config['upload_path'] . $data['file_name']);
					
					//Save filenames in database
					$uploadsdata[$upload['name']] = $newname;
					$this->model->update($id, $uploadsdata); 
					$this->uploadsdata = $uploadsdata;
					
				} else {
					
					//echo $this->upload->display_errors();
				}
				
			}
		}

		$this->onAfterSave($id);
        
		//header("location:" . $this->data['route']);
        header("location:" . $this->data['route'].'/index/?saved=1');
	}
	
	function savePhoto() {
		extract($_POST);
		
		$this->onBeforeSave();		

		foreach ($_POST as $key=>$value){
			$data[$key] = $value;
		}
		
		if (isset($id) && $id != '')
			$this->modelPhoto->update($id, $data); 
		else
			$id = $this->modelPhoto->insert($data);

		//File uploads
		if (count($_FILES)>0) {
			$config['upload_path'] = $this->uploadsFolder;
			$config['allowed_types'] = $this->uploadsMIME;
			$config['max_size']	= '10000000';
			$this->load->library('upload', $config);

			foreach ($this->uploads as $upload) {
			
				$config['allowed_types'] = $upload['allowed_types'];
				$config['max_size']	= $upload['maxsize'];
				$config['upload_path'] = "." . $upload['folder'] . $fk. '/';
				
				//carpeta uploads
				if(!is_dir($this->uploadsFolder))
					mkdir($this->uploadsFolder);
            
				//1er nivel dentro de carpeta uploads
				if(!is_dir($upload['folder']))
					mkdir("." . $upload['folder']);
			
				//2do nivel dentro de carpeta uploads
				if(!is_dir($config['upload_path']))
					mkdir($config['upload_path']);
			
				$this->upload->initialize($config);
			
                $this->onBeforeUpload($config['upload_path']);
				if ($this->upload->do_upload($upload['name'])) {
					$data = $this->upload->data();
					
					//Image resizes
					if (isset($upload['resizes'])) {
						
						$this->load->library('image_lib');
						foreach ($upload['resizes'] as $resize) {
							$config['image_library'] = 'gd2';
							$config['maintain_ratio'] = TRUE;
							$config['source_image']	= $config['upload_path'] . $data['file_name'];
							$config['width'] = $resize['width'];
							$config['height'] = $resize['height'];
							$config['new_image'] = $resize['prefix'] . $id . $resize['suffix'] . '.jpg';
							$newname = $config['new_image'];
							$this->image_lib->initialize($config); 
							$this->image_lib->resize();							
						}
					}
				
					//Keep original?
					if ($upload['keep']) {
						$newname = $upload['prefix'] . $id . $upload['suffix'] . $data['file_ext'];						
						rename($config['upload_path'] . $data['file_name'], $config['upload_path'] . $newname);
					}
					else
						unlink($config['upload_path'] . $data['file_name']);
					
					//Save filenames in database
					//$uploadsdata[$upload['name']] = $newname;
					//$this->modelPhoto->update($id, $uploadsdata); 
					
				} else {
					
					echo $this->upload->display_errors();
				}
				
			}
		
		}

		//$this->onAfterSave($id);
		
		//header("location:" . $this->data['route'] . '/photos/' . $fk);
	}
	
	function deletePhoto($photo_id,$fk){
		$this->modelPhoto->delete($photo_id);		
		unlink("./uploads/".$this->page."/".$fk."/fg_".$photo_id.".jpg");
		header('location: /admin/'.$this->page.'/photos/'.$fk);
	}	
	
	function addPhoto($fk){
		$this->init();
                
		$this->data['fk'] = $fk;
		$this->load->view('admin/'.$this->page.'_fotos_form',$this->data);
	}

	function editPhoto($id){
		$results = $this->modelPhoto->get($id);
		foreach ($results->result() as $row){
			$this->data['row'] = $row;
			//$this->data['fk'] = $row->fk;
		}
			
		$this->load->view('admin/'.$this->page.'_fotos_form', $this->data);
	}	

	function destacar($id,$value){
		$data = array('destacado' => $value);
		$this->model->update($id, $data);
		echo $value;
	}

	function visible($id,$value){
		$data = array('visible' => $value);
		$this->model->update($id, $data);
		echo $value;
	}

	public function loadPagination(){
		//Pagination configuration
		$this->pconfig['base_url'] = $this->data['route'].'/index/';
		$this->pconfig['per_page'] = $this->limit;
		$this->pconfig['num_links'] = '5';
		$this->pconfig['full_tag_open'] = '<ul class="pagination">';
		$this->pconfig['full_tag_close'] = '</ul>';
		$this->pconfig['first_link'] = 'Primero';
		$this->pconfig['first_tag_open'] = '<li>';
		$this->pconfig['first_tag_close'] = '</li>';
		$this->pconfig['last_link'] = '&Uacute;ltimo';
		$this->pconfig['last_tag_open'] = '<li>';
		$this->pconfig['last_tag_close'] = '</li>';
		$this->pconfig['next_link'] = '→';
		$this->pconfig['next_tag_open'] = '<li>';
		$this->pconfig['next_tag_close'] = '</li>';
		$this->pconfig['prev_link'] = '←';
		$this->pconfig['prev_tag_open'] = '<li>';
		$this->pconfig['prev_tag_close'] = '</li>';
		$this->pconfig['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
		$this->pconfig['cur_tag_close'] = '</a></li>';
		$this->pconfig['num_tag_open'] = '<li>';
		$this->pconfig['num_tag_close'] = '</li>';

		$this->pconfig['uri_segment'] = $this->pageSegment;
		$this->pagination->initialize($this->pconfig);		
		$this->data['pages'] = $this->pagination->create_links();
	}
	
	function ordenar() {
		for ($i=0; $i<count($_POST['orden']); $i++) {
			$this->model->update($_POST['id'][$i], array('orden' => $_POST['orden'][$i]));
		}
	}
	
	function exportar(){
		$results = $this->model->getAll()->result();			
		exportExcel($results,$filename=$this->page);
	}

	function iframe() {}
	
}

// ------------------------------------------------------------------------
/* End of file Admin_Controller.php */
/* Location: ./application/core/Admin_Controller.php */
?>