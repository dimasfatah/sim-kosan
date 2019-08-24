<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH . 'libraries/Format.php';

class Datakamar extends REST_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model("M_admin",'admin');
       
    }

    public function index_get(){
        $hasil=$this->admin->get_all_kamar()->result();
        if(!$hasil){
            $this->response([
                'status' => FALSE,
                'message' => 'No data were found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }else{
            $this->response([
                'status' => True,
                'message' => 'Success',
                'data' => $hasil
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
    }

}
