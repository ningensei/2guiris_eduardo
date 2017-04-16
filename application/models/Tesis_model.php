<?php
include_once("MGeneric.php");

class Tesis_model extends MGeneric {
    
    function __construct() {
        $this->table = "tesis";
        $this->indexable = array('id', 'nombre', 'descripcion');
        $this->fk = "id";
        $this->pk = "id";
    }
    
}