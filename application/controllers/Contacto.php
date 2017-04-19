<?php
class Contacto extends MY_Controller {

    function __construct() {
        parent::__construct();
        
        $this->data['current'] = 'contacto';
        $this->load->model('Contacto_model', 'Contacto');
        $this->model = $this->Contacto;

    }
    
    function index() {
        $this->data['contacto'] = $this->model->getAll()->result();
        $this->render('contacto', $this->data);
    }
}