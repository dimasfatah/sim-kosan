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
		$this->load->view('v_javascript');
		$this->load->view('v_endbar');
	}

	public function beranda(){ 
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
		$this->load->view('v_endbar');

	}

	public function delete_penghuni(){
		$id_penghuni= $this->input->post('id_penghuni');
		$this->m_admin->delete_penghuni($id_penghuni);
		echo json_encode($id_penghuni);
	}

	public function nokamar(){
 		$nomor = $this->M_admin->cari_nomor( $this->input->post('lantai')->result()); 
 		echo '<option> NO Kamar </option>';
 		foreach ($nomor as $r){
		echo '<option>'.$r->no_kamar.'</option>'; 
 		}
 	}

 	public function data_all_penghuni(){
 		$data=$this->m_admin->get_penghuni()->result();
 		echo json_encode($data);
 	}

 	public function tambah_penghuni(){
 		$lantai=$this->input->post('lantai');
 		$no_kamar=$this->input->post('no_kamar');
 		$query = $this->m_admin->cari_id_kamar($lantai,$no_kamar);
 		$data = array(
			'id_kamar' => $query->id_kamar,
			'nama_depan' => $this->input->post('nama_depan'),
			'nama_belakang' => $this->input->post('nama_belakang'),
			'no_ktp' => $this->input->post('no_ktp'),
			'plat_nomor'=>$this->input->post('plat'),
			'alamat'=>$this->input->post('alamat'),
			'no_telp'=>$this->input->post('no_hp'),
			'tempat_lahir'=>$this->input->post('ttl'),
			'tanggal_lahir'=>$this->input->post('tgl'),
		);
		$this->m_admin->insert_penghuni($data); // Calling Insert Model and its function.
 	}

	public function data_kamar(){
		$data['data']=$this ->m_admin->get_all_kamar()->result();


		$this->load->view('v_topbar');
		$this->load->view('v_data_kamar',$data);
		$this->load->view('v_javascript');
		$this->load->view('v_endbar');

	}

	public function data_tagihan(){

	}

	public function pengeluaran(){
	
	}


}
?>