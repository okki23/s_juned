<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tester_model extends CI_Model {
	public function get_no(){
		$query = $this->db->query("SELECT SUBSTR(MAX(no_ref),-7) AS id  FROM m_asuransi");
	        //$query = $this->db->query("select max(personnel_id) as id from human_pa_md_emp_personal");

		return $query;
	}

}
