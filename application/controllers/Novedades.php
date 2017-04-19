<?php
class Novedades extends MY_Controller {

    function __construct() {
        parent::__construct();
        
        $this->data['current'] = 'novedades';
        $this->load->model('Novedades', 'Novedades');
        $this->model = $this->Novedades;

    }
    
    function index() {
        $this->data['novedades'] = $this->model->getAll()->result();
        $this->render('novedades', $this->data);
    }
}