<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model {

	public function select_all() {		
		$data = $this->db->get("pengguna");
		return $data->result();
	}

	public function select_by_id($id) {
		$this->db->where('id_pengguna',$id);
		$data = $this->db->get("pengguna");		
		return $data->row();
	}

	public function insert($data) {
		$data = array(
			'Nama_Pengguna' => $data['nama_pengguna'],
			'Password' => $data['password'],
			'Email' => $data['email'],
			'Tanggal_Lahir' => $data['tanggal_lahir']
		);
		$this->db->insert('pengguna', $data);
		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('pengguna', $data);
		return $this->db->affected_rows();
	}

	public function update($data) {
		$list = array(
			'Nama_Pengguna' => $data['nama_pengguna'],
			'Password' => $data['password'],
			'Email' => $data['email'],
			'Tanggal_Lahir' => $data['tanggal_lahir']
		);
		$this->db->where('ID_Pengguna',$data['id_pengguna']);
		$this->db->update('pengguna', $list);				
		return $this->db->affected_rows();
	}

	public function delete($id) {
		$this->db->where('id_pengguna', $id);
		$this->db->delete('pengguna');
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('Nama_Pengguna', $nama);
		$data = $this->db->get('pengguna');
		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('pengguna');
		return $data->num_rows();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */