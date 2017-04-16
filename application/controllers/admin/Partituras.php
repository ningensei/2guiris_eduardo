<?php
include "AdminController.php";

class Partituras extends AdminController{

    function __construct() {
        parent::__construct();
        $this->data['defaultSort'] = "id";
        $this->load->model('Partituras_model', 'Partituras');
        $this->model = $this->Partituras;
        $this->page = "partituras";
        $this->data['currentModule'] = "partituras";
        $this->data['page'] = $this->page;
        $this->data['route'] = site_url('admin/' . $this->page);    
        $this->pageSegment = 5;
        $this->data['page_title'] = "Partituras";
        $this->limit = 50;
        $this->init();
        $this->validate = FALSE;

        $this->uploads = array(
            array(
                'name' => 'archivo',
                'prefix' => 'partitura_',
                'suffix' => '',
                'allowed_types' => 'jpg|gif|png|pdf',
                'maxsize' => 2048,
                'folder' => '/uploads/partituras/',
                'keep' => true
            ),
        );

    }

}