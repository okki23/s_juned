<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rec_goods extends Parent_controller {

  var $parsing_form_input = array('id','no_po','id_barang','qty','satuan','harga','user_insert','date_insert');
  var $tablename = 't_rec_goods';

    public function __construct() {
        parent::__construct();
        $this->load->model('m_rec_goods','mrcvg');

        if ($this->session->userdata('username') == '') {
            redirect(base_url('login'));
        }
    }


    public function index() {
        $data['judul'] = $this->data['judul'];
        $data['parse_view'] = 'rec_goods/rec_goods_view';
        $data['listing'] = $this->mrcvg->list_rec_goods();

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
            $data['parseform'] = $this->mrcvg->get_new($this->parsing_form_input);
          }else{
            $data['parseform'] = $this->mrcvg->get_all($id,$this->tablename)->row();
          }
          $data['po_no_val'] = $this->transaksi_id();

          $data['opt_po'] = $this->mrcvg->opt_po();


          $data['parse_view'] = 'rec_goods/rec_goods_store';
          //session
          $data['username'] = $this->session->userdata('username');
          $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
          $data['user_id'] = $this->session->userdata('user_id');

          $this->load->view('template', $data);
    }

    public function get_content_form(){
      $pono = $this->uri->segment(3);
      $sql = $this->db->query("select a.*,b.nama_supplier,c.nama_barang from t_req_goods a
		left join m_supplier b on b.id = a.id_supplier
		left join m_goods c on c.id = a.id_barang where a.no_po = '$pono' ")->row();
    echo json_encode($sql);
  }

    public function save(){

      $datapos = $this->mrcvg->input_array($this->parsing_form_input);
      $id = isset($datapos['id']) ? $datapos['id'] : '';
      $save = $this->mrcvg->save($datapos,$id,$this->tablename);

      $update = $this->db->query("update m_goods set qty = qty+$datapos[qty] where id = '$datapos[id_barang]' ");
      if($save && $update){
              echo "<script language=javascript>
               alert('Simpan Data Berhasil');
               window.location='" . base_url('rec_goods') . "';
                   </script>";
            }


    }

    public function delete(){
      $idpost = $this->uri->segment(3);
      $sql = $this->db->where("id",$idpost)->get("t_rec_goods")->row();
      $save_delete= $this->mrcvg->update_when_delete($sql->id_barang,$sql->qty);

      $del = $this->mrcvg->delete($idpost,$this->tablename);

      if($del && $save_delete){
        echo "<script language=javascript>
         alert('Hapus Data Berhasil');
         window.location='" . base_url('rec_goods') . "';
             </script>";
      }
    }


    public function transaksi_id($param = '') {
        $data = $this->mrcvg->get_no();
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
