<?php
include_once("MGeneric.php");

class Novedades_model extends MGeneric {
    
    public function __construct() {
        $this->table = "novedades";
        $this->indexable = array('id', 'titulo', 'bajada', 'texto');
        $this->fk = "id";
        $this->pk = "id";
    }

}