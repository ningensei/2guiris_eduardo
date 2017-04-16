<?php
include_once("MGeneric.php");

class Contacto_model extends MGeneric {
    
    function __construct() {
        $this->table = "contacto";
        $this->indexable = array('id', 'nombre', 'descripcion');
        $this->fk = "id";
        $this->pk = "id";
    }
    
}