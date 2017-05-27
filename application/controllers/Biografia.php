<?php
require 'FrontController.php';
class Biografia extends FrontController {

    function __construct() {
        parent::__construct();
        
        $this->data['current'] = 'biografia';
        $this->load->model('Distinciones_model', 'Distinciones');
        $this->load->model('Enlaces_model', 'Enlaces');

        $this->data['cssFiles'] = [

            base_url().'media/plugins/lightbox/css/lightbox.min.css',
        ];

        $this->data['jsFiles'] = [

            base_url().'media/plugins/lightbox/js/lightbox.min.js',
        ];

    }
    
    function index() {
        log_visita('biografia');

        $this->data['distinciones'] = $this->Distinciones->getAll($num=100000, $offset=0, $sort='', $type='ASC')->result();
        $this->data['enlaces'] = $this->Enlaces->getAll($num=100000, $offset=0, $sort='', $type='ASC')->result();
        $this->render('biografia', $this->data);
    }
}