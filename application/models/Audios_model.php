<?php
include_once("MGeneric.php");

class Audios_model extends MGeneric {
    
    function __construct() {
        $this->table = "audios";
        $this->indexable = array('id', 'nombre', 'descripcion');
        $this->fk = "id";
        $this->pk = "id";
    }
    
}