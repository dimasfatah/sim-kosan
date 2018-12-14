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
$data['count'] = $this->m_admin->jumlah_penghuni()->row();
$data['isi'] = $this->m_admin->jumlah_kamarterisi()->row();
$data['kamar'] = $this->m_admin->jumlah_kamar()->row();
$data['Lantai'] = $this->m_admin->jumlah_berdasarkanlantai()->result();


		$this->load->view('v_topbar');		
		$this->load->view('v_pengeluaran',$data);
		$this->load->view('v_endbar');   
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

	public function pengeluaran(){
	
	}


}
?>