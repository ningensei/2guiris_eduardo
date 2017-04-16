<?php
include "AdminController.php";

class Admins extends AdminController{

	function __construct() {
		parent::__construct();
		$this->data['defaultSort'] = "id";
		$this->load->model('Admin_model', 'Admin');
		$this->model = $this->Admin;
		$this->page = "admins";
		$this->data['currentModule'] = "config";
		$this->data['page'] = $this->page;
        $this->data['route'] = site_url('admin/' . $this->page);	
		$this->pageSegment = 5;
		$this->data['page_title'] = "Administradores";
		$this->limit = 50;
		$this->init();
        $this->validate = FALSE;
	}
	
	function onBeforeSave() {
		if (strlen($_POST['password']) > 0 && strlen($_POST['password']) < 30) {
			$_POST['password'] = md5($_POST['password']);
			$_POST['password2'] = md5($_POST['password2']);
		}
	
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('usuario', 'Usuario', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[password2]');

		if ($_POST['activo'] == 1) {
			$_POST['intentos'] = 0;
		}
	}
    	
	function onEditReady($id='') {
		if ($id) {
			$this->breadcrumbs[] = ($id!='')?$this->data['row']->nombre:'';
		}
	}	
		
}