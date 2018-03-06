<?php
include "AdminController.php";

class Composiciones extends AdminController{

    function __construct() {
        parent::__construct();
        $this->data['defaultSort'] = "id";
        $this->load->model('Composiciones_model', 'Composiciones');
        $this->model = $this->Composiciones;
        $this->page = "composiciones";
        $this->data['currentModule'] = "composiciones";
        $this->data['page'] = $this->page;
        $this->data['route'] = site_url('admin/' . $this->page);    
        $this->pageSegment = 5;
        $this->data['page_title'] = "Composiciones";
        $this->data['sort'] = "ano";
        $this->data['sortType'] = "ano";

        $this->limit = 50;
        $this->init();
        $this->validate = FALSE;
    }

}