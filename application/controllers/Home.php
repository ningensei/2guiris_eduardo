<?php
require 'FrontController.php';
class Home extends FrontController {

    function __construct() {
        parent::__construct();
        
        $this->data['current'] = 'home';

    }
    
    function index() {
    	log_visita('home');
        $this->render('home');
    }
}