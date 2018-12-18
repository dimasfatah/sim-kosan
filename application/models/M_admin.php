<?php
class M_admin extends CI_Model {

public function get_penghuni(){
		$this->db->select('tb_penghuni.*,tb_kamar.no_kamar,tb_kamar.lantai');
        $this->db->join('tb_kamar','tb_kamar.id_kamar = tb_penghuni.id_kamar');
        $this->db->from('tb_penghuni');
        return $this->db->get();
	}
public function delete_penghuni($id_penghuni){
		return $this->db->query("DELETE FROM tb_penghuni WHERE id_penghuni='$id_penghuni'");
		
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
 public function cari_id_kamar($lantai,$no_kamar){
 		$this->db->select('*');
 		$this->db->where('lantai', $lantai);
 		$this->db->where('no_kamar',$no_kamar);
      	$this->db->from('tb_kamar');
      	return $this->db->get()->row();
 }	
 public function insert_penghuni($data){
 	$this->db->insert('tb_penghuni',$data);
 }

public function jumlah_penghuni(){

		$query = $this->db->query("SELECT count(id_penghuni) as jumlah FROM `tb_penghuni`");
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