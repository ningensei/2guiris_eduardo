<?php
include "AdminController.php";

class Videos extends AdminController{

    function __construct() {
        parent::__construct();
        $this->data['defaultSort'] = "id";
        $this->load->model('Videos_model', 'Videos');
        $this->model = $this->Videos;
        $this->page = "videos";
        $this->data['currentModule'] = "videos";
        $this->data['page'] = $this->page;
        $this->data['route'] = site_url('admin/' . $this->page);    
        $this->pageSegment = 5;
        $this->data['page_title'] = "Videos";
        $this->limit = 50;
        $this->init();
        $this->validate = FALSE;
    }

}