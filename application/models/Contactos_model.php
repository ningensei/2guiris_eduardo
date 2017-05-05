<?php
include_once("MGeneric.php");

class Contactos_model extends MGeneric {
    
    function __construct()
    {
        $this->table = "contactos";
        $this->indexable = array('id', 'nombre', 'email', 'asunto', 'mensaje');
        $this->fk = "id";
        $this->pk = "id";
    }

    /**
     * inserts register in DB.
     *
     * @return bool
     * @author 
     **/
    public function post($post)
    {
    	$data = array(
            'nombre' => $post['nombre'],
            'email' => $post['email'],
            'asunto' => $post['asunto'],
            'mensaje' => $post['mensaje']
        );

        return $this->insert($data);
    }
    
}