<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_res_goods extends Parent_model {
/*select a.* from t_res_goods a
left join m_goods b on b.id = a.id_barang
*/
	public function get_new($arrdata){
		$setting = new StdClass();

				foreach ($arrdata as $key => $column_order) {
						$setting->$column_order = '';
				}

				return $setting;
	}

  public function opt_kode_produksis(){
	 return	$this->db->get('t_using_goods')->result();
	}

	public function update_when_delete($id,$qty){

		return $this->db->query("update m_goods set qty = qty - $qty
		where id = '$id' ");

	}

	public function list_res_goods(){
		return $this->db->query('select a.*,b.nama_barang,case when a.status_res_production = 1 then "Good" else "Bad" end as status from t_res_production a
		left join m_goods b on b.id = a.id_barang')->result();
	}




	public function get_no(){
		$query = $this->db->query("SELECT SUBSTR(MAX(no_po),-7) AS id  FROM t_res_goods");
					//$query = $this->db->query("select max(personnel_id) as id from human_pa_md_emp_personal");

		return $query;
	}

}
