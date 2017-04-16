<?php
include "AdminController.php";

class Novedades extends AdminController{

    function __construct() {
        parent::__construct();
        $this->data['defaultSort'] = "id";
        $this->load->model('Novedades_model', 'Novedades');
        $this->model = $this->Novedades;
        $this->page = "novedades";
        $this->data['currentModule'] = "novedades";
        $this->data['page'] = $this->page;
        $this->data['route'] = site_url('admin/' . $this->page);    
        $this->pageSegment = 5;
        $this->data['page_title'] = "Novedades";
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
                'folder' => '/uploads/novedades/',
                'keep' => true
            ),
        );

    }

}