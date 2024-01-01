<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemandu_model extends CI_Model {

	public function select_all() {		
		$data = $this->db->get("pemandu");
		return $data->result();
	}

	public function select_by_id($id) {
		$this->db->where('id_pemandu',$id);
		$data = $this->db->get("pemandu");		
		return $data->row();
	}

	public function insert($data) {
		$data = array(
			'Nama_Pemandu' => $data['nama_pemandu'],
			'Deskripsi' => $data['deskripsi'],
			'No_Tlp' => $data['no_tlp']
		);
		$this->db->insert('pemandu', $data);
		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('pemandu', $data);
		return $this->db->affected_rows();
	}

	public function update($data) {
		$list = array(
			'Nama_Pemandu' => $data['nama_pemandu'],
			'Deskripsi' => $data['deskripsi'],
			'No_Tlp' => $data['no_tlp']
		);
		$this->db->where('ID_Pemandu',$data['id_pemandu']);
		$this->db->update('pemandu', $list);				
		return $this->db->affected_rows();
	}

	public function delete($id) {
		$this->db->where('id_pemandu', $id);
		$this->db->delete('pemandu');
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('Nama_Pemandu', $nama);
		$data = $this->db->get('pemandu');
		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('pemandu');
		return $data->num_rows();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */