<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends Parent_controller {

  var $parsing_form_input = array('id','kode_pelanggan','nama_pelanggan','alamat','no_telp');
  var $tablename = 'm_pelanggan';

    public function __construct() {
        parent::__construct();
        $this->load->model('m_pelanggan','m_pelanggan');

    }

    public function index() {
    $data['listing'] = $this->m_pelanggan->get_all($id=NULL,$this->tablename)->result();
    echo json_encode($data['listing']);
  }

    public function save(){

      $datapos = array('id'=>$this->input->post('id'),
                         'kode_pelanggan'=>$this->input->post('kode_pelanggan'),
                         'nama_pelanggan'=>$this->input->post('nama_pelanggan'),
                         'alamat'=>$this->input->post('alamat'),
                         'no_telp'=>$this->input->post('no_telp')
                       );
      $save = $this->db->query("insert into m_pelanggan (id,kode_pelanggan,nama_pelanggan,alamat,no_telp)
      values (null,
      '$datapos[kode_pelanggan]',
      '$datapos[nama_pelanggan]',
      '$datapos[alamat]',
      '$datapos[no_telp]') ");

        if($save){
          echo "<script language=javascript>
           alert('Simpan Data Berhasil');
           window.location='" . base_url('pelanggan') . "';
               </script>";
        }else{
          echo json_encode("error");
        }

    }

    public function delete(){
      $idpost = $this->input->post('id');

      $del = $this->db->query("delete from m_pelanggan where id = '$idpost' ");

      if($del){
        echo "<script language=javascript>
         alert('Hapus Data Berhasil');
         window.location='" . base_url('pelanggan') . "';
             </script>";
      }
    }

    public function update(){
      $datapos = array('id'=>$this->input->post('id'),
                         'kode_pelanggan'=>$this->input->post('kode_pelanggan'),
                         'nama_pelanggan'=>$this->input->post('nama_pelanggan'),
                         'alamat'=>$this->input->post('alamat'),
                         'no_telp'=>$this->input->post('no_telp')
                       );
    $save = $this->db->query("update m_pelanggan set kode_pelanggan = '$datapos[kode_pelanggan]', nama_pelanggan = '$datapos[nama_pelanggan]', alamat = '$datapos[alamat]' , no_telp = '$datapos[no_telp]' where id = '$datapos[id]' ");
    if($save){
      echo "<script language=javascript>
       alert('Update Data Berhasil');
       window.location='" . base_url('pelanggan') . "';
           </script>";
    }
    }


}
