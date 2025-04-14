<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        _checkIsLogin();
        $this->load->model('LogAction_model', 'logaction');
    }

    public function index()
    {
        $data['title'] = 'Action';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['user_log_action'] = $this->logaction->getAllLog();

        $this->load->view('layout/layout_header', $data);
        $this->load->view('layout/layout_sidebar');
        $this->load->view('layout/layout_topbar');
        $this->load->view('log/log_index');
        $this->load->view('layout/layout_footer');
    }

    public function delete_log_by_id()
    {
        $id = $this->uri->segment(3);
        $this->db->where('id', $id);
        $this->db->delete('user_log_action');

        $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Log has been deleted!</div>');
        redirect('log');
    }
}
