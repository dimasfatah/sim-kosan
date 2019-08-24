<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
		$data['count'] = $this->m_admin->jumlah_penghuni()->row();
		$data['isi'] = $this->m_admin->jumlah_kamarterisi()->row();
		$data['kamar'] = $this->m_admin->jumlah_kamar()->row();
		$data['Lantai'] = $this->m_admin->jumlah_berdasarkanlantai()->result();


		$this->load->view('v_topbar');		
		$this->load->view('v_beranda',$data);
		$this->load->view('v_javascript');
		$this->load->view('v_endbar');   
	}

	public function data_penghuni(){
        $data['data']=$this ->m_admin->get_penghuni()->result();
        $data['kamar']=$this ->m_admin->get_kamar()->result();


		$this->load->view('v_topbar');
		$this->load->view('v_data_penghuni',$data);
		$this->load->view('v_javascript');
		$this->load->view('v_data_penghuni_js');
		$this->load->view('v_endbar');

	}

	public function ganti_password(){
		$this->load->view('v_topbar');
 		$this->load->view('v_form_ganti_password');
 		$this->load->view('v_javascript');
 		$this->load->view('v_form_ganti_password_js');
 		$this->load->view('v_endbar');
	}

	public function proses_ganti_password(){
		$password=$this->session->userdata('password');
		$username=$this->session->userdata('username');
		$pw_lama=md5($this->input->post('pw_lama'));
		$pw_baru=md5($this->input->post('pw_baru'));
		if($password==$pw_lama){
		$data= array(
			'username'=>$username,
			'password'=>$pw_baru,
			'level'=>$this->session->userdata('level'),
		);
		$this->db->where(username,$username);
		$this->db->update('tb_user',$data);
		}
	}
	 
 	public function tambah_pengeluaran(){
 		$this->load->view('v_topbar');
 		$this->load->view('v_tambah_pengeluaran');
 		$this->load->view('v_javascript');
 		$this->load->view('v_tambah_pengeluaran_js');
 		$this->load->view('v_endbar');
 	}

 	public function tambah_pemasukan(){
 		$this->load->view('v_topbar');
 		$this->load->view('v_tambah_pemasukan');
 		$this->load->view('v_javascript');
 		$this->load->view('v_tambah_pemasukan_js');
 		$this->load->view('v_endbar');
 	}

 	public function tambah_pembayaran(){
 		$data['kamar']=$this ->m_admin->get_kamar()->result();

 		$this->load->view('v_topbar');
 		$this->load->view('v_tambah_pembayaran',$data);
 		$this->load->view('v_javascript');
 		$this->load->view('v_tambah_pembayaran_js');
 		$this->load->view('v_endbar');
	}
	 
	public function data_kamar(){
		$data['data']=$this ->m_admin->get_all_kamar()->result();


		$this->load->view('v_topbar');
		$this->load->view('v_data_kamar',$data);
		$this->load->view('v_javascript');
		$this->load->view('v_data_kamar_js');
		$this->load->view('v_endbar');

	}

	public function data_tagihan(){
		$data['data']=$this->m_admin->get_tagihan()->result();
		$data['kamar']=$this->m_admin->get_kamar()->result();

		$this->load->view('v_topbar');
		$this->load->view('v_data_tagihan',$data); 
		$this->load->view('v_javascript');
		$this->load->view('v_data_tagihan_js');
		$this->load->view('v_endbar');
	}

	public function data_tagihan_now(){
		$month=date('m');
		if ($month == '01'){$bulan ='januari';}
		else if($month =='02'){$bulan='februari';}
		else if($month =='03'){$bulan='maret';}
		else if($month =='04'){$bulan='april';}
		else if($month =='05'){$bulan='mei';}
		else if($month =='06'){$bulan='juni';}
		else if($month =='07'){$bulan='juli';}
		else if($month =='08'){$bulan='agustus';}
		else if($month =='09'){$bulan='september';}
		else if($month =='10'){$bulan='oktober';}
		else if($month =='11'){$bulan='november';}
		else {$bulan='desember';}
		$data['data']=$this->m_admin->get_tagihan_now($bulan)->result();

		$this->load->view('v_topbar');
		$this->load->view('v_data_tagihan_now',$data); 
		$this->load->view('v_javascript');
		$this->load->view('v_data_tagihan_js');
		$this->load->view('v_endbar');

	}

	public function pemasukan(){
		$data['data']=$this->m_admin->get_pemasukan()->result();

		$this->load->view('v_topbar');
		$this->load->view('v_pemasukan',$data);
		$this->load->view('v_javascript');
		$this->load->view('v_endbar');
	}

	public function pembayaran(){
		$data['data']=$this->m_admin->get_pembayaran()->result();

		$this->load->view('v_topbar');
		$this->load->view('v_pembayaran',$data);

		$this->load->view('v_javascript');
		$this->load->view('v_endbar');
	}

	public function pengeluaran(){
		$data['data']=$this->m_admin->get_pengeluaran()->result();

		$this->load->view('v_topbar');
		$this->load->view('v_pengeluaran',$data);
		$this->load->view('v_javascript');
		$this->load->view('v_endbar');
	}
	public function laporan(){
		$data['tahun']=$this->m_admin->get_laporan_year()->result();
		$data['year']=$this->m_admin->get_laporan_year()->result();
		$data['data']=$this->m_admin->ambil_laporan()->result();

		$this->load->view('v_topbar');
		$this->load->view('v_laporan',$data);
		$this->load->view('v_javascript');
		$this->load->view('v_laporan_js');
		$this->load->view('v_endbar');

	}
	
	



}
?>