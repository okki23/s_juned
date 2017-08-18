<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_req_goods extends Parent_model {
/*select a.*,b.nama_supplier,c.nama_barang from t_req_goods a
left join m_supplier b on b.id = a.id_supplier
left join m_goods c on c.id = a.id_barang
*/
	public function get_new($arrdata){
		$setting = new StdClass();

				foreach ($arrdata as $key => $column_order) {
						$setting->$column_order = '';
				}

				return $setting;
	}

  public function opt_goods(){
	 return	$this->db->get('m_goods')->result();
	}

	public function opt_supplier(){
	 return	$this->db->get('m_supplier')->result();
	}

	public function list_req_goods(){
		return $this->db->query('select a.*,b.nama_supplier,c.nama_barang from t_req_goods a
		left join m_supplier b on b.id = a.id_supplier
		left join m_goods c on c.id = a.id_barang')->result();
	}

	public function get_no(){
		$query = $this->db->query("SELECT SUBSTR(MAX(no_po),-7) AS id  FROM t_req_goods");
					//$query = $this->db->query("select max(personnel_id) as id from human_pa_md_emp_personal");

		return $query;
	}

}
