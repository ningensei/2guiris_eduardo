<?php
require 'FrontController.php';
class Tesis extends FrontController {

    function __construct() {
        parent::__construct();
        
        $this->data['current'] = 'tesis';
        $this->load->model('Tesis_model', 'Tesis');
        $this->load->model('Tesis_archivos_model', 'Archivos');
        $this->model = $this->Tesis;

    }
    
    function index() {
        log_visita('tesis');

        $this->data['tesis'] = $this->model->get(1)->row();
        $this->data['tesis_archivos'] = $this->Archivos->getAll($num=100000, $offset=0, $sort='', $type='ASC')->result();
        $this->render('tesis', $this->data);
    }
}