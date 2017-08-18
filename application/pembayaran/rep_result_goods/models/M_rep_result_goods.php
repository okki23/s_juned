<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_rep_result_goods extends Parent_model {

	public function get_new($arrdata){
		$setting = new StdClass();

				foreach ($arrdata as $key => $column_order) {
						$setting->$column_order = '';
				}

				return $setting;
	}



	public function list_rep_result_goods(){
		return $this->db->query('select a.*,b.nama_barang from t_res_production a
		left join m_goods b on b.id = a.id_barang')->result();
	}

	public function print_rep_result_goods($start,$end){
		return $this->db->query("select a.*,b.nama_barang,case when a.status_res_production = 1 then 'Good' else 'Bad' end as status from t_res_production a
		left join m_goods b on b.id = a.id_barang where a.tgl_produksi BETWEEN '$start' AND '$end' ")->result();
	}

	public function get_no(){
		$query = $this->db->query("SELECT SUBSTR(MAX(no_po),-7) AS id  FROM t_rep_result_goods");
					//$query = $this->db->query("select max(personnel_id) as id from human_pa_md_emp_personal");

		return $query;
	}

}
