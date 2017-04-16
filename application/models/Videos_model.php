<?php
include_once("MGeneric.php");

class Videos_model extends MGeneric {
    
    function __construct() {
        $this->table = "videos";
        $this->indexable = array('id', 'nombre', 'descripcion');
        $this->fk = "id";
        $this->pk = "id";
    }

}