<?php
class Tesis extends MY_Controller {

    function __construct() {
        parent::__construct();
        
        $this->data['current'] = 'tesis';
        $this->load->model('Tesis_model', 'Tesis');
        $this->model = $this->Tesis;

    }
    
    function index() {
        $this->data['tesis'] = $this->model->getAll()->result();
        $this->render('tesis', $this->data);
    }
}