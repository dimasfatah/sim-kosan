<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH . 'libraries/Format.php';

class Auth extends REST_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model("m_login",'login');
       
    }

    public function index_get(){
        $user=$this->get('username');
        $pw=$this->get('password');

        $hasil=$this->login->cekAkun($user,$pw);
        if($hasil===1){
            $this->response([
                'status' => FALSE,
                'message' => 'No users were found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }else if($hasil===2){
            $this->response([
                'status' => FALSE,
                'message' => 'Password is wrong'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }else{
            $this->response([
                'status' => True,
                'message' => 'authenticated',
                'data' => $hasil
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
    }

}
