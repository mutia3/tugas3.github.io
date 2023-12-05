<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Destinasi_model extends CI_Model {

	public function select_all() {		
		$data = $this->db->get("destinasi");
		return $data->result();
	}

	public function select_by_id($id) {
		$this->db->where('id_destinasi',$id);
		$data = $this->db->get("destinasi");		
		return $data->row();
	}

	public function insert($data) {
		$data = array(
			'Nama_Destinasi' => $data['nama_destinasi'],
			'Deskripsi' => $data['deskripsi'],
			'Latitude' => $data['latitude'],
			'Longitude' => $data['longitude'],
            'Lokasi' => $data['lokasi'],
			'Foto' => $data['foto']
		);
		$this->db->insert('destinasi', $data);
		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('destinasi', $data);
		return $this->db->affected_rows();
	}

	public function update($data) {
		$list = array(
			'Nama_Destinasi' => $data['nama_destinasi'],
			'Deskripsi' => $data['deskripsi'],
			'Latitude' => $data['latitude'],
			'Longitude' => $data['longitude'],
            'Lokasi' => $data['lokasi'],
			'Foto' => $data['foto']
		);
		$this->db->where('ID_Destinasi',$data['id_destinasi']);
		$this->db->update('destinasi', $list);				
		return $this->db->affected_rows();
	}

	public function delete($id) {
		$this->db->where('id_destinasi', $id);
		$this->db->delete('destinasi');
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('Nama_Destinasi', $nama);
		$data = $this->db->get('destinasi');
		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('destinasi');
		return $data->num_rows();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */