<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Res_goods extends Parent_controller {


  var $parsing_form_input = array('id','kode_produksi','id_barang','qty','satuan','tgl_produksi','barang_production','qty_res_production','satuan_res_production','status_res_production','tgl_expired');
  var $tablename = 't_res_production';

    public function __construct() {
        parent::__construct();
        $this->load->model('m_res_goods','mrsgoods');

        if ($this->session->userdata('username') == '') {
            redirect(base_url('login'));
        }
    }


    public function index() {
        $data['judul'] = $this->data['judul'];
        $data['parse_view'] = 'res_goods/res_goods_view';
        $data['listing'] = $this->mrsgoods->list_res_goods();

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
            $data['parseform'] = $this->mrsgoods->get_new($this->parsing_form_input);
          }else{
            $data['parseform'] = $this->mrsgoods->get_all($id,$this->tablename)->row();
          }


          $data['opt_kode_produksi'] = $this->mrsgoods->opt_kode_produksis();
          //var_dump($data['opt_kode_produksi']);

          $data['parse_view'] = 'res_goods/res_goods_store';
          //session
          $data['username'] = $this->session->userdata('username');
          $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
          $data['user_id'] = $this->session->userdata('user_id');

          $this->load->view('template', $data);
    }

    public function get_content_form(){
      $pono = $this->uri->segment(3);
   

      $sql = $this->db->query("select a.*,b.nama_barang from t_using_goods a
      left join m_goods b on b.id = a.id_barang where a.kode_produksi = '$pono' ")->row();
      echo json_encode($sql);
    }

    public function save(){

      $datapos = $this->mrsgoods->input_array($this->parsing_form_input);
      $id = isset($datapos['id']) ? $datapos['id'] : '';
      $save = $this->mrsgoods->save($datapos,$id,$this->tablename);


      if($save){
              echo "<script language=javascript>
               alert('Simpan Data Berhasil');
               window.location='" . base_url('res_goods') . "';
                   </script>";
            }


    }

    public function delete(){
      $idpost = $this->uri->segment(3);

      $del = $this->mrsgoods->delete($idpost,$this->tablename);

      if($del){
        echo "<script language=javascript>
         alert('Hapus Data Berhasil');
         window.location='" . base_url('res_goods') . "';
             </script>";
      }
    }


    public function transaksi_id($param = '') {
        $data = $this->mrsgoods->get_no();
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
