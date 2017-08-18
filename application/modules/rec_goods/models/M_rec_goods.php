<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_rec_goods extends Parent_model {
/*select a.* from t_rec_goods a
left join m_goods b on b.id = a.id_barang
*/
	public function get_new($arrdata){
		$setting = new StdClass();

				foreach ($arrdata as $key => $column_order) {
						$setting->$column_order = '';
				}

				return $setting;
	}

  public function opt_po(){
	 return	$this->db->get('t_req_goods')->result();
	}

	public function update_when_delete($id,$qty){

		return $this->db->query("update m_goods set qty = qty - $qty
		where id = '$id' ");

	}

	public function list_rec_goods(){
		return $this->db->query('select a.*,b.nama_barang from t_rec_goods a
		left join m_goods b on b.id = a.id_barang')->result();
	}



	public function get_no(){
		$query = $this->db->query("SELECT SUBSTR(MAX(no_po),-7) AS id  FROM t_rec_goods");
					//$query = $this->db->query("select max(personnel_id) as id from human_pa_md_emp_personal");

		return $query;
	}

}
