<?php
class Login extends CI_Controller{

	function __construct() {
		parent::__construct();
		$this->data = array();
		$this->load->model('Admin_model', 'Admin');
	}
    
    function index(){
		$data = array();
        $data['title'] = $this->config->item('appName');

        if (isset($_COOKIE['univ_usuario']) && isset($_COOKIE['univ_password'])) {

        	$results = $this->Admin->login($_COOKIE['univ_usuario'], $_COOKIE['univ_password']);
        	if (count($results)) {
        		$row = $results[0];
				$this->session->set_userdata('admin_id', $row->id);
				$this->session->set_userdata('usuario', $row->nombre);

				redirect(site_url("admin/home"));
        	}
        }

        $this->load->view('admin/login',$data);
    }
	
	function validate(){
		extract($_POST);

		if (!empty($username) && !empty($password)) {
			$result = $this->Admin->login($username, $password);
			
			
			if ($result['success']) {
				$row = $result['admin'];
				$this->session->set_userdata('admin_id', $row->id);
				$this->session->set_userdata('usuario', $row->nombre);
				$this->session->set_userdata('es_admin', true);

				if ($row->cambio_password) {
					redirect(site_url('admin/seguridad'));
				}
				else {
					if (isset($_POST['remember'])) {
						setcookie('pm_usuario', $username, time()+60*60*24*30);
						setcookie('pm_password', md5($password), time()+60*60*24*30);
					}

					redirect(site_url("admin/home"));
				}
			}
			else {
				$data = array('error' => $result['error']);
				$data['title'] = $this->config->item('appName');
				$this->load->view('admin/login', $data);
			}
		} else {	
			$data = array('error' => "Debes ingresar tu usuario y contraseña");
			$data['title'] = $this->config->item('appName');
			$this->load->view('admin/login', $data);
		}
	}

	function logoff() {
		$this->session->sess_destroy();
		
		setcookie('pm_usuario', '', 0);
		setcookie('pm_password', '', 0);

		redirect(site_url("admin/login"));
	}

	function recover() {
		$this->load->model('Admin');
		$user = $this->Admin->getBy('email='.$_POST['email']);
		if ($user) {
			$this->load->helper('string');
			$password = random_string('alnum', 8);
			$this->Admin->update($user->id, array('password' => md5($password), 'cambio_password' => 1));

			$mensaje = "<p>Sus nuevos datos de acceso a la plataforma de administración de FUNDACION AVON son:<br/><br/><strong>Usuario:</strong> ".$user->usuario."<br/><strong>Contraseña:</strong> ".$password."<br/></p><p>Ingrese ahora <a href='".site_url('admin')."'>haciendo click aquí</a>.</p>";
			enviarMail('noreply@fundacionavon.org.ar', $_POST['email'], $bcc='', 'Datos de acceso a su panel de FUNDACION AVON', $mensaje, 'FUNDACION AVON');

			redirect(site_url('admin/login/?recovered=1'));
		}
		else {
			redirect(site_url('admin/login/?recovered=0'));			
		}
	}
		
}
