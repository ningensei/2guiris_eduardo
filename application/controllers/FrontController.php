<?php
class FrontController extends MY_Controller {
    public function __construct() {
        parent::__construct();

        if(!$this->session->userdata('sesion')) {
            $this->session->set_userdata('sesion', 1);

            $this->db->insert('sesiones', array('ip' => $_SERVER['REMOTE_ADDR']));
        }
    }
}