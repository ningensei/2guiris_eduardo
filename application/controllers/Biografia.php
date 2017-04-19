<?php
class Biografia extends MY_Controller {

    function __construct() {
        parent::__construct();
        
        $this->data['current'] = 'biografia';
        $this->load->model('Distinciones_model', 'Distinciones');
        $this->load->model('Enlaces_model', 'Enlaces');

    }
    
    function index() {
        $this->data['distinciones'] = $this->Distinciones->getAll()->result();
        $this->data['enlaces'] = $this->Enlaces->getAll()->result();
        $this->render('biografia', $this->data);
    }
}