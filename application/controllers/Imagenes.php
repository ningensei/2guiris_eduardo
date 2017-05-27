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
    
    function index($page = 0) {
        log_visita('imagenes');

        $this->data['breadcrumbs'] = renderBreadcrumbs($this->breadcrumbs);

        $this->data['imagenes'] = $this->model->getAll(6, $page, $sort='', $type='ASC')->result();

        $this->data['paginador'] = $this->render_paginador(base_url('audios/index'), $this->model->totalRows(), 6);

        
        $this->render('imagenes', $this->data);
    }
}