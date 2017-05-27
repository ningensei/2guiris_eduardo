<?php
require 'FrontController.php';
class Otros extends FrontController {

    public function __construct()
    {
        parent::__construct();
        
        $this->data['current'] = 'otros';
        $this->load->model('Otros_model', 'Otros');

        $this->model = $this->Otros;
        
    }
    
    /**
     * Carga la vista con todas las novedades
     *
     * @return void
     **/    
    public function index($page = 0)
    {
        log_visita('otros');

        $this->data['jsFiles'] = [
            base_url().'media/plugins/masonry.pkgd.min.js',
            base_url().'media/js/otros.js',
        ];

        // breadcrumbs
        $this->breadcrumbs[] = array('name' => 'Otros', 'url' => '');
        $this->data['breadcrumbs'] = renderBreadcrumbs($this->breadcrumbs);

        $this->data['otros'] = $this->model->getAll(6, $page)->result();

        $this->data['paginador'] = $this->render_paginador(base_url('otros/index'), $this->model->totalRows(), 6);

        $this->render('otros', $this->data);
    }


    /**
     * Carga la vista de una novedad
     *
     * @return void
     **/
    public function ver($id)
    {
        $otro = $this->data['otro'] = $this->model->get($id)->row();
        
        // breadcrumbs
        $this->breadcrumbs[] = array('name' => 'Otros', 'url' => site_url('otros'));
        $this->breadcrumbs[] = array('name' => $otro->titulo, 'url' => '');
        $this->data['breadcrumbs'] = renderBreadcrumbs($this->breadcrumbs);

        $this->render('otro', $this->data);
    }


}