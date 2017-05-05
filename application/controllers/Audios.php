<?php
require 'FrontController.php';
class Audios extends FrontController {

    function __construct() {
        parent::__construct();
        
        $this->data['current'] = 'audios';
        $this->load->model('Audios_model', 'Audios');
        $this->model = $this->Audios;
        $this->data['jsFiles'] = [
            base_url().'media/plugins/masonry.pkgd.min.js',
            base_url().'media/js/audios.js',
        ];
        $this->breadcrumbs[] = array('name' => 'Audios', 'url' => '');
        


    }
    
    function index() {
        log_visita('audios');

        $this->data['breadcrumbs'] = renderBreadcrumbs($this->breadcrumbs);
        

        $this->data['audios'] = $this->model->getAll()->result();
        $this->render('audios', $this->data);
    }
}