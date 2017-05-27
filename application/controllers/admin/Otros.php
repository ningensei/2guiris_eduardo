<?php
include "AdminController.php";

class Otros extends AdminController{

    function __construct() {
        parent::__construct();
        $this->data['defaultSort'] = "id";
        $this->load->model('Otros_model', 'Otros');
        $this->model = $this->Otros;
        $this->page = "otros";
        $this->data['currentModule'] = "otros";
        $this->data['page'] = $this->page;
        $this->data['route'] = site_url('admin/' . $this->page);    
        $this->pageSegment = 5;
        $this->data['page_title'] = "Otros";
        $this->limit = 50;
        $this->init();
        $this->validate = FALSE;

        $this->uploads = array(
            array(
                'name' => 'imagen',
                'prefix' => 'imagen_',
                'suffix' => '',
                'allowed_types' => 'jpg|gif|png',
                'maxsize' => 2048,
                'folder' => '/uploads/otros/',
                'keep' => true
            ),
        );

    }

}