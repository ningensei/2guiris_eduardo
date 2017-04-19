<?php
class Partituras extends MY_Controller {

    function __construct() {
        parent::__construct();
        
        $this->data['current'] = 'partituras';
        $this->load->model('Partituras_model', 'Partituras');
        $this->model = $this->Partituras;

    }
    
    function index() {
        $this->data['partituras'] = $this->model->getAll()->result();
        $this->render('partituras', $this->data);
    }
}