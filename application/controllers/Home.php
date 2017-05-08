<?php
require 'FrontController.php';
class Home extends FrontController {

    function __construct() {
        parent::__construct();
        
        $this->data['current'] = 'home';

    }
    
    function index() {
    	log_visita('home');

    	$this->load->model('Novedades_model', 'Novedades');
    	$this->data['novedades'] = $this->Novedades->getAll(3)->result();

        $this->render('home', $this->data);
    }
}