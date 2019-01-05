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

	public function delete_penghuni(){
		$id_penghuni= $this->input->post('id_penghuni');
		$this->m_admin->delete_penghuni($id_penghuni);
		echo json_encode($id_penghuni);
	}

	public function delete_kamar(){
		$id_kamar= $this->input->post('id_kamar');
		$this->m_admin->delete_kamar($id_kamar);
		echo json_encode($id_kamar);
	}

	public function nokamar(){
		$lantai=$this->input->post('lantai');
 		$nomor = $this->m_admin->cari_nomor($lantai)->result(); 
 		echo '<option> Nomor </option>';
 		foreach ($nomor as $r){
		echo '<option value='.$r->no_kamar.'>'.$r->no_kamar.'</option>'; 
 		}
	 }
	 public function nokamar_terisi(){
		$lantai=$this->input->post('lantai');
 		$nomor = $this->m_admin->cari_nomor_terisi($lantai)->result(); 
 		echo '<option> Nomor </option>';
 		foreach ($nomor as $r){
		echo '<option value='.$r->no_kamar.'>'.$r->no_kamar.'</option>'; 
 		}
 	}
 	public function nokamar_kosong(){
		$lantai=$this->input->post('lantai');
 		$nomor = $this->m_admin->cari_nomor_kosong($lantai)->result(); 
 		echo '<option> Nomor </option>';
 		foreach ($nomor as $r){
		echo '<option value='.$r->no_kamar.'>'.$r->no_kamar.'</option>'; 
 		}
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
	 

 	public function data_all_penghuni(){
 		$data=$this->m_admin->get_penghuni()->result();
 		echo json_encode($data);
 	}
 	public function lihat_penghuni(){
 		$id=$this->input->get('id');
 		$data=$this->m_admin->get_penghuni_by_id($id);
 		echo json_encode($data);
 	}
 	public function lihat_kamar(){
 		$id=$this->input->get('id');
 		$data=$this->m_admin->get_kamar_by_id($id);
 		echo json_encode($data);
 	}
 	public function update_penghuni(){
 		$id=$this->input->post('id_penghuni');
 		$lantai=$this->input->post('lantai_edit');
 		$no_kamar=$this->input->post('no_kamar_edit');
 		$query = $this->m_admin->cari_id_kamar($lantai,$no_kamar);
 		$data = array(
			'id_kamar' => $query->id_kamar,
			'nama_depan' => $this->input->post('nama_depan_edit'),
			'nama_belakang' => $this->input->post('nama_belakang_edit'),
			'no_ktp' => $this->input->post('no_ktp_edit'),
			'plat_nomor'=>$this->input->post('plat_nomor_edit'),
			'alamat'=>$this->input->post('alamat_edit'),
			'no_telp'=>$this->input->post('no_hp_edit'),
			'tempat_lahir'=>$this->input->post('ttl_edit'),
			'tanggal_lahir'=>$this->input->post('tgl_edit'),
		);
		$this->db->where('id_penghuni',$id);
		$this->db->update('tb_penghuni',$data);
 	}

 	public function update_kamar(){
 		$id=$this->input->post('id_kamar');
 		$lantai=$this->input->post('lantai');
 		$no_kamar=$this->input->post('no_kamar');
 		$query = $this->m_admin->cari_id_kamar($lantai,$no_kamar);
 		$data = array(
			'id_kamar' => $query->id_kamar,
			'kamar_mandi'=>$this->input->post('kamar_mandi'),
			'luas_kamar'=>$this->input->post('luas_kamar'),
		);
		$this->db->where('id_kamar',$id);
		$this->db->update('tb_kamar',$data);
	}

 		public function tambah_pengeluaran(){
 		$this->load->view('v_topbar');
 		$this->load->view('v_tambah_pengeluaran');
 		$this->load->view('v_javascript');
 		$this->load->view('v_tambah_pengeluaran_js');
 		$this->load->view('v_endbar');
 	}

 	public function proses_tambah_pengeluaran(){
 		$data = array(
 			'keterangan' =>$this->input->post('keterangan') ,
 			'nominal' =>$this->input->post('nominal'),
 			'tgl_kredit' =>$this->input->post('tgl_kredit')
 		);
 		$this->db->insert('tb_kredit',$data);

 	}
 	public function tambah_pemasukan(){
 		$this->load->view('v_topbar');
 		$this->load->view('v_tambah_pemasukan');
 		$this->load->view('v_javascript');
 		$this->load->view('v_tambah_pemasukan_js');
 		$this->load->view('v_endbar');
 	}

 	public function proses_tambah_pemasukan(){
 		$data = array(
 			'keterangan' =>$this->input->post('keterangan') ,
 			'nominal' =>$this->input->post('nominal'),
 			'tgl_pemasukan' =>$this->input->post('tgl_pemasukan')
 		);
 		$this->db->insert('tb_pemasukan',$data);
 	}

 	public function tambah_pembayaran(){
 		$data['kamar']=$this ->m_admin->get_kamar()->result();

 		$this->load->view('v_topbar');
 		$this->load->view('v_tambah_pembayaran',$data);
 		$this->load->view('v_javascript');
 		$this->load->view('v_tambah_pembayaran_js');
 		$this->load->view('v_endbar');
 	}
 	public function proses_tambah_pembayaran(){
 		$lantai=$this->input->post('lantai');
 		$no_kamar=$this->input->post('no_kamar');
 		$query = $this->m_admin->cari_id_kamar($lantai,$no_kamar);
 		$id_kamar = $query->id_kamar;
 		$tagihan= $this->m_admin->cari_id_tagihan($id_kamar);
 		$id_tagihan = $tagihan->id_tagihan;
 		$bulan_awal = $this->input->post('bulan_awal');
 		$bulan_akhir = $this->input->post('bulan_akhir');
 		$bulan = $this->input->post('bulan');
 		$query_nominal_tagihan= $this->m_admin->cari_nominal($id_tagihan);
 		$nominal_tagihan= $query_nominal_tagihan->jumlah_tagihan;
 		$jumlah_pembayaran=($nominal_tagihan*$bulan);
 		if($bulan_awal==$bulan_akhir){
 			$keterangan=("Pembayaran kos kamar ".$lantai." No ".$no_kamar." bulan ".$bulan_akhir." ");
 		} else{
 			$keterangan=("Pembayaran kos ".$lantai." No ".$no_kamar." bulan ".$bulan_awal." - ".$bulan_akhir);
 		}
 		$data = array(
 			'id_tagihan' => $id_tagihan ,
 			'keterangan' => $keterangan ,
 			'bulan'	=> $bulan ,
 			'tgl_pembayaran' => $this->input->post('tanggal_pembayaran'),
 			'total_pembayaran' => $jumlah_pembayaran,
 			 );
 		$this->db->insert('tb_pembayaran',$data);
 		$this->m_admin->ubah_status_tagihan($id_tagihan,$bulan_akhir);
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

 	public function tambah_kamar(){
 		$data = array(
			'no_kamar' => $this->input->post('no_kamar'),
			'lantai' => $this->input->post('lantai'),
			'kamar_mandi' => $this->input->post('kamar_mandi'),
			'luas_kamar' => $this->input->post('luas_kamar')			
		);
		$this->db->insert('tb_kamar',$data);
 	}
	 public function tambah_tagihan(){
		 $no=$this->input->post('no_kamar');
		 $lantai=$this->input->post('lantai');
		 $query = $this->m_admin->cari_id_kamar($lantai,$no);
 		 $id_kamar = $query->id_kamar;

		$data = array(
		   'id_kamar' => $id_kamar,
		   'jumlah_tagihan' => $this->input->post('tagihan'),
		   'batas' => $this->input->post('batas'),			
	   );
	   $this->db->insert('tb_tagihan',$data);
	   $this->m_admin->ubah_status_kamar($id_kamar);
	}
	public function ubah_status_kamar(){
		$id_kamar=$this->input->post('id');
		$this->m_admin->ubah_status_kosong($id_kamar);
		$this->m_admin->delete_penghuni_by_kamar($id_kamar);
		$this->m_admin->delete_tagihan_by_kamar($id_kamar);
	}
	public function data_kamar(){
		$data['data']=$this ->m_admin->get_all_kamar()->result();


		$this->load->view('v_topbar');
		$this->load->view('v_data_kamar',$data);
		$this->load->view('v_javascript');
		$this->load->view('v_data_kamar_js');
		$this->load->view('v_endbar');

	}

	/*public function data_tagihan(){
		$data['data']=$this ->m_admin->get_penghuni()->result();
        $data['kamar']=$this ->m_admin->get_kamar()->result();


		$this->load->view('v_topbar');
		$this->load->view('v_coba_penghuni',$data);
		$this->load->view('v_javascript');
		$this->load->view('v_endbar');
	}*/

	public function data_tagihan(){
		$data['data']=$this->m_admin->get_tagihan()->result();
		$data['kamar']=$this->m_admin->get_kamar()->result();

		$this->load->view('v_topbar');
		$this->load->view('v_data_tagihan',$data); 
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
	public function pdf_laporan(){
		$this->load->library('pdf');

		
		
		$bulan=$this->input->post('bulan');
		$tahun=$this->input->post('tahun');
		$format=$this->input->post('format');
		$data=$this->m_admin->print_laporan($tahun,$bulan)->result();

		if($format=="PDF"){
		$pdf = new Mypdf();
        // membuat halaman baru
        $pdf->AddPage('P','A4',0);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',14);
		// mencetak string
		//$pdf->image(base_url('assets/images/logo_sm.png'),9,6); 
        $pdf->Cell(0,7,'LAPORAN KEUANGAN DHIMAS JAYA KOS',0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$bulan_tahun="Bulan ".$bulan." Tahun ".$tahun;
        $pdf->Cell(0,5,$bulan_tahun,0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
		$pdf->Cell(10,7,'','B',1,'C');
		//head table
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(15,10,'NO',1,0,'C');
        $pdf->Cell(60,10,'Keterangan',1,0,'C');
        $pdf->Cell(40,10,'Debet',1,0,'C');
		$pdf->Cell(40,10,'Kredit',1,0,'C');
		$pdf->Cell(0,10,'Tanggal',1,1,'C');
		//isi table
		$pdf->SetFont('Times','',12);
		$no=1;
		$tkredit=0.00;
		$tdebit=0.00;
		foreach($data as $row){
			if (empty($row->keterangan_pemasukan)&&empty($row->keterangan_pembayaran)) {
				$keterangan=$row->keterangan_kredit;
				}elseif (empty($row->keterangan_pemasukan)&&empty($row->keterangan_kredit)) {
				$keterangan=$row->keterangan_pembayaran;
				}else{
				$keterangan=$row->keterangan_pemasukan;
				}
			if (empty($row->tanggal_pemasukan)&&empty($row->tanggal_pembayaran)) {
				$tanggal=$row->tanggal_kredit;
				}elseif (empty($row->tanggal_pemasukan)&&empty($row->tanggal_kredit)) {
				$tanggal=$row->tanggal_pembayaran;
				}else{
				$tanggal=$row->tanggal_pemasukan;
				}
				
			if (empty($row->debit_pemasukan)&&empty($row->debit_pembayaran)) {
				$debit= "-"; 
				} elseif (empty($row->debit_pembayaran)) {
					$debit= $row->debit_pemasukan;
					$tdebit += $debit;
				} else{
					$debit= $row->debit_pembayaran;
					$tdebit += $debit;
				}
		
			if (empty($row->kredit)) {
				$kredit= "-";
				}
			  	else{
				$kredit= $row->kredit;
				$tkredit += $kredit;
				}
			
		//tambah
				   
		//isi CELL
			//$pdf->Cell(15,10,$no,1,0,'C');
			//$pdf->Cell(60,10,$keterangan,1,0);
			//$pdf->Cell(40,10,$debit,1,0);
			//$pdf->Cell(40,10,$kredit,1,0);
			//$pdf->Cell(0,10,$tanggal,1,1,'C');

			$x=$pdf->GetX();
			$pdf->mycell(15,10,$x,$no,'C');
			$x=$pdf->GetX();
			$pdf->mycell(60,10,$x,$keterangan,'');
			$x=$pdf->GetX();
			$pdf->mycell(40,10,$x,$debit,'C');
			$x=$pdf->GetX();
			$pdf->mycell(40,10,$x,$kredit,'C');
			$x=$pdf->GetX();
			$pdf->mycell(0,10,$x,$tanggal,'C');
			$pdf->Ln();
				
			$no++;
		}
		$pdf->Cell(75,10,'Total',1,0,'C');
		$pdf->Cell(40,10,$tdebit,1,0);
		$pdf->Cell(40,10,$tkredit,1,0);
        $format="Laporan".$bulan."th ".$tahun."pdf";
		$pdf->Output('D',$format);
	
		}
		else{
			header("Content-type:application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=Laporan.xls");
			echo "<table align='center' cellspacing='0px' border='1px'>
			<tr>
			<th>No</th> 
            <th>Keterangan</th>
            <th>Debet</th>
            <th>Kredit</th>
			<th>Tanggal Transaksi</th>
			</tr>
			";
			$no=1;
		$tkredit=0.00;
		$tdebit=0.00;
		foreach($data as $row){
			if (empty($row->keterangan_pemasukan)&&empty($row->keterangan_pembayaran)) {
				$keterangan=$row->keterangan_kredit;
				}elseif (empty($row->keterangan_pemasukan)&&empty($row->keterangan_kredit)) {
				$keterangan=$row->keterangan_pembayaran;
				}else{
				$keterangan=$row->keterangan_pemasukan;
				}
			if (empty($row->tanggal_pemasukan)&&empty($row->tanggal_pembayaran)) {
				$tanggal=$row->tanggal_kredit;
				}elseif (empty($row->tanggal_pemasukan)&&empty($row->tanggal_kredit)) {
				$tanggal=$row->tanggal_pembayaran;
				}else{
				$tanggal=$row->tanggal_pemasukan;
				}
				
			if (empty($row->debit_pemasukan)&&empty($row->debit_pembayaran)) {
				$debit= "-"; 
				} elseif (empty($row->debit_pembayaran)) {
					$debit= $row->debit_pemasukan;
					$tdebit += $debit;
				} else{
					$debit= $row->debit_pembayaran;
					$tdebit += $debit;
				}
		
			if (empty($row->kredit)) {
				$kredit= "-";
				}
			  	else{
				$kredit= $row->kredit;
				$tkredit += $kredit;
				}
			
		echo "
			<tr>
			<td>".$no."</td> 
			<td>".$keterangan."</td>
			<td>".$debit."</td>
			<td>".$kredit."</td>
			<td>".$tanggal."</td>
			</tr>
			";
			$no++;	

		}
		echo"
			<tr>
			<td></td> 
			<td>Jumlah</td>
			<td>".$tdebit."</td>
			<td>".$tkredit."</td>
			<td></td>
			</tr>
		";
		echo"</table>";
		}
    }
	



}
?>