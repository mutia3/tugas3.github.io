<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ulasan_model extends CI_Model {

	public function select_all() {		
		$data = $this->db->get("ulasan");
		return $data->result();
	}

	public function select_by_id($id) {
		$this->db->where('id_ulasan',$id);
		$data = $this->db->get("ulasan");		
		return $data->row();
	}

	public function insert($data) {
		$data = array(
			'ID_Destinasi' => $data['id_destinasi'],
			'Komentar' => $data['komentar'],
			'Rating' => $data['rating'],
			'Waktu' => $data['waktu']
		);
		$this->db->insert('ulasan', $data);
		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('ulasan', $data);
		return $this->db->affected_rows();
	}

	public function update($data) {
		$list = array(
			'ID_Destinasi' => $data['id_destinasi'],
			'Komentar' => $data['komentar'],
			'Rating' => $data['rating'],
			'Waktu' => $data['waktu']
		);
		$this->db->where('ID_Ulasan',$data['id_ulasan']);
		$this->db->update('ulasan', $list);				
		return $this->db->affected_rows();
	}

	public function delete($id) {
		$this->db->where('id_ulasan', $id);
		$this->db->delete('ulasan');
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('Komentar', $nama);
		$data = $this->db->get('ulasan');
		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('ulasan');
		return $data->num_rows();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */