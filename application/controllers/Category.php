<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends AUTH_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Category_model','CM');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataCategory'] 	= $this->CM->select_all();

		$data['page'] 		= "category";
		$data['judul'] 		= "Data Category ";
		$data['deskripsi'] 	= "Manage Data Category";

		$data['modal_tambah_category'] = show_my_modal('modals/modal_tambah_category', 'tambah-category', $data);

		$this->template->views('category/home', $data);
	}

	public function tampil() {
		$data['dataCategory'] = $this->CM->select_all();
		$this->load->view('category/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('categoryname', 'Category', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->CM->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Category Successfully Added', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data category Failed Added', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;
		$id 				= trim($_POST['id']);
		$data['dataCategory'] 	= $this->CM->select_by_id($id);

		echo show_my_modal('modals/modal_update_category', 'update-category', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('categoryname', 'Category', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->CM->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Category Successfully  Update', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data category Failed Update', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}
		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->CM->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Category Successfully Delete', '20px');
		} else {
			echo show_err_msg('Data Category Successfully Failed', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['category'] = $this->CM->select_by_id($id);
		$data['jumlahCategory'] = $this->CM->total_rows();

		echo show_my_modal('modals/modal_detail_category', 'detail-category', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->CM->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Category Name");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->CategoryID); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->CategoryName); 
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->Description); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data kategory.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data kategory.xlsx', NULL);
	}

	public function import() {
		$this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {
			$this->session->set_flashdata('msg', 'File harus diisi');
		} else {
			$config['upload_path'] = './assets/excel/';
			$config['allowed_types'] = 'xls|xlsx';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('excel')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = $this->upload->data();
				
				error_reporting(E_ALL);
				date_default_timezone_set('Asia/Jakarta');

				include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

				$inputFileName = './assets/excel/' .$data['file_name'];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

				$index = 0;
				foreach ($sheetData as $key => $value) {
					if ($key != 1) {
						$check = $this->CM->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->CM->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Category Successfully Import to database'));
						redirect('category');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Category failed import to database (Already update)', 'warning', 'fa-warning'));
					redirect('category');
				}

			}
		}
	}
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */