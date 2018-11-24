<?php
Class Admin extends MY_Controller{

	public function __construct(){
  		parent::__construct();
  		$this->cekLogin();
		$this->load->database();
		//validasi jika session dengan level manager mengakses halaman ini maka akan dialihkan ke halaman manager
    	if ($this->session->userdata('level') == "superadmin") {
      		redirect('admin/superadmin');
 		}
	}

	public function index(){
		$this->load->view('v_topbar');
		$this->load->view('v_endbar');
	}





}
?>