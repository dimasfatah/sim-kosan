<?php
class M_admin extends CI_Model {

public function get_penghuni(){
		$this->db->select('tb_penghuni.*,tb_kamar.no_kamar,tb_kamar.lantai');
        $this->db->join('tb_kamar','tb_kamar.id_kamar = tb_penghuni.id_kamar');
        $this->db->from('tb_penghuni');
        return $this->db->get();
	}

}
?>	