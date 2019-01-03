<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_admin extends CI_Model {

public function get_penghuni(){
		$this->db->select('tb_penghuni.*,tb_kamar.no_kamar,tb_kamar.lantai');
        $this->db->join('tb_kamar','tb_kamar.id_kamar = tb_penghuni.id_kamar');
        $this->db->from('tb_penghuni');
        return $this->db->get();
	}
public function get_laporan(){
		$this->db->select('tb_transaksi.*','tb_pembayaran.keterangan','tb_pembayaran.tgl_pembayaran','tb_pembayaran.total_pembayaran','tb_pemasukan.keterangan','tb_pemasukan.nominal','tb_pemasukan.tgl_pemasukan','tb_kredit.keterangan','tb_kredit.nominal','tb_kredit.tgl_kredit'
	);
		$this->db->join('tb_pembayaran','tb_pembayaran.id_pembayaran = tb_transaksi.id_pembayaran');
		$this->db->join('tb_pemasukan','tb_pemasukan.id_pemasukan = tb_transaksi.id_pemasukan');
		$this->db->join('tb_kredit','tb_kredit.id_kredit = tb_transaksi.id_kredit');
		$this->db->from('tb_transaksi');
		return $this->db->get();
}	
public function get_tagihan(){
		$this->db->select('tb_tagihan.*,tb_kamar.no_kamar,tb_kamar.Lantai');
        $this->db->join('tb_kamar','tb_kamar.id_kamar = tb_tagihan.id_kamar'); 
        $this->db->from('tb_tagihan','tb_kamar');
        //$this->db->where('tb_tagihan.id_kamar = tb_kamar.id_kamar')
        return $this->db->get();
	}
public function get_pemasukan(){
		$this->db->select('tb_pemasukan.*');
		$this->db->from('tb_pemasukan');
		return $this->db->get();
}
public function get_pembayaran(){
		$this->db->select('tb_pembayaran.*');
		$this->db->from('tb_pembayaran');
		return $this->db->get();
}
public function get_pengeluaran(){
		$this->db->select('tb_kredit.*');
		$this->db->from('tb_kredit');
		return $this->db->get();
}
public function get_penghuni_by_id($id){
		$this->db->select('tb_penghuni.*,tb_kamar.no_kamar,tb_kamar.lantai');
        $this->db->join('tb_kamar','tb_kamar.id_kamar = tb_penghuni.id_kamar');
        $this->db->where('tb_penghuni.id_penghuni',$id);
        $this->db->from('tb_penghuni');
        $query = $this->db->get();
        return $query->row();
	}
public function get_kamar_by_id($id){
		$this->db->select('tb_kamar.*');
        
        $this->db->where('tb_kamar.id_kamar',$id);
        $this->db->from('tb_kamar');
        $query = $this->db->get();
        return $query->row();
	}	
public function delete_penghuni($id_penghuni){
		return $this->db->query("DELETE FROM tb_penghuni WHERE id_penghuni='$id_penghuni'");
		
}
public function delete_kamar($id_penghuni){
		return $this->db->query("DELETE FROM tb_kamar WHERE id_kamar='$id_kamar'");
		
}	

public function get_kamar(){
		$this->db->select('*');
		$this->db->group_by('lantai');
		$this->db->from('tb_kamar');
		return $this->db->get();
	}
public function get_all_kamar(){
		$this->db->select('*');
		$this->db->from('tb_kamar'); 
		return $this->db->get();
	}	
public function cari_nomor($lantai){
		 $this->db->select('*'); 
		 $this->db->where('lantai', $lantai); 
		 $this->db->order_by('no_kamar', 'asc');
		 $this->db->from('tb_kamar');

		 return $this->db->get();
 	}
public function cari_nomor_kosong($lantai){
		 $this->db->select('*'); 
		 $this->db->where('lantai', $lantai);
		 $this->db->where('status', 'Kosong'); 
		 $this->db->order_by('no_kamar', 'asc');
		 $this->db->from('tb_kamar');

		 return $this->db->get();
 	} 	
public function ubah_status_tagihan($id_tagihan,$bulan_akhir){
		$this->db->set('status',$bulan_akhir);
		$this->db->where('id_tagihan',$id_tagihan);
		$this->db->update('tb_tagihan');
	 }
public function ubah_status_kamar($id_kamar){
		$this->db->set('status','Terisi');
		$this->db->where('id_kamar',$id_kamar);
		$this->db->update('tb_kamar');
}
public function ubah_status_kosong($id_kamar){
	$this->db->set('status','Kosong');
	$this->db->where('id_kamar',$id_kamar);
	$this->db->update('tb_kamar');
}	

 public function cari_id_kamar($lantai,$no_kamar){
 		$this->db->select('*');
 		$this->db->where('lantai', $lantai);
 		$this->db->where('no_kamar',$no_kamar);
      	$this->db->from('tb_kamar');
      	return $this->db->get()->row();
 }	
public function cari_id_tagihan($id_kamar){
 		$this->db->select('*');
 		$this->db->where('id_kamar',$id_kamar);
      	$this->db->from('tb_tagihan');
      	return $this->db->get()->row();
 }
 public function cari_nominal($id_tagihan){
 		$this->db->select('*');
 		$this->db->where('id_tagihan', $id_tagihan);
      	$this->db->from('tb_tagihan');
      	return $this->db->get()->row();
 }		

 public function insert_penghuni($data){
 	$this->db->insert('tb_penghuni',$data);
 }

 public function delete_penghuni_by_kamar($id_kamar){
	 $this->db->where('id_kamar',$id_kamar);
	 $this->db->delete('tb_penghuni');
 }
 public function delete_tagihan_by_kamar($id_kamar){
	$this->db->where('id_kamar',$id_kamar);
	$this->db->delete('tb_tagihan');
}


public function jumlah_penghuni(){

		$query = $this->db->query("SELECT count(id_penghuni) as jumlah FROM `tb_penghuni`");
		return $query;
}
public function ambil_laporan(){
	$query = $this->db->query("select * from detail_transaksi");
	return $query;
}
public function get_laporan_year(){
	$query = $this->db->query("
	select * from detail_transaksi
        group by YEAR(tanggal_pemasukan) OR YEAR(tanggal_kredit) OR YEAR(tanggal_pembayaran)
	");
	return $query;
}
public function print_laporan($tahun,$bulan){
	$query = $this->db->query("
	SELECT * FROM detail_transaksi WHERE 
	DATE_FORMAT(tanggal_pembayaran,'%Y-%m')='".$tahun."-".$bulan."' OR
	DATE_FORMAT(tanggal_pemasukan,'%Y-%m')='".$tahun."-".$bulan."' OR
	DATE_FORMAT(tanggal_kredit,'%Y-%m')='".$tahun."-".$bulan."'
	");
	return $query;
}

public function jumlah_kamarterisi(){

		$query = $this->db->query("SELECT count(distinct id_kamar) as jumlah FROM `tb_penghuni`");
		return $query;
}

public function jumlah_kamar(){

		$query = $this->db->query("SELECT count(id_kamar) as jumlah FROM `tb_kamar`");
		return $query;
}

public function jumlah_berdasarkanlantai(){

		$query = $this->db->query("SELECT Lantai, count(no_kamar) as jumlah FROM `tb_kamar` group by Lantai");
		return $query;
}

		}
?>	