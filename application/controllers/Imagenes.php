<?php
require 'FrontController.php';
class Imagenes extends FrontController {

    function __construct() {
        parent::__construct();
        
        $this->data['current'] = 'imagenes';
        $this->load->model('Imagenes_model', 'Imagenes');
        $this->model = $this->Imagenes;

        $this->data['jsFiles'] = [
            base_url().'media/js/imagesloaded.pkgd.min.js',
            base_url().'media/plugins/masonry.pkgd.min.js',
            base_url().'media/js/imagenes.js'
        ];

        $this->breadcrumbs[] = array('name' => 'Imágenes', 'url' => '');

    }
    
    function index() {
        log_visita('imagenes');

        $this->data['breadcrumbs'] = renderBreadcrumbs($this->breadcrumbs);

        $this->data['imagenes'] = $this->model->getAll($num=100000, $offset=0, $sort='', $type='ASC')->result();
        $this->render('imagenes', $this->data);
    }
}