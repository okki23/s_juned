<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Req_goods extends Parent_controller {

  var $parsing_form_input = array('id','no_po','id_supplier','id_barang','qty','satuan','harga','status_paid','user_insert','date_insert');
  var $tablename = 't_req_goods';

    public function __construct() {
        parent::__construct();
        $this->load->model('m_req_goods','mrg');

        if ($this->session->userdata('username') == '') {
            redirect(base_url('login'));
        }
    }


    public function index() {
        $data['judul'] = $this->data['judul'];
        $data['parse_view'] = 'req_goods/req_goods_view';
        $data['listing'] = $this->mrg->list_req_goods();

        //session
        $data['username'] = $this->session->userdata('username');
        $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
        $data['user_id'] = $this->session->userdata('user_id');

        $this->load->view('template', $data);
    }



    public function store(){
    $data['judul'] = $this->data['judul'];
     $id = $this->uri->segment(3);

          if($id == '' || empty($id) || $id == NULL){
            $data['parseform'] = $this->mrg->get_new($this->parsing_form_input);
          }else{
            $data['parseform'] = $this->mrg->get_all($id,$this->tablename)->row();
          }
          $data['po_no_val'] = $this->transaksi_id();

          $data['opt_supplier'] = $this->mrg->opt_supplier();
          $data['opt_goods'] = $this->mrg->opt_goods();

          $data['parse_view'] = 'req_goods/req_goods_store';
          //session
          $data['username'] = $this->session->userdata('username');
          $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
          $data['user_id'] = $this->session->userdata('user_id');

          $this->load->view('template', $data);
    }


    public function save(){

      $datapos = $this->mrg->input_array($this->parsing_form_input);
      $id = isset($datapos['id']) ? $datapos['id'] : '';
      $save = $this->mrg->save($datapos,$id,$this->tablename);

      $sql = $this->db->query("select a.*,b.email,b.nama from m_user a
                              left join m_employee b on b.id = a.id_pegawai where a.level = '4' ")->result();
      //var_dump($sql);
      $this->load->library('email');

      if($id == '' || $id == NULL){

            foreach($sql as $listrec){

              $this->email->to($listrec->email);
              $this->email->from('okkisetyawan@gmail.com');
              $this->email->subject('New PO : '.$datapos['no_po']. " Has been created by : ".$this->session->userdata('username'));
              $this->email->message('Information to '.$listrec->nama.' The New PO has been released ,please paid this PO to the supplier <br> This link will be forwarding you to the apps : ' .base_url('req_goods'). '<br> Thanks');
              $this->email->send();
              $this->email->clear();

            }
      }else{
        foreach($sql as $listrec){

          $this->email->to($listrec->email);
          $this->email->from('okkisetyawan@gmail.com');
          $this->email->subject('Update PO : '.$datapos['no_po']. " Has been updated by : ".$this->session->userdata('username'));
          $this->email->message('Information to '.$listrec->nama.' PO has been updated ,please check or paid this PO to the supplier <br> This link will be forwarding you to the apps : ' .base_url('req_goods'). '<br> Thanks');
          $this->email->send();
          $this->email->clear();

        }
      }

      if($save && $id == NULL || $id == ''){
              echo "<script language=javascript>
               alert('Pesanan Berhasil Dibuat, Setelah ini informasi ini akan disampaikan kepada purchasing');
               window.location='" . base_url('req_goods') . "';
                   </script>";
        }

        if($save && $id != NULL || $id != ''){
          echo "<script language=javascript>
           alert('Pesanan Berhasil Dirubah, Setelah ini informasi ini akan disampaikan kepada purchasing');
           window.location='" . base_url('req_goods') . "';
               </script>";
        }


    }

    public function delete(){
      $idpost = $this->uri->segment(3);
      $del = $this->mrg->delete($idpost,$this->tablename);

      if($del){
        echo "<script language=javascript>
         alert('Hapus Data Berhasil');
         window.location='" . base_url('req_goods') . "';
             </script>";
      }
    }


    public function transaksi_id($param = '') {
        $data = $this->mrg->get_no();
        $lastid = $data->row();
        $idnya = $lastid->id;


        if ($idnya == '') { // bila data kosong
            $ID = $param . "0000001";
            //00000001
        } else {
            $MaksID = $idnya;
            $MaksID++;
            if ($MaksID < 10)
                $ID = $param . "000000" . $MaksID;
            else if ($MaksID < 100)
                $ID = $param . "00000" . $MaksID;
            else if ($MaksID < 1000)
                $ID = $param . "0000" . $MaksID;
            else if ($MaksID < 10000)
                $ID = $param . "000" . $MaksID;
            else if ($MaksID < 100000)
                $ID = $param . "00" . $MaksID;
            else if ($MaksID < 1000000)
                $ID = $param . "0" . $MaksID;
            else
                $ID = $MaksID;
        }

        return $ID;
    }



}
