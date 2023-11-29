<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat_model extends CI_Model {

	public function select_all() {		
		$data = $this->db->get("obat");
		return $data->result();
	}

	public function select_by_id($id) {
		$this->db->where('id_obat',$id);
		$data = $this->db->get("obat");		
		return $data->row();
	}

	public function insert($data) {
		$data = array(
			'Nama_Obat' => $data['nama_obat'],
			'Keterangan' => $data['keterangan']
		);
		$this->db->insert('obat', $data);
		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('obat', $data);
		return $this->db->affected_rows();
	}

	public function update($data) {
		$list = array(
			'Nama_Obat' => $data['nama_obat'],
			'Keterangan' => $data['keterangan']
		);
		$this->db->where('ID_Obat',$data['id_obat']);
		$this->db->update('obat', $list);				
		return $this->db->affected_rows();
	}

	public function delete($id) {
		$this->db->where('ID_Obat', $id);
		$this->db->delete('obat');
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('Nama_Obat', $nama);
		$data = $this->db->get('obat');
		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('obat');
		return $data->num_rows();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */