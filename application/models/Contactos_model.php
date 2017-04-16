<?php
include_once("MGeneric.php");

class Contactos_model extends MGeneric {
    
    function __construct() {
        $this->table = "contactos";
        $this->indexable = array('id', 'nombre', 'email', 'asunto', 'mensaje');
        $this->fk = "id";
        $this->pk = "id";
    }
    
}