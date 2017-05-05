<?php
require 'FrontController.php';
class Partituras extends FrontController {

    function __construct() {
        parent::__construct();
        
        $this->data['current'] = 'partituras';
        $this->load->model('Partituras_model', 'Partituras');
        $this->model = $this->Partituras;

    }
    
    function index() {
        log_visita('partituras');

        $this->data['partituras'] = $this->model->getAll($num=100000, $offset=0, $sort='', $type='ASC')->result();
        $this->render('partituras', $this->data);
    }
}