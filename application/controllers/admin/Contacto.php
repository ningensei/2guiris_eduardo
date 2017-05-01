<?php
include "AdminController.php";

class Contacto extends AdminController{

    function __construct() {
        parent::__construct();
        $this->data['defaultSort'] = "id";
        $this->load->model('Contacto_model', 'Contacto');
        $this->model = $this->Contacto;
        $this->page = "Contacto";
        $this->data['currentModule'] = "contacto";
        $this->data['page'] = $this->page;
        $this->data['route'] = site_url('admin/' . $this->page);    
        $this->pageSegment = 5;
        $this->data['page_title'] = "Contacto";
        $this->limit = 50;
        $this->init();
        $this->validate = FALSE;
    }

    public function index()
    {
        if(!$this->model->exists()) {
            $this->model->initialize();
        }
        
        redirect(site_url('admin/contacto/edit/1'));
    }

}