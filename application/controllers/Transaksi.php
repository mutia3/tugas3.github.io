<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends AUTH_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Transaksi_model','TM');
		$this->load->model('Destinasi_model','DM');
		$this->load->model('Pengguna_model','PM');        
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
        $data['dataPengguna'] = $this->PM->select_all();
		$data['dataDestinasi'] = $this->DM->select_all();
		$data['dataTransaksi'] = $this->TM->select_all();

		$data['page'] 		= "transaksi";
		$data['judul'] 		= "Data Transaksi ";
		$data['deskripsi'] 	= "Manage Data Transaksi";

		$data['modal_tambah_transaksi'] = show_my_modal('modals/modal_tambah_transaksi', 'tambah-transaksi', $data);

		$this->template->views('transaksi/home', $data);
	}

	public function tampil() {
        $data['dataPengguna'] = $this->PM->select_all();
		$data['dataDestinasi'] = $this->DM->select_all();
		$data['dataTransaksi'] = $this->TM->select_all();
		$this->load->view('transaksi/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('id_destinasi', 'ID_Destinasi', 'trim|required');
		$this->form_validation->set_rules('id_pengguna', 'ID_Pengguna', 'trim|required');
		$this->form_validation->set_rules('tanggal_transaksi', 'Tanggal_Transaksi', 'trim|required');
		$this->form_validation->set_rules('total_bayar', 'Total_Bayar', 'trim|required');
		$this->form_validation->set_rules('metode_bayar', 'Metode_Bayar', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->TM->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Transaksi Successfully Added', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data transaksi Failed Added', '20px');
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
		$data['dataPengguna'] = $this->PM->select_all(); 
		$data['dataDestinasi'] = $this->DM->select_all(); 
		$data['dataTransaksi'] = $this->TM->select_by_id($id);

		echo show_my_modal('modals/modal_update_transaksi', 'update-transaksi', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('id_destinasi', 'ID_Destinasi', 'trim|required');
		$this->form_validation->set_rules('id_pengguna', 'ID_Pengguna', 'trim|required');
		$this->form_validation->set_rules('tanggal_transaksi', 'Tanggal_Transaksi', 'trim|required');
		$this->form_validation->set_rules('total_bayar', 'Total_Bayar', 'trim|required');
		$this->form_validation->set_rules('metode_bayar', 'Metode_Bayar', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->TM->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Transaksi Successfully  Update', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data transaksi Failed Update', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}
		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->TM->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Transaksi Successfully Delete', '20px');
		} else {
			echo show_err_msg('Data Transaksi Successfully Failed', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['transaksi'] = $this->TM->select_by_id($id);
		$data['jumlahTransaksi'] = $this->TM->total_rows();

		echo show_my_modal('modals/modal_detail_transaksi', 'detail-transaksi', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->TM->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID Transaksi"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "ID Destinasi");
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', "ID Pengguna");
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', "Tanggal Trabsaksi");
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', "Total Bayar");
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', "Metode Bayar");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id_transaksi); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->id_destinasi); 
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->id_pengguna);
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->tanggal_transaksi); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->total_bayar); 
			$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->metode_bayar);
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data transaksi.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data transaksi.xlsx', NULL);
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
						$check = $this->TM->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->TM->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Transaksi Successfully Import to database'));
						redirect('transaksi');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Transaksi failed import to database (Already update)', 'warning', 'fa-warning'));
					redirect('transaksi');
				}

			}
		}
	}
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */