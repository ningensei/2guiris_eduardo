<?php
include "AdminController.php";

class Videos extends AdminController{

    public function __construct() 
    {
        parent::__construct();
        $this->data['defaultSort'] = "id";
        $this->load->model('Videos_model', 'Videos');
        $this->model = $this->Videos;
        $this->page = "videos";
        $this->data['currentModule'] = "videos";
        $this->data['page'] = $this->page;
        $this->data['route'] = site_url('admin/' . $this->page);    
        $this->pageSegment = 5;
        $this->data['page_title'] = "Videos";
        $this->limit = 50;
        $this->init();
        $this->validate = FALSE;
    }

    public function video_id($url)
    {
        $path = parse_url($url, PHP_URL_PATH);
        $pathFragments = explode('/', $path);
        return end($pathFragments);
    }

    public function onBeforeSave($id='')
    {
        if($url = $_POST['url']) {

            if (preg_match("/vimeo/i", $_POST['url'], $match)) {
                // Vimeo
                $_POST['url'] = 'https://player.vimeo.com/video/'.$this->video_id($url);
                $_POST['host'] = 'vimeo';

            } else if (preg_match("/youtu/i", $_POST['url'], $match)) {
                // Youtube
                $_POST['url'] = 'http://www.youtube.com/embed/'.$this->video_id($url);
                $_POST['host'] = 'youtube';
            }

        }

    }

}