<?php
include_once("MGeneric.php");

class Distinciones_model extends MGeneric {
    
    function __construct() {
        $this->table = "distinciones";
        $this->indexable = array('id', 'nombre');
        $this->fk = "id";
        $this->pk = "id";
    }
    
}