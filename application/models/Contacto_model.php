<?php
include_once("MGeneric.php");

class Contacto_model extends MGeneric {
    
    function __construct() {
        $this->table = "contacto";
        $this->indexable = array('id', 'nombre', 'descripcion');
        $this->fk = "id";
        $this->pk = "id";
    }
 	
 	/**
     * Creates the config row
     *
     * @return bool
     * 
     **/
    public function initialize()
    {
    	$init = $this->db->query("insert into $this->table values(NULL, NULL, NULL, NULL, timestamp)");
    }

    /**
     * Returns true if table row has been created
     *
     * @return bool
     * 
     **/
    public function exists ()
    {
    	return $this->db->query("select count(*) as total from $this->table")->row()->total;
    }

}