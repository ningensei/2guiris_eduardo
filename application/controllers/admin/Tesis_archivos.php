<?php
include "AdminController.php";

class Tesis_archivos extends AdminController{

    function __construct() {
        parent::__construct();
        $this->data['defaultSort'] = "id";
        $this->load->model('Tesis_archivos_model', 'Tesis_archivos');
        $this->model = $this->Tesis_archivos;
        $this->page = "tesis_archivos";
        $this->data['currentModule'] = "tesis_archivos";
        $this->data['page'] = $this->page;
        $this->data['route'] = site_url('admin/' . $this->page);    
        $this->pageSegment = 5;
        $this->data['page_title'] = "Tesis_archivos";
        $this->limit = 50;
        $this->init();
        $this->validate = FALSE;

        $this->uploads = array(
            array(
                'name' => 'archivo',
                'prefix' => 'tesis_',
                'suffix' => '',
                'allowed_types' => 'jpg|gif|png|pdf',
                'maxsize' => 2048,
                'folder' => '/uploads/tesis/',
                'keep' => true
            ),
        );

    }

}