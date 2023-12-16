<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function select_all() {		
		$data = $this->db->get("transaksi");
		return $data->result();
	}

	public function select_by_id($id) {
		$this->db->where('id_transaksi',$id);
		$data = $this->db->get("transaksi");		
		return $data->row();
	}

	public function insert($data) {
		$data = array(
			'ID_Destinasi' => $data['id_destinasi'],
			'ID_Pengguna' => $data['id_pengguna'],
			'Tanggal_Transaksi' => $data['tanggal_transaksi'],
			'Total_Bayar' => $data['total_bayar'],
			'Metode_Bayar' => $data['metode_bayar']
		);
		$this->db->insert('transaksi', $data);
		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('transaksi', $data);
		return $this->db->affected_rows();
	}

	public function update($data) {
		$list = array(
			'ID_Destinasi' => $data['id_destinasi'],
			'ID_Pengguna' => $data['id_pengguna'],
			'Tanggal_Transaksi' => $data['tanggal_transaksi'],
			'Total_Bayar' => $data['total_bayar'],
			'Metode_Bayar' => $data['metode_bayar']
		);
		$this->db->where('ID_Transaksi',$data['id_transaksi']);
		$this->db->update('transaksi', $list);				
		return $this->db->affected_rows();
	}

	public function delete($id) {
		$this->db->where('id_transaksi', $id);
		$this->db->delete('transaksi');
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('Tanggal_Transaksi', $nama);
		$data = $this->db->get('transaksi');
		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('transaksi');
		return $data->num_rows();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */