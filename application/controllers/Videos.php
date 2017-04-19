<?php
class Videos extends MY_Controller {

    function __construct() {
        parent::__construct();
        
        $this->data['current'] = 'videos';
        $this->load->model('Videos_model', 'Videos');
        $this->model = $this->Videos;

    }
    
    function index() {
        $this->data['videos'] = $this->model->getAll()->result();
        $this->render('videos', $this->data);
    }
}