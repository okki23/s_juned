<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_masuk extends Parent_controller {

  var $parsing_form_input = array('id','nama_barang','barcode','jumlah');
  var $tablename = 't_barang_masuk';

    public function __construct() {
        parent::__construct();
        $this->load->model('m_barang_masuk','mbm');


    }

    public function index() {

        $data['listing'] = $this->mbm->get_all($id=NULL,$this->tablename)->result();
        echo json_encode($data['listing']);

    }

        public function save(){

        $datapos = array('id'=>$this->input->post('id'),
                           'nama_barang'=>$this->input->post('nama_barang'),
                           'barcode'=>$this->input->post('barcode'),
                           'jumlah'=>$this->input->post('jumlah'));
        $save = $this->db->query("insert into t_barang_masuk (id,nama_barang,barcode,jumlah) values (null,'$datapos[nama_barang]','$datapos[barcode]','$datapos[jumlah]') ");

          if($save){
            echo "<script language=javascript>
             alert('Simpan Data Berhasil');
             window.location='" . base_url('user') . "';
                 </script>";
          }

        }

        public function delete(){
          $idpost = $this->input->post('id');

          $del = $this->db->query("delete from t_barang_masuk where id = '$idpost' ");

          if($del){
            echo "<script language=javascript>
             alert('Hapus Data Berhasil');
             window.location='" . base_url('user') . "';
                 </script>";
          }
        }

        public function update(){
          $datapos = array('id'=>$this->input->post('id'),
                             'nama_barang'=>$this->input->post('nama_barang'),
                             'barcode'=>$this->input->post('barcode'),
                             'jumlah'=>$this->input->post('jumlah'));
        $save = $this->db->query("
        insert into m_user (id,nama,email,password) values (null,'$datapos[nama]','$datapos[email]','$datapos[password]') ");
        if($save){
          echo "<script language=javascript>
           alert('Update Data Berhasil');
           window.location='" . base_url('user') . "';
               </script>";
        }
        }

}
