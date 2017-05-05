<?php
require 'FrontController.php';
class Novedades extends FrontController {

    public function __construct()
    {
        parent::__construct();
        
        $this->data['current'] = 'novedades';
        $this->load->model('Novedades_model', 'Novedades');

        $this->model = $this->Novedades;
        
    }
    
    /**
     * Carga la vista con todas las novedades
     *
     * @return void
     **/    
    public function index()
    {
        log_visita('novedades');

        $this->data['jsFiles'] = [
            base_url().'media/plugins/masonry.pkgd.min.js',
            base_url().'media/js/novedades.js',
        ];

        // breadcrumbs
        $this->breadcrumbs[] = array('name' => 'Novedades', 'url' => '');
        $this->data['breadcrumbs'] = renderBreadcrumbs($this->breadcrumbs);

        $this->data['novedades'] = $this->model->getAll()->result();
        $this->render('novedades', $this->data);
    }

    /**
     * Carga la vista de una novedad
     *
     * @return void
     **/
    public function ver($id)
    {
        $novedad = $this->data['novedad'] = $this->model->get($id)->row();
        
        // breadcrumbs
        $this->breadcrumbs[] = array('name' => 'Novedades', 'url' => site_url('novedades'));
        $this->breadcrumbs[] = array('name' => $novedad->titulo, 'url' => '');
        $this->data['breadcrumbs'] = renderBreadcrumbs($this->breadcrumbs);

        $this->render('novedad', $this->data);
    }


}