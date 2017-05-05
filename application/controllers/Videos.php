<?php
require 'FrontController.php';
class Videos extends FrontController {

    function __construct() {
        parent::__construct();
        
        $this->data['current'] = 'videos';
        $this->load->model('Videos_model', 'Videos');
        $this->model = $this->Videos;
        $this->data['jsFiles'] = [
            base_url().'media/plugins/masonry.pkgd.min.js',
            base_url().'media/js/videos.js',
        ];
        $this->breadcrumbs[] = array('name' => 'Videos', 'url' => '');

    }
    
    function index() {
        log_visita('videos');

        $this->data['breadcrumbs'] = renderBreadcrumbs($this->breadcrumbs);
        $this->data['videos'] = $this->model->getAll()->result();
        $this->render('videos', $this->data);
    }
}