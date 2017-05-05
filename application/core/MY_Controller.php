<?php

header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');

class MY_Controller extends CI_Controller {
	
	function __construct() {
        parent::__construct();
				
		$this->data = array();
		$this->data['height'] = 1070;

		$this->load->library('pagination');
		$this->load->library('encryption');
		
		
		$this->folder = '';

		$this->setup();
		
		$this->breadcrumbs = array(['name' => 'Inicio', 'url' => site_url()]);
		
		$this->data['referer'] = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : site_url();

		$this->load->library('user_agent');
		$this->data['mobile'] = $this->agent->is_mobile() ? true : false;
		
		
	}
	
	function render($view) {
		$this->data['header'] = $this->load->view('header', $this->data, true);
		
		$this->carabiner->js('main.js');
		$this->data['footer'] = $this->load->view('footer', $this->data, true);	
		
		$this->load->view($this->folder.$view, $this->data);
	}

	function setup(){		
		$this->load->library('carabiner');

		$carabiner_config = array(
		    'script_dir' => 'media/js/', 
		    'style_dir'  => 'media/css/',
		    'cache_dir'  => 'media/cache/',
		    'base_uri'   => base_url(),
		    'combine'    => TRUE,
		    'dev'        => TRUE,

		);

		$this->carabiner->config($carabiner_config);	

		#$this->carabiner->js('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js');
		#$this->carabiner->js('https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js');
		#$this->carabiner->js('http://localhost/institutococacola/media/admin/assets/js/libs/jquery-1.10.2.min.js');
		
		$this->carabiner->js('plugins/ladda.min.js');
		#$this->carabiner->js('jquery.qtip.js');
		#$this->carabiner->js('jquery.form.min.js');
		$this->carabiner->js('bootbox.min.js');
		#$this->carabiner->js('owl.carousel.min.js');
		#$this->carabiner->js('jquery.scrollto.min.js');
		#$this->carabiner->js('imagesloaded.pkg.min.js');
		#$this->carabiner->js('jquery.fancybox.pack.js');
	}

	public function loadPagination(){
		//Pagination configuration
		$this->pconfig['base_url'] = base_url().'/index';
		$this->pconfig['per_page'] = $this->limit;
		$this->pconfig['num_links'] = '5';
		$this->pconfig['full_tag_open'] = '<ul class="pagination">';
		$this->pconfig['full_tag_close'] = '</ul>';
		$this->pconfig['first_link'] = 'Primero';
		$this->pconfig['first_tag_open'] = '<li>';
		$this->pconfig['first_tag_close'] = '</li>';
		$this->pconfig['last_link'] = '&Uacute;ltimo';
		$this->pconfig['last_tag_open'] = '<li>';
		$this->pconfig['last_tag_close'] = '</li>';
		$this->pconfig['next_link'] = '>';
		$this->pconfig['next_tag_open'] = '<li class="arrow">';
		$this->pconfig['next_tag_close'] = '</li>';
		$this->pconfig['prev_link'] = '<';
		$this->pconfig['prev_tag_open'] = '<li class="arrow">';
		$this->pconfig['prev_tag_close'] = '</li>';
		$this->pconfig['cur_tag_open'] = '<li class="current"><a href="javascript:void(0);">';
		$this->pconfig['cur_tag_close'] = '</a></li>';
		$this->pconfig['num_tag_open'] = '<li>';
		$this->pconfig['num_tag_close'] = '</li>';

		$this->pconfig['uri_segment'] = $this->pageSegment;
	}

	function paginar($baseURL, $totalRows, $limit, $segment=3) {
		$this->load->library('pagination');
		$config['base_url'] = $baseURL;
		$config['total_rows'] = $totalRows;
		$config['per_page'] = $limit; 
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['last_link'] = FALSE;
		$config['first_link'] = FALSE;
		$config['next_link'] = 'Anteriores &raquo;';
		$config['prev_link'] = '&laquo; Más recientes';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['uri_segment'] = $segment;
		$this->pagination->initialize($config); 

		return $this->pagination->create_links();		
	}
	//orden de listados por más populares o más recientes
	function set_orden($scope='noticias',$q_sort='recientes'){
		$this->session->set_userdata($scope.'_q_sort',$q_sort);
				
		echo true;
	}
	
}