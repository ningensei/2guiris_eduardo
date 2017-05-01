<?php
include "AdminController.php";

class Audios extends AdminController{

    function __construct() {
        parent::__construct();
        $this->data['defaultSort'] = "id";
        $this->load->model('Audios_model', 'Audios');
        $this->model = $this->Audios;
        $this->page = "audios";
        $this->data['currentModule'] = "audios";
        $this->data['page'] = $this->page;
        $this->data['route'] = site_url('admin/' . $this->page);    
        $this->pageSegment = 5;
        $this->data['page_title'] = "Audios";
        $this->limit = 50;
        $this->init();
        $this->validate = FALSE;
    }


    //create function with an exception
    public function checkURL($url) {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new Exception("La url proporcionada no es válida");
        }
        
        $getValues=file_get_contents('http://soundcloud.com/oembed?format=js&url='.$url.'&iframe=true');

        //Clean the Json to decode
        $decodeiFrame=substr($getValues, 1, -2);

        //json decode to convert it as an array
        $jsonObj = json_decode($decodeiFrame);
        
        // replace some visual attributes
        $jsonObj->html = str_replace('height="400"', 'height="160"', $jsonObj->html);
        $jsonObj->html = str_replace('visual=true', '', $jsonObj->html);
        
        $_POST['iframe'] = $jsonObj->html;
    }


    public function onBeforeSave($id='') {
        
        

        if($_POST['url']) {
            //Get the SoundCloud URL
            $url= $_POST['url'];

            try {
              $this->checkURL($url);
            }

            catch(Exception $e) {
                $this->session->set_flashdata('error', $e->getMessage());
                redirect($_SERVER['HTTP_REFERER']);
            }
            
        }

    }
}