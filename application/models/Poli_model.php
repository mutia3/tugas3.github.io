<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poli_model extends CI_Model {

	public function select_all() {		
		$data = $this->db->get("poliklinik");
		return $data->result();
	}

	public function select_by_id($id) {
		$this->db->where('id_poli',$id);
		$data = $this->db->get("poliklinik");		
		return $data->row();
	}

	public function insert($data) {
		$data = array(
			'Nama_Poli' => $data['nama_poli'],
			'Gedung' => $data['gedung'],
			'ID_Penyakit' => $data['id_penyakit']
		);
		$this->db->insert('poliklinik', $data);
		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('poliklinik', $data);
		return $this->db->affected_rows();
	}

	public function update($data) {
		$list = array(
			'Nama_Poli' => $data['nama_poli'],
			'Gedung' => $data['gedung'],
			'ID_Penyakit' => $data['id_penyakit']
		);
		$this->db->where('ID_Poli',$data['id_poli']);
		$this->db->update('poliklinik', $list);				
		return $this->db->affected_rows();
	}

	public function delete($id) {
		$this->db->where('ID_Poli', $id);
		$this->db->delete('poliklinik');
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('Nama_Poli', $nama);
		$data = $this->db->get('poliklinik');
		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('penyakit');
		return $data->num_rows();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */