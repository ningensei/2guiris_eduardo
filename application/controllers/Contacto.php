<?php
require 'FrontController.php';
class Contacto extends FrontController {

    public function __construct() 
    {
        parent::__construct();
        
        $this->data['current'] = 'contacto';
        $this->load->model('Contacto_model', 'Contacto');
        $this->load->model('Contactos_model', 'Contactos');
        $this->model = $this->Contacto;

        $this->data['cssFiles'] = [

            base_url().'media/plugins/bootstrap-sweetalert/dist/sweetalert.css',
        ];

        $this->data['jsFiles'] = [

            base_url().'media/plugins/bootstrap-sweetalert/dist/sweetalert.min.js',
            base_url().'media/js/contacto.js',
        ];
    }
    
    public function index()
    {
        log_visita('contacto');

        $this->data['contacto'] = $this->model->get(1)->row();
        $this->render('contacto', $this->data);
    }

    public function post()
    {
        $this->validateFields($_POST);
        

        if($this->Contactos->post($_POST)) {
            echo json_encode(array('status' => 'success'));

        } else {

            echo json_encode(array('status' => 'error', 'msg' => 'Disculpe, esta funcionalidad está en mantenimiento, por favor inténtelo más tarde.'));
        }
    }

    public function validateFields($fields)
    {
        $requiredFields = ['nombre', 'email', 'mensaje'];
        $errors = [];
        

        foreach($fields as $key => $value) {
            if(!$value && in_array($key, $requiredFields)) { 
                $errors[] = $key;
            }
        }


        if($errors) {

            $msg = $this->generateErrorMsg($errors);

            echo json_encode(array('status' => 'error', 'msg' => $msg));
            exit;
        }
    }

    public function generateErrorMsg($errors)
    {
        if(count($errors) == 1) {
            $msg = 'El campo '.$errors[0].' es obligatorio.';

        } else {
            $msg = 'Los campos ';
            $count = 0;
            
            foreach($errors as $field) {
                
                $count += 1;
                $msg .= $field;
                
                if($count == count($errors)-1) {
                    $msg .= ' y ';
                    
                } else if($count < count($errors)) {
                    $msg .= ', ';
                }
            }

            $msg .= ' son obligatorios.';
        }

        return $msg;
    }

    

}