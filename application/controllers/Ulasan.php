<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ulasan extends AUTH_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Ulasan_model','UM');
		$this->load->model('Destinasi_model','DM');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataDestinasi'] 	= $this->DM->select_all();
		$data['dataUlasan'] 	= $this->UM->select_all();

		$data['page'] 		= "ulasan";
		$data['judul'] 		= "Data Ulasan ";
		$data['deskripsi'] 	= "Manage Data Ulasan";

		$data['modal_tambah_ulasan'] = show_my_modal('modals/modal_tambah_ulasan', 'tambah-ulasan', $data);

		$this->template->views('ulasan/home', $data);
	}

	public function tampil() {
		$data['dataDestinasi'] = $this->DM->select_all();
		$data['dataUlasan'] = $this->UM->select_all();
		$this->load->view('ulasan/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('id_destinasi', 'ID_Destinasi', 'trim|required');
		$this->form_validation->set_rules('komentar', 'Komentar', 'trim|required');
		$this->form_validation->set_rules('rating', 'Rating', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('jam', 'Jam', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->UM->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Ulasan Successfully Added', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data ulasan Failed Added', '20px');
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

		$data['dataDestinasi'] = $this->DM->select_all(); 
		$data['dataUlasan'] = $this->UM->select_by_id($id);

		echo show_my_modal('modals/modal_update_ulasan', 'update-ulasan', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('id_destinasi', 'ID_Destinasi', 'trim|required');
		$this->form_validation->set_rules('komentar', 'Komentar', 'trim|required');
		$this->form_validation->set_rules('rating', 'Rating', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('jam', 'Jam', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->UM->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Ulasan Successfully  Update', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data ulasan Failed Update', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}
		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->UM->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Ulasan Successfully Delete', '20px');
		} else {
			echo show_err_msg('Data Ulasan Successfully Failed', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['ulasan'] = $this->UM->select_by_id($id);
		$data['jumlahUlasan'] = $this->UM->total_rows();

		echo show_my_modal('modals/modal_detail_ulasan', 'detail-ulasan', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->UM->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID Ulasan"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "ID Destinasi");
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', "Komentar");
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', "Rating");
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', "Tanggal");
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', "Jam");


		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id_ulasan); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->id_destinasi); 
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->komentar);
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->rating);
			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->tanggal);
			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->jam);

		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data ulasan.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data ulasan.xlsx', NULL);
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
						$check = $this->UM->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->UM->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Ulasan Successfully Import to database'));
						redirect('ulasan');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data ulasan failed import to database (Already update)', 'warning', 'fa-warning'));
					redirect('ulasan');
				}

			}
		}
	}
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */