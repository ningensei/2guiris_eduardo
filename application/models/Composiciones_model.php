<?php
include_once("MGeneric.php");

class Composiciones_model extends MGeneric {
    
    function __construct() {
        $this->table = "composiciones";
        $this->indexable = array('id', 'titulo', 'dispositivo', 'lugar', 'ano');
        $this->fk = "id";
        $this->pk = "id";
    }
    
}