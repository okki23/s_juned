<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class pembayaran extends Parent_controller {
//id,kode_pembayaran,kode_transaksi,bank,image

  var $parsing_form_input = array('id','kode_pembayaran','kode_transaksi','bank','image');
  var $tablename = 't_pembayaran';

    public function __construct() {
        parent::__construct();
        $this->load->model('m_pembayaran','m_pembayaran');

    }

    public function index() {
    $data['listing'] = $this->m_pembayaran->get_all($id=NULL,$this->tablename)->result();
    echo json_encode($data['listing']);
  }

    public function save(){

      $datapos = array('id'=>$this->input->post('id'),
                         'kode_pembayaran'=>$this->input->post('kode_pembayaran'),
                         'kode_transaksi'=>$this->input->post('kode_transaksi'),
                         'bank'=>$this->input->post('bank'),
                         'image'=>$this->input->post('image')
                       );
      $save = $this->db->query("insert into t_pembayaran (id,kode_pembayaran,kode_transaksi,bank,image)
      values (null,
      '$datapos[kode_pembayaran]',
      '$datapos[kode_transaksi]',
      '$datapos[bank]',
      '$datapos[image]'
      ) ");

      $config['upload_path'] = "uploads/";
      $config['allowed_types'] = 'gif|bmp|jpg|jpeg|png';
      $config['max_size'] = 5000;
      $config['remove_spaces'] = TRUE;
      $this->load->library('upload');
      $this->upload->initialize($config);

          $this->upload->do_upload('image');
      

        if($save){
          echo "<script language=javascript>
           alert('Simpan Data Berhasil');
           window.location='" . base_url('pembayaran') . "';
               </script>";
        }else{
          echo json_encode("error");
        }

    }

    public function delete(){
      $idpost = $this->input->post('id');

      $del = $this->db->query("delete from m_pembayaran where id = '$idpost' ");

      if($del){
        echo "<script language=javascript>
         alert('Hapus Data Berhasil');
         window.location='" . base_url('pembayaran') . "';
             </script>";
      }
    }

    public function update(){
      $datapos = array('id'=>$this->input->post('id'),
                         'kode_pembayaran'=>$this->input->post('kode_pembayaran'),
                         'nama_pembayaran'=>$this->input->post('nama_pembayaran'),
                         'quantity'=>$this->input->post('quantity'),
                         'jenis'=>$this->input->post('jenis'),
                         'harga'=>$this->input->post('harga'),
                       );
    //echo json_encode("update m_pembayaran set kode_pembayaran = '$datapos[kode_pembayaran]', nama_pembayaran = '$datapos[nama_pembayaran]', quantity = '$datapos[quantity]' , jenis = '$datapos[jenis]', harga = '$datapos[harga]' where id = '$datapos[id]' ");
    //exit();
    $save = $this->db->query("update m_pembayaran set kode_pembayaran = '$datapos[kode_pembayaran]', nama_pembayaran = '$datapos[nama_pembayaran]', quantity = '$datapos[quantity]' , jenis = '$datapos[jenis]', harga = '$datapos[harga]' where id = '$datapos[id]' ");
    if($save){
      echo "<script language=javascript>
       alert('Update Data Berhasil');
       window.location='" . base_url('pembayaran') . "';
           </script>";
    }
    }


}
