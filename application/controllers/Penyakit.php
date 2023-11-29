<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit extends AUTH_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Penyakit_model','PM');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataPenyakit'] 	= $this->PM->select_all();

		$data['page'] 		= "penyakit";
		$data['judul'] 		= "Data Penyakit ";
		$data['deskripsi'] 	= "Manage Data Penyakit";

		$data['modal_tambah_penyakit'] = show_my_modal('modals/modal_tambah_penyakit', 'tambah-penyakit', $data);

		$this->template->views('penyakit/home', $data);
	}

	public function tampil() {
		$data['dataPenyakit'] = $this->PM->select_all();
		$this->load->view('penyakit/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('nama_penyakit', 'Penyakit', 'trim|required');
		$this->form_validation->set_rules('tingkat_penyakit', 'Tingkat_Penyakit', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->PM->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Penyakit Successfully Added', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data penyakit Failed Added', '20px');
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
		$data['dataPenyakit'] 	= $this->PM->select_by_id($id);

		echo show_my_modal('modals/modal_update_penyakit', 'update-penyakit', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('nama_penyakit', 'Penyakit', 'trim|required');
		$this->form_validation->set_rules('tingkat_penyakit', 'Tingkat_Penyakit', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->PM->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Penyakit Successfully  Update', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data penyakit Failed Update', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}
		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->PM->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Penyakit Successfully Delete', '20px');
		} else {
			echo show_err_msg('Data Penyakit Successfully Failed', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['penyakit'] = $this->PM->select_by_id($id);
		$data['jumlahPenyakit'] = $this->PM->total_rows();

		echo show_my_modal('modals/modal_detail_penyakit', 'detail-penyakit', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->PM->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Nama Penyakit");
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', "Tingkat Penyakit");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id_penyakit); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama_penyakit); 
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->tingkat_penyakit); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data penyakit.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data penyakit.xlsx', NULL);
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
						$check = $this->PM->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->PM->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Penyakit Successfully Import to database'));
						redirect('penyakit');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Penyakit failed import to database (Already update)', 'warning', 'fa-warning'));
					redirect('penyakit');
				}

			}
		}
	}
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */