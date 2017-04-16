<?php
include_once("MGeneric.php");

class Tesis_archivos_model extends MGeneric {
    
    function __construct() {
        $this->table = "tesis_archivos";
        $this->indexable = array('id', 'nombre', 'descripcion');
        $this->fk = "id";
        $this->pk = "id";
    }
    
}