<?php
include_once("MGeneric.php");

class Enlaces_model extends MGeneric {
    
    function __construct() {
        $this->table = "enlaces_de_interes";
        $this->indexable = array('id', 'nombre', 'descripcion');
        $this->fk = "id";
        $this->pk = "id";
    }
    
}