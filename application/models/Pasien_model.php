<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_model extends CI_Model {

	public function select_all() {		
		$data = $this->db->get("pasien");
		return $data->result();
	}

	public function select_by_id($id) {
		$this->db->where('id_pasien',$id);
		$data = $this->db->get("pasien");		
		return $data->row();
	}

	public function insert($data) {
		$data = array(
			'No_Identitas' => $data['no_identitas'],
			'Nama_Pasien' => $data['nama_pasien'],
			'Jenis_Kelamin' => $data['jenis_kelamin'],
			'Alamat' => $data['alamat'],
			'No_Telp' => $data['no_telp'],
			'ID_Dokter' => $data['id_dokter']
		);
		$this->db->insert('pasien', $data);
		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('pasien', $data);
		return $this->db->affected_rows();
	}

	public function update($data) {
		$list = array(
			'No_Identitas' => $data['no_identitas'],
			'Nama_Pasien' => $data['nama_pasien'],
			'Jenis_Kelamin' => $data['jenis_kelamin'],
			'Alamat' => $data['alamat'],
			'No_Telp' => $data['no_telp'],
			'ID_Dokter' => $data['id_dokter']
		);
		$this->db->where('ID_Pasien',$data['id_pasien']);
		$this->db->update('pasien', $list);				
		return $this->db->affected_rows();
	}

	public function delete($id) {
		$this->db->where('id_pasien', $id);
		$this->db->delete('pasien');
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('Nama_Pasien', $nama);
		$data = $this->db->get('pasien');
		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('pasien');
		return $data->num_rows();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */