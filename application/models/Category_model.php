<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	public function select_all() {		
		$data = $this->db->get("categories");
		return $data->result();
	}

	public function select_by_id($id) {
		$this->db->where('CategoryID',$id);
		$data = $this->db->get("categories");		
		return $data->row();
	}

	public function insert($data) {
		$data = array(
			'CategoryName' => $data['categoryname'],
			'Description' => $data['description']
		);
		$this->db->insert('categories', $data);
		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('categories', $data);
		return $this->db->affected_rows();
	}

	public function update($data) {
		$list = array(
			'CategoryName' => $data['categoryname'],
			'Description' => $data['description']
		);
		$this->db->where('CategoryID',$data['category_id']);
		$this->db->update('categories', $list);				
		return $this->db->affected_rows();
	}

	public function delete($id) {
		$this->db->where('CategoryID', $id);
		$this->db->delete('categories');
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('CategoryName', $nama);
		$data = $this->db->get('categories');
		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('categories');
		return $data->num_rows();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */