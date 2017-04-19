<?php
class Home extends MY_Controller {

    function __construct() {
        parent::__construct();
        
        $this->data['current'] = 'home';

    }
    
    function index() {
        $this->render('home');
    }
}