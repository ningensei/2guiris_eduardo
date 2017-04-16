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

    public function onAfterSave($id='') {
        if($_POST['url']) {
            //Get the SoundCloud URL
            $url= $_POST['url'];

            //Get the JSON data of song details with embed code from SoundCloud oEmbed
            $getValues=file_get_contents('http://soundcloud.com/oembed?format=js&url='.$url.'&iframe=true');
            // $getValues=file_get_contents('http://soundcloud.com/oembed?format=js&url='.$url);

            //Clean the Json to decode
            $decodeiFrame=substr($getValues, 1, -2);

            //json decode to convert it as an array
            $jsonObj = json_decode($decodeiFrame);

            //Change the height of the embed player if you want else uncomment below line
            // echo $jsonObj->html;
            //Print the embed player to the page
            
            $jsonObj->html = str_replace('height="400"', 'height="160"', $jsonObj->html);
            echo str_replace('visual=true', '', $jsonObj->html);
        }
        exit;
    }
}