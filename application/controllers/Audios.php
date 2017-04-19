<?php
class Audios extends MY_Controller {

    function __construct() {
        parent::__construct();
        
        $this->data['current'] = 'audios';
        $this->load->model('Audios_model', 'Audios');
        $this->model = $this->Audios;

    }
    
    function index() {
        $this->data['audios'] = $this->model->getAll()->result();
        $this->render('audios', $this->data);
    }
}