<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemandu extends AUTH_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Pemandu_model','FM');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataPemandu'] 	= $this->FM->select_all();

		$data['page'] 		= "pemandu";
		$data['judul'] 		= "Data Pemandu ";
		$data['deskripsi'] 	= "Manage Data Pemandu";

		$data['modal_tambah_pemandu'] = show_my_modal('modals/modal_tambah_pemandu', 'tambah-pemandu', $data);

		$this->template->views('pemandu/home', $data);
	}

	public function tampil() {
		$data['dataPemandu'] = $this->FM->select_all();
		$this->load->view('pemandu/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('nama_pemandu', 'Pemandu', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
		$this->form_validation->set_rules('no_tlp', 'No_Tlp', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->FM->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pemandu Successfully Added', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data pemandu Failed Added', '20px');
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
		$data['dataPemandu'] 	= $this->FM->select_by_id($id);

		echo show_my_modal('modals/modal_update_pemandu', 'update-pemandu', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('nama_pemandu', 'Pemandu', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
		$this->form_validation->set_rules('no_tlp', 'No_Tlp', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->FM->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pemandu Successfully  Update', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data pemandu Failed Update', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}
		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->FM->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Pemandu Successfully Delete', '20px');
		} else {
			echo show_err_msg('Data Pemandu Successfully Failed', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['obat'] = $this->FM->select_by_id($id);
		$data['jumlahPemandu'] = $this->FM->total_rows();

		echo show_my_modal('modals/modal_detail_pemandu', 'detail-pemandu', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->FM->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Nama Pemandu");
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', "Deskripsi");
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', "No Telpon");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id_pemandu); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama_pemandu); 
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->deskripsi);
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->no_tlp);
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Pengguna.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data pengguna.xlsx', NULL);
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
						$check = $this->FM->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->FM->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Pemandu Successfully Import to database'));
						redirect('pemandu');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data pemandu failed import to database (Already update)', 'warning', 'fa-warning'));
					redirect('pemandu');
				}

			}
		}
	}
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */