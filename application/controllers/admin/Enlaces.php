<?php
include "AdminController.php";

class Enlaces extends AdminController{

    function __construct() {
        parent::__construct();
        $this->data['defaultSort'] = "id";
        $this->load->model('Enlaces_model', 'Enlaces');
        $this->model = $this->Enlaces;
        $this->page = "enlaces";
        $this->data['currentModule'] = "enlaces";
        $this->data['page'] = $this->page;
        $this->data['route'] = site_url('admin/' . $this->page);    
        $this->pageSegment = 5;
        $this->data['page_title'] = "Enlaces";
        $this->limit = 50;
        $this->init();
        $this->validate = FALSE;
    }

}