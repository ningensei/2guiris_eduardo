<?php
require 'FrontController.php';
class Home extends FrontController {

    function __construct() {
        parent::__construct();
        
        $this->data['current'] = 'home';

        $this->data['cssFiles'] = [

            base_url().'media/plugins/OwlCarousel2/dist/assets/owl.carousel.min.css',
        ];

        $this->data['jsFiles'] = [

            base_url().'media/plugins/OwlCarousel2/dist/owl.carousel.min.js',
            base_url().'media/js/home.js',
        ];

    }
    
    function index() {
    	log_visita('home');

    	$this->load->model('Novedades_model', 'Novedades');
    	$this->data['novedades'] = $this->Novedades->getAll(3)->result();

        $this->render('home', $this->data);
    }
}