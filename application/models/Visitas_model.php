<?php
include_once("MGeneric.php");

class Visitas_model extends MGeneric {
    
    function __construct() {
        $this->table = "visitas";
        $this->indexable = array('id', 'seccion');
        $this->fk = "id";
        $this->pk = "id";
    }

    public function count_visitas($seccion = false)
    {
        $q = 'select count(*) as total from visitas ';

        if($seccion) {
            $q .= 'where seccion = "'.$seccion.'"';
        }

        return $this->db->query($q)->row()->total;
    }
    
}