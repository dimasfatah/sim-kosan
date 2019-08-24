<?php

defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Mobile_api extends REST_Controller {
    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get(){
        $user=$this->get('user');
        //$pw=$this->get('password');
        $this->db->where('username',$user);
        //$this->db->where('password',$pw);
        $result = $this->db->get('tb_user')->result();

        $this->response($result,200);
    }

}