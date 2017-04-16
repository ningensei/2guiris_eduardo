<?php
include_once("MGeneric.php");

class Partituras_model extends MGeneric {
    
    function __construct() {
        $this->table = "partituras";
        $this->indexable = array('id', 'nombre');
        $this->fk = "id";
        $this->pk = "id";
    }

}