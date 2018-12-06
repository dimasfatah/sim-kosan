<?php
Class Admin extends MY_Controller{

	public function __construct(){
  		parent::__construct();
  		$this->cekLogin();
		$this->load->database();
		$this ->load-> model('m_admin');
		//validasi jika session dengan level manager mengakses halaman ini maka akan dialihkan ke halaman manager
    	if ($this->session->userdata('level') == "superadmin") {
      		redirect('admin/superadmin');
 		}
	}

	public function index(){
		$this->load->view('v_topbar');
		$this->load->view('v_endbar');
	}

	public function beranda(){

	}

	public function data_penghuni(){
		
        $data['data']=$this ->m_admin->get_penghuni()->result();


		$this->load->view('v_topbar');
		$this->load->view('v_data_penghuni',$data);
		$this->load->view('v_endbar');

	}

	public function data_kamar(){

	}

	public function data_tagihan(){

	}





}
?>