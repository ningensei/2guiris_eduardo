<?php
include "AdminController.php";

class Distinciones extends AdminController{

    function __construct() {
        parent::__construct();
        $this->data['defaultSort'] = "id";
        $this->load->model('Distinciones_model', 'Distinciones');
        $this->model = $this->Distinciones;
        $this->page = "distinciones";
        $this->data['currentModule'] = "distinciones";
        $this->data['page'] = $this->page;
        $this->data['route'] = site_url('admin/' . $this->page);    
        $this->pageSegment = 5;
        $this->data['page_title'] = "Distinciones";
        $this->limit = 50;
        $this->init();
        $this->validate = FALSE;
    }

}