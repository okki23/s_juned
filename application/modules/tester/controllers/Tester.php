<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tester extends CI_Controller {

	public function __construct() {
			parent::__construct();
			$this->load->model('tester_model');

	}

	public function index(){
		$data['id'] = $this->transaksi_id();

		$this->load->view('tester/view_tester',$data);
	}

	public function transaksi_id($param = '') {
			$data = $this->tester_model->get_no();
			$lastid = $data->row();
			$idnya = $lastid->id;


			if ($idnya == '') { // bila data kosong
					$ID = $param . "0000001";
					//00000001
			} else {
					$MaksID = $idnya;
					$MaksID++;
					if ($MaksID < 10)
							$ID = $param . "000000" . $MaksID;
					else if ($MaksID < 100)
							$ID = $param . "00000" . $MaksID;
					else if ($MaksID < 1000)
							$ID = $param . "0000" . $MaksID;
					else if ($MaksID < 10000)
							$ID = $param . "000" . $MaksID;
					else if ($MaksID < 100000)
							$ID = $param . "00" . $MaksID;
					else if ($MaksID < 1000000)
							$ID = $param . "0" . $MaksID;
					else
							$ID = $MaksID;
			}

			return $ID;
	}

	public function pro(){
					$this->load->library("pdf");
					$this->load->library("email");

					$postdata = $this->input->post();

					$data['no_ref'] = $postdata['no_ref'];
					$data['p_asuransi'] = $postdata['p_asuransi'];

	        $this->pdf->setPrintHeader(false);
	        $this->pdf->setPrintFooter(true, 'aku', 'kau');
	        $this->pdf->SetHeaderData("", "", 'Judul Header', "codedb.co");
	        $this->pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	        // set auto page breaks
	        $this->pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	        // add a page
	        $this->pdf->AddPage("L", "A4");
	        // set font
	        $this->pdf->SetFont("helvetica", "", 9);
	        $html = $this->load->view('tester/view_prints', $data, true);

	        $this->pdf->writeHTML($html, true, false, true, false, "");
	        ob_end_clean();
	        //$this->pdf->Output("Employee Information.pdf", "I");
	        $this->pdf->Output('c:/xampp/htdocs/s_emah/store_files/'.$postdata['no_ref'].'.pdf', 'F');

					$this->email->clear();
				$this->email->to('okkisetyawan@gmail.com');
				$this->email->from('okkisetyawan@gmail.com');
				$this->email->subject('Informasi TES EOQ');
				$this->email->message('Jadi bos');
				$this->email->attach('c:/xampp/htdocs/s_emah/store_files/'.$postdata['no_ref'].'.pdf');
				$this->email->send();
				if($this->email->send()){
					echo "<script language=javascript>
              alert('Oke cingcai Bos Berhasil');
              window.location='".base_url()."tester';
            </script>";
				}


	}
}
