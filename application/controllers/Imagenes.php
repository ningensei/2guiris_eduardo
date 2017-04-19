<?php
class Imagenes extends MY_Controller {

    function __construct() {
        parent::__construct();
        
        $this->data['current'] = 'imagenes';
        $this->load->model('Imagenes_model', 'Imagenes');
        $this->model = $this->Imagenes;

    }
    
    function index() {
        $this->data['imagenes'] = $this->model->getAll()->result();
        $this->render('imagenes', $this->data);
    }
}