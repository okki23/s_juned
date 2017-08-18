<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class produk extends Parent_controller {

  var $parsing_form_input = array('id','kode_produk','nama_produk','quantity','jenis','harga');
  var $tablename = 'm_produk';

    public function __construct() {
        parent::__construct();
        $this->load->model('m_produk','m_produk');

    }

    public function index() {
    $data['listing'] = $this->m_produk->get_all($id=NULL,$this->tablename)->result();
    echo json_encode($data['listing']);
  }

    public function save(){

      $datapos = array('id'=>$this->input->post('id'),
                         'kode_produk'=>$this->input->post('kode_produk'),
                         'nama_produk'=>$this->input->post('nama_produk'),
                         'quantity'=>$this->input->post('quantity'),
                         'jenis'=>$this->input->post('jenis'),
                         'harga'=>$this->input->post('harga'),
                       );
      $save = $this->db->query("insert into m_produk (id,kode_produk,nama_produk,quantity,jenis,harga)
      values (null,
      '$datapos[kode_produk]',
      '$datapos[nama_produk]',
      '$datapos[quantity]',
      '$datapos[jenis]',
      '$datapos[harga]'
      ) ");

        if($save){
          echo "<script language=javascript>
           alert('Simpan Data Berhasil');
           window.location='" . base_url('produk') . "';
               </script>";
        }else{
          echo json_encode("error");
        }

    }

    public function delete(){
      $idpost = $this->input->post('id');

      $del = $this->db->query("delete from m_produk where id = '$idpost' ");

      if($del){
        echo "<script language=javascript>
         alert('Hapus Data Berhasil');
         window.location='" . base_url('produk') . "';
             </script>";
      }
    }

    public function update(){
      $datapos = array('id'=>$this->input->post('id'),
                         'kode_produk'=>$this->input->post('kode_produk'),
                         'nama_produk'=>$this->input->post('nama_produk'),
                         'quantity'=>$this->input->post('quantity'),
                         'jenis'=>$this->input->post('jenis'),
                         'harga'=>$this->input->post('harga'),
                       );
    //echo json_encode("update m_produk set kode_produk = '$datapos[kode_produk]', nama_produk = '$datapos[nama_produk]', quantity = '$datapos[quantity]' , jenis = '$datapos[jenis]', harga = '$datapos[harga]' where id = '$datapos[id]' ");
    //exit();
    $save = $this->db->query("update m_produk set kode_produk = '$datapos[kode_produk]', nama_produk = '$datapos[nama_produk]', quantity = '$datapos[quantity]' , jenis = '$datapos[jenis]', harga = '$datapos[harga]' where id = '$datapos[id]' ");
    if($save){
      echo "<script language=javascript>
       alert('Update Data Berhasil');
       window.location='" . base_url('produk') . "';
           </script>";
    }
    }


}
