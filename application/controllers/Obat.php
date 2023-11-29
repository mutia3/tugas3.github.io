<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends AUTH_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Obat_model','OM');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataObat'] 	= $this->OM->select_all();

		$data['page'] 		= "obat";
		$data['judul'] 		= "Data Obat ";
		$data['deskripsi'] 	= "Manage Data Obat";

		$data['modal_tambah_obat'] = show_my_modal('modals/modal_tambah_obat', 'tambah-obat', $data);

		$this->template->views('obat/home', $data);
	}

	public function tampil() {
		$data['dataObat'] = $this->OM->select_all();
		$this->load->view('obat/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('nama_obat', 'Obat', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->OM->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Obat Successfully Added', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data obat Failed Added', '20px');
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
		$data['dataObat'] 	= $this->OM->select_by_id($id);

		echo show_my_modal('modals/modal_update_obat', 'update-obat', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('nama_obat', 'Obat', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->OM->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Obat Successfully  Update', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data obat Failed Update', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}
		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->OM->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Obat Successfully Delete', '20px');
		} else {
			echo show_err_msg('Data Obat Successfully Failed', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['obat'] = $this->OM->select_by_id($id);
		$data['jumlahObat'] = $this->OM->total_rows();

		echo show_my_modal('modals/modal_detail_obat', 'detail-obat', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->OM->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Nama Obat");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id_obat); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama_obat); 
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->keterangan); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data obat.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data obat.xlsx', NULL);
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
						$check = $this->OM->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->OM->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Obat Successfully Import to database'));
						redirect('obat');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Obat failed import to database (Already update)', 'warning', 'fa-warning'));
					redirect('obat');
				}

			}
		}
	}
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */