<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter_model extends CI_Model {

	public function select_all() {		
		$data = $this->db->get("dokter");
		return $data->result();
	}

	public function select_by_id($id) {
		$this->db->where('id_dokter',$id);
		$data = $this->db->get("dokter");		
		return $data->row();
	}

	public function insert($data) {
		$data = array(
			'Nama_Dokter' => $data['nama_dokter'],
			'Spesialis' => $data['spesialis'],
			'Alamat' => $data['alamat'],
			'No_Tlp' => $data['no_tlp']
		);
		$this->db->insert('dokter', $data);
		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('dokter', $data);
		return $this->db->affected_rows();
	}

	public function update($data) {
		$list = array(
			'Nama_Dokter' => $data['nama_dokter'],
			'Spesialis' => $data['spesialis'],
			'Alamat' => $data['alamat'],
			'No_Tlp' => $data['no_tlp']
		);
		$this->db->where('ID_Dokter',$data['id_dokter']);
		$this->db->update('dokter', $list);				
		return $this->db->affected_rows();
	}

	public function delete($id) {
		$this->db->where('id_dokter', $id);
		$this->db->delete('dokter');
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('Nama_Dokter', $nama);
		$data = $this->db->get('dokter');
		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('dokter');
		return $data->num_rows();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */