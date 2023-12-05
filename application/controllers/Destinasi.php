<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Destinasi extends AUTH_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Destinasi_model','DM');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataDestinasi'] 	= $this->DM->select_all();

		$data['page'] 		= "destinasi";
		$data['judul'] 		= "Data Destinasi ";
		$data['deskripsi'] 	= "Manage Data Destinasi";

		$data['modal_tambah_destinasi'] = show_my_modal('modals/modal_tambah_destinasi', 'tambah-destinasi', $data);

		$this->template->views('destinasi/home', $data);
	}

	public function tampil() {
		$data['dataDestinasi'] = $this->DM->select_all();
		$this->load->view('destinasi/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('nama_destinasi', 'Destinasi', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
		$this->form_validation->set_rules('latitude', 'Latitude', 'trim|required');
		$this->form_validation->set_rules('longitude', 'Longitude', 'trim|required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
        $this->form_validation->set_rules('foto', 'Foto', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->DM->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Destinasi Successfully Added', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data destinasi Failed Added', '20px');
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
		$data['dataDestinasi'] 	= $this->DM->select_by_id($id);

		echo show_my_modal('modals/modal_update_destinasi', 'update-destinasi', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('nama_destinasi', 'Destinasi', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
		$this->form_validation->set_rules('latitude', 'Latitude', 'trim|required');
		$this->form_validation->set_rules('longitude', 'Longitude', 'trim|required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
        $this->form_validation->set_rules('foto', 'Foto', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->DM->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Destinasi Successfully  Update', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data destinasi Failed Update', '20px');
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
			echo show_succ_msg('Data Destinasi Successfully Delete', '20px');
		} else {
			echo show_err_msg('Data Destinasi Successfully Failed', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['obat'] = $this->DM->select_by_id($id);
		$data['jumlahDestinasi'] = $this->DM->total_rows();

		echo show_my_modal('modals/modal_detail_destinasi', 'detail-destinasi', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->DM->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Nama Destinasi");
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', "Deskripsi");
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', "Latitude");
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', "Longitude");
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', "Lokasi");
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', "Foto");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id_destinasi); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama_destinasi); 
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->deskripsi);
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->latitude);
			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->longitude);
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->lokasi);
			$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->foto);
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Destinasi.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data destinasi.xlsx', NULL);
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
						$this->session->set_flashdata('msg', show_succ_msg('Data Destinasi Successfully Import to database'));
						redirect('destinasi');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data destinasi failed import to database (Already update)', 'warning', 'fa-warning'));
					redirect('destinasi');
				}

			}
		}
	}
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */