<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        $data['baseurl'] = $this->config->item('base_url');
        $this->load->view('home', $data);
    }

    

}
