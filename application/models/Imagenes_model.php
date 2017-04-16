<?php
include_once("MGeneric.php");

class Imagenes_model extends MGeneric {
    
    function __construct() {
        $this->table = "imagenes";
        $this->indexable = array('id', 'titulo', 'descripcion');
        $this->fk = "id";
        $this->pk = "id";
    }
    
}