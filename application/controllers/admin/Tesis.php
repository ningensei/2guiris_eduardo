<?php
include "AdminController.php";

class Tesis extends AdminController{

    function __construct() {
        parent::__construct();
        $this->data['defaultSort'] = "id";
        $this->load->model('Tesis_model', 'Tesis');
        $this->model = $this->Tesis;
        $this->page = "tesis";
        $this->data['currentModule'] = "tesis";
        $this->data['page'] = $this->page;
        $this->data['route'] = site_url('admin/' . $this->page);    
        $this->pageSegment = 5;
        $this->data['page_title'] = "Tesis";
        $this->limit = 50;
        $this->init();
        $this->validate = FALSE;
    }

    public function index()
    {
        redirect(site_url('admin/tesis/edit/1'));
    }

}