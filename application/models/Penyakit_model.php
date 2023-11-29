<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit_model extends CI_Model {

	public function select_all() {		
		$data = $this->db->get("penyakit");
		return $data->result();
	}

	public function select_by_id($id) {
		$this->db->where('id_penyakit',$id);
		$data = $this->db->get("penyakit");		
		return $data->row();
	}

	public function insert($data) {
		$data = array(
			'Nama_Penyakit' => $data['nama_penyakit'],
			'Tingkat_Penyakit' => $data['tingkat_penyakit']
		);
		$this->db->insert('penyakit', $data);
		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('penyakit', $data);
		return $this->db->affected_rows();
	}

	public function update($data) {
		$list = array(
			'Nama_Penyakit' => $data['nama_penyakit'],
			'Tingkat_Penyakit' => $data['tingkat_penyakit']
		);
		$this->db->where('ID_Penyakit',$data['id_penyakit']);
		$this->db->update('penyakit', $list);				
		return $this->db->affected_rows();
	}

	public function delete($id) {
		$this->db->where('ID_Penyakit', $id);
		$this->db->delete('penyakit');
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('Nama_Penyakit', $nama);
		$data = $this->db->get('penyakit');
		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('penyakit');
		return $data->num_rows();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */