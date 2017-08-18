<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lit_app_lib extends CI_Model {

    public function penulis(){
		echo "Veri Arinal";
		echo "Senior Software Engineer"; 
		echo "PT. Langit Infotama!";
		echo "Date Created 10 Juli 2016";
	}
	
	public function CheckAuthoritation($pa)
	{
		
        $usernya = $this->session->userdata('username');
		$sql = $this->db->query("SELECT * FROM core_identity_user WHERE user_id = '$usernya'");
		foreach ($sql->result() as $row){
			    $uv = substr($row->lit_authority, $pa, 1);                
        }
		return $uv;		
	}
	
	
}
