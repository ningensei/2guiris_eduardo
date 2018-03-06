<?php
include "AdminController.php";

class Contactos extends AdminController{

    function __construct() {
        parent::__construct();
        $this->data['defaultSort'] = "id";
        $this->load->model('Contactos_model', 'Contactos');
        $this->model = $this->Contactos;
        $this->page = "contactos";
        $this->data['currentModule'] = "contactos";
        $this->data['page'] = $this->page;
        $this->data['route'] = site_url('admin/' . $this->page);    
        $this->pageSegment = 5;
        $this->data['page_title'] = "Contactos";
        $this->limit = 50;
        $this->init();
        $this->validate = FALSE;
    }

}