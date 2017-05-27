<?php
include_once("MGeneric.php");

class Otros_model extends MGeneric {
    
    public function __construct() {
        $this->table = "otros";
        $this->indexable = array('id', 'titulo', 'bajada', 'texto');
        $this->fk = "id";
        $this->pk = "id";
    }

}