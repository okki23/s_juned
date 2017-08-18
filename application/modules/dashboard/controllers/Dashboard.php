<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Parent_controller {

  public function __construct() {
      parent::__construct();

      if ($this->session->userdata('username') == '') {
          redirect(base_url('login'));
      }

  }
    public function index() {
        $data['judul'] = $this->data['judul'];
        $data['parse_view'] = 'dashboard/dashboard_view';

        //session
        $data['judul'] = $this->data['judul'];
        $data['username'] = $this->session->userdata('username');
        $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
        $data['user_id'] = $this->session->userdata('user_id');

        $this->load->view('template', $data);
    }



}
