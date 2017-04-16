<?php
include "AdminController.php";

class Visitas extends AdminController{

    function __construct() {
        parent::__construct();
        $this->data['defaultSort'] = "id";
        $this->load->model('Visitas_model', 'Visitas');
        $this->model = $this->Visitas;
        $this->page = "visitas";
        $this->data['currentModule'] = "visitas";
        $this->data['page'] = $this->page;
        $this->data['route'] = site_url('admin/' . $this->page);    
        $this->pageSegment = 5;
        $this->data['page_title'] = "Visitas";
        $this->limit = 50;
        $this->init();
        $this->validate = FALSE;
    }

    public function index() {
        $this->data['total_visitas'] = $this->model->count_visitas();
        $this->data['total_home'] = $this->model->count_visitas('home');
        $this->data['total_catalogo'] = $this->model->count_visitas('catalogo');
        $this->data['total_biografia'] = $this->model->count_visitas('biografia');
        $this->data['total_novedades'] = $this->model->count_visitas('novedades');
        $this->data['total_tesis'] = $this->model->count_visitas('tesis');
        $this->data['total_imagenes'] = $this->model->count_visitas('imagenes');
        $this->data['total_contacto'] = $this->model->count_visitas('imagenes');

        parent::index();
    }
}