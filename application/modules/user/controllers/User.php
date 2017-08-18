<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Parent_controller {

  var $parsing_form_input = array('id','nama','email','password');
  var $tablename = 'm_user';

    public function __construct() {
        parent::__construct();
        $this->load->model('m_user','m_umanagement');

    }

    public function index() {

        $data['listing'] = $this->m_umanagement->get_all($id=NULL,$this->tablename)->result();

        echo json_encode($data['listing']);
    }




    public function save(){


    $datapos = array('id'=>$this->input->post('id'),
                       'nama'=>$this->input->post('nama'),
                       'email'=>$this->input->post('email'),
                       'password'=>$this->input->post('password'));
    $save = $this->db->query("insert into m_user (id,nama,email,password) values (null,'$datapos[nama]','$datapos[email]','$datapos[password]') ");

      if($save){
        echo "<script language=javascript>
         alert('Simpan Data Berhasil');
         window.location='" . base_url('user') . "';
             </script>";
      }

    }

    public function delete(){
      $idpost = $this->input->post('id');

      $del = $this->db->query("delete from m_user where id = '$idpost' ");

      if($del){
        echo "<script language=javascript>
         alert('Hapus Data Berhasil');
         window.location='" . base_url('user') . "';
             </script>";
      }
    }

    public function update(){
      $datapos = array('id'=>$this->input->post('id'),
                       'nama'=>$this->input->post('nama'),
                       'email'=>$this->input->post('email'),
                       'password'=>$this->input->post('password'));
    $save = $this->db->query("insert into m_user (id,nama,email,password) values (null,'$datapos[nama]','$datapos[email]','$datapos[password]') ");
    }





}
