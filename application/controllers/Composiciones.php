<?php
require 'FrontController.php';
class Composiciones extends FrontController {

    function __construct() {
        parent::__construct();
        
        $this->data['current'] = 'composiciones';
        $this->load->model('Composiciones_model', 'Composiciones');
        $this->model = $this->Composiciones;

        $this->breadcrumbs[] = array('name' => 'Composiciones', 'url' => '');

    }
    
    function index() {
        log_visita('composiciones');

        $this->data['breadcrumbs'] = renderBreadcrumbs($this->breadcrumbs);
        
        $this->data['composiciones'] = $this->model->getAll($num=100000, $offset=0, $sort='ano', $type='ASC')->result();
        $this->render('composiciones', $this->data);
    }
}