<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends AUTH_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Dokter_model','DM');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataDokter'] 	= $this->DM->select_all();

		$data['page'] 		= "dokter";
		$data['judul'] 		= "Data Dokter ";
		$data['deskripsi'] 	= "Manage Data Dokter";

		$data['modal_tambah_dokter'] = show_my_modal('modals/modal_tambah_dokter', 'tambah-dokter', $data);

		$this->template->views('dokter/home', $data);
	}

	public function tampil() {
		$data['dataDokter'] = $this->DM->select_all();
		$this->load->view('dokter/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('nama_dokter', 'Dokter', 'trim|required');
		$this->form_validation->set_rules('spesialis', 'Spesialis', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('no_tlp', 'No_Tlp', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->DM->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Dokter Successfully Added', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data dokter Failed Added', '20px');
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
		$data['dataDokter'] 	= $this->DM->select_by_id($id);

		echo show_my_modal('modals/modal_update_dokter', 'update-dokter', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('nama_dokter', 'Dokter', 'trim|required');
		$this->form_validation->set_rules('spesialis', 'Spesialis', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('no_tlp', 'No_Tlp', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->DM->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Dokter Successfully  Update', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data dokter Failed Update', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}
		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->DM->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Dokter Successfully Delete', '20px');
		} else {
			echo show_err_msg('Data Dokter Successfully Failed', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['obat'] = $this->DM->select_by_id($id);
		$data['jumlahDokter'] = $this->DM->total_rows();

		echo show_my_modal('modals/modal_detail_dokter', 'detail-dokter', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->DM->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Nama Obat");
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', "Spesialis");
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', "Alamat");
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', "No Telpon");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id_dokter); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama_dokter); 
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->spesialis);
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->alamat);
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->no_tlp);
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data dokter.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data dokter.xlsx', NULL);
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
						$check = $this->DM->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->DM->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Dokter Successfully Import to database'));
						redirect('dokter');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data dokter failed import to database (Already update)', 'warning', 'fa-warning'));
					redirect('dokter');
				}

			}
		}
	}
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */