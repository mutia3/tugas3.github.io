<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends AUTH_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Pasien_model','PM');
		$this->load->model('Dokter_model','DM');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataDokter'] = $this->DM->select_all();
		$data['dataPasien'] = $this->PM->select_all();

		$data['page'] 		= "pasien";
		$data['judul'] 		= "Data Pasien ";
		$data['deskripsi'] 	= "Manage Data Pasien";

		$data['modal_tambah_pasien'] = show_my_modal('modals/modal_tambah_pasien', 'tambah-pasien', $data);

		$this->template->views('pasien/home', $data);
	}

	public function tampil() {
		$data['dataDokter'] = $this->DM->select_all();
		$data['dataPasien'] = $this->PM->select_all();
		$this->load->view('pasien/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('no_identitas', 'No_Identitas', 'trim|required');
		$this->form_validation->set_rules('nama_pasien', 'Pasien', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'No_Telp', 'trim|required');
		$this->form_validation->set_rules('id_dokter', 'ID_Dokter', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->PM->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pasien Successfully Added', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data pasien Failed Added', '20px');
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
		$data['dataDokter'] = $this->DM->select_all(); 
		$data['dataPasien'] = $this->PM->select_by_id($id);

		echo show_my_modal('modals/modal_update_pasien', 'update-pasien', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('no_identitas', 'No_Identitas', 'trim|required');
		$this->form_validation->set_rules('nama_pasien', 'Pasien', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'No_Telp', 'trim|required');
		$this->form_validation->set_rules('id_dokter', 'id dokter', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->PM->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pasien Successfully  Update', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data pasien Failed Update', '20px');
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
			echo show_succ_msg('Data Pasien Successfully Delete', '20px');
		} else {
			echo show_err_msg('Data Pasien Successfully Failed', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['pasien'] = $this->PM->select_by_id($id);
		$data['jumlahPasien'] = $this->PM->total_rows();

		echo show_my_modal('modals/modal_detail_pasien', 'detail-pasien', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->PM->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "No Identitas");
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', "Nama Pasien");
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', "Jenis Kelamin");
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', "Alamat");
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', "No Telpon");
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', "ID Dokter");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id_pasien); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->no_identitas); 
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->nama_pasien);
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->jenis_kelamin); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->alamat); 
			$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->no_telp);
			$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->id_dokter);  
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data pasien.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data pasien.xlsx', NULL);
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
						$this->session->set_flashdata('msg', show_succ_msg('Data Pasien Successfully Import to database'));
						redirect('pasien');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Pasien failed import to database (Already update)', 'warning', 'fa-warning'));
					redirect('pasien');
				}

			}
		}
	}
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */