<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jqupload extends CI_Controller {

	 
	public function index()
	{
		$this->load->view('jqupload/view_jqupload');
	}
	 
	public function upload_files(){
		
	}
}
