<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends Parent_controller {
//id,kode_transaksi,kode_produk,no_invoice,keterangan,nilai_projek_pokok,diskon,nilai_penjualan,kode_pelanggan

  var $parsing_form_input = array('id','kode_transaksi','kode_produk','no_invoice','keterangan','nilai_projek_pokok','diskon','nilai_penjualan','kode_pelanggan');
  var $tablename = 't_transaksi';

    public function __construct() {
        parent::__construct();
        $this->load->model('m_transaksi','m_transaksi');

    }

    public function index() {
    $data['listing'] = $this->m_transaksi->get_all($id=NULL,$this->tablename)->result();
    echo json_encode($data['listing']);
  }

    public function save(){

      $datapos = array('id'=>$this->input->post('id'),
                         'kode_transaksi'=>$this->input->post('kode_transaksi'),
                         'kode_produk'=>$this->input->post('kode_produk'),
                         'no_invoice'=>$this->input->post('no_invoice'),
                         'keterangan'=>$this->input->post('keterangan'),
                         'nilai_projek_pokok'=>$this->input->post('nilai_projek_pokok'),
                         'diskon'=>$this->input->post('diskon'),
                         'nilai_penjualan'=>$this->input->post('nilai_penjualan'),
                         'kode_pelanggan'=>$this->input->post('kode_pelanggan')
                       );
      $save = $this->db->query("insert into t_transaksi (id,kode_transaksi,kode_produk,no_invoice,keterangan,nilai_projek_pokok,diskon,nilai_penjualan,kode_pelanggan)
      values (null,
      '$datapos[kode_transaksi]',
      '$datapos[kode_produk]',
      '$datapos[no_invoice]',
      '$datapos[keterangan]',
      '$datapos[nilai_projek_pokok]',
      '$datapos[diskon]',
      '$datapos[nilai_penjualan]',
      '$datapos[kode_pelanggan]'
      ) ");

        if($save){
          echo "<script language=javascript>
           alert('Simpan Data Berhasil');
           window.location='" . base_url('transaksi') . "';
               </script>";
        }else{
          echo json_encode("error");
        }

    }

    public function delete(){
      $idpost = $this->input->post('id');

      $del = $this->db->query("delete from t_transaksi where id = '$idpost' ");

      if($del){
        echo "<script language=javascript>
         alert('Hapus Data Berhasil');
         window.location='" . base_url('transaksi') . "';
             </script>";
      }
    }

    public function update(){
          $datapos = array('id'=>$this->input->post('id'),
                             'kode_transaksi'=>$this->input->post('kode_transaksi'),
                             'kode_produk'=>$this->input->post('kode_produk'),
                             'no_invoice'=>$this->input->post('no_invoice'),
                             'keterangan'=>$this->input->post('keterangan'),
                             'nilai_projek_pokok'=>$this->input->post('nilai_projek_pokok'),
                             'diskon'=>$this->input->post('diskon'),
                             'nilai_penjualan'=>$this->input->post('nilai_penjualan'),
                             'kode_pelanggan'=>$this->input->post('kode_pelanggan')
                           );
    //echo json_encode("update m_transaksi set kode_transaksi = '$datapos[kode_transaksi]', nama_transaksi = '$datapos[nama_transaksi]', quantity = '$datapos[quantity]' , jenis = '$datapos[jenis]', harga = '$datapos[harga]' where id = '$datapos[id]' ");
    //exit();
    $save = $this->db->query("update t_transaksi set
    kode_transaksi = '$datapos[kode_transaksi]',
    kode_produk = '$datapos[kode_produk]',
    no_invoice = '$datapos[no_invoice]' ,
    keterangan = '$datapos[keterangan]',
    nilai_projek_pokok = '$datapos[nilai_projek_pokok]',
    diskon = '$datapos[diskon]',
    nilai_penjualan = '$datapos[nilai_penjualan]',
    kode_pelanggan = '$datapos[kode_pelanggan]'
     where id = '$datapos[id]' ");
    if($save){
      echo "<script language=javascript>
       alert('Update Data Berhasil');
       window.location='" . base_url('transaksi') . "';
           </script>";
    }
    }


}
