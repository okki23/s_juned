<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends CI_Controller {

	 
	public function index()
	{
		$this->load->view('mail/view_mail');
	}
	
	
	public function pro(){
		
		$this->load->library('email');

        //$this->email->from('okkisetyawan@gmail.com', 'Notifikasi Mail Apps');
		
		
        
	 
		foreach($this->input->post("rec") as $day){
			//echo $day;
			
			$this->email->clear();
			$this->email->to($day);
			$this->email->from('okkisetyawan@gmail.com');
			$this->email->subject('Informasi TEH HA ER  '.$day);
			$this->email->message('Berdoa dulu ya TEH HA ER nya belum sampe, mungkin besok,mungkin lusa,mungkin bulan depan, atau tahun depan hihihi');
			$this->email->send();
			
		}
		 
	}
}
