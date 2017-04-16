<?php
include "AdminController.php";

class Imagenes extends AdminController{

    public function __construct() {
        parent::__construct();
        $this->data['defaultSort'] = "id";
        $this->load->model('Imagenes_model', 'Imagenes');
        $this->model = $this->Imagenes;
        $this->page = "imagenes";
        $this->data['currentModule'] = "imagenes";
        $this->data['page'] = $this->page;
        $this->data['route'] = site_url('admin/' . $this->page);    
        $this->pageSegment = 5;
        $this->data['page_title'] = "Imagenes";
        $this->limit = 50;
        $this->init();
        $this->validate = FALSE;
    }

    public function onAfterSave($id = '')
    {
        
        
        //imagen
        if (!empty($_POST['imagen']) && file_exists("./uploads/temp/".$_POST['imagen'])) {
            if(!file_exists("./uploads/".$this->data['currentModule']."/".$id."/")) {
                mkdir("./uploads/".$this->data['currentModule']."/".$id."/", 0777);
            }
            
            rename("./uploads/temp/".$_POST['imagen'], "./uploads/".$this->data['currentModule'].'/'.$id.'/'.$_POST['imagen']);
            
            $this->model->update($id,array('imagen' => $_POST['imagen']));
        }
        
        if(!empty($_POST['imagen']) && file_exists("./uploads/".$this->data['currentModule']."/".$id."/".$_POST['imagen']))
            $this->model->update($id,array('imagen' => $_POST['imagen']));
    }


    public function iframe_imagen(){
    }
    
    public function upload_imagen() {
        
        if ($_POST['id'] != '') {
            $path = '/uploads/'.$this->data['currentModule'].'/'.$_POST['id'];
            $config['upload_path'] = '.'.$path;
        }
        else {
            $path = '/uploads/temp';
            $config['upload_path'] = '.'.$path;
        }
        
        if(!file_exists('./uploads')) {
            mkdir('./uploads', 0777);
        }
        
        if(!file_exists('./uploads/temp')) {
            mkdir('./uploads/temp', 0777);
        }
        
        if(!file_exists('./uploads/'.$this->data['currentModule'])) {
            mkdir('./uploads/'.$this->data['currentModule'], 0777);
        }
        
        if(!file_exists($config['upload_path'])) {
            mkdir($config['upload_path'], 0777);
        }
        
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size'] = '102400';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto_upload')) {
            $data = $this->upload->data();
            echo "<script>parent.finishUpload('".$path.'/'.$data['file_name']."');</script>";
        }
        else {
            echo "<script>alert('".$this->upload->display_errors()."');</script>";
        }
    }

}