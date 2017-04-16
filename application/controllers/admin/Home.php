<?php
include "AdminController.php";

class Home extends AdminController{

	function __construct() {
		parent::__construct();
		$this->data['currentModule'] = "home";
		$this->page = "home";
		$this->data['page'] = $this->page;
		$this->data['route'] = base_url() . 'admin/' . $this->page;
		$this->init();
	}

	function index(){
		$this->load->view('admin/home', $this->data);
	}
	
}