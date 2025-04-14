<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        _checkIsLogin();
        $this->load->model('Admin_model', 'admin');
        $this->load->model('Book_model', 'book');
        $this->load->model('Member_model', 'member');
        $this->load->model('LogAction_model', 'logaction');
        $this->load->library("form_validation");
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();
        $data['total_account'] = $this->db->from('user_data')->count_all_results();
        $data['total_admin'] = $this->admin->getTotalByRole("Administrator")['total'];
        $data['total_user'] = $this->admin->getTotalByRole("User")['total'];
        $data['total_role'] = $this->db->from('user_role')->count_all_results();
        $data['total_publisher'] = $this->db->from('book_publisher')->count_all_results();
        $data['total_author'] = $this->db->from('book_author')->count_all_results();
        $data['total_category'] = $this->db->from('book_category')->count_all_results();
        $data['total_book'] = $this->db->from('book_data')->count_all_results();
        $data['total_log'] = $this->db->from('user_log_action')->count_all_results();
        $data['user_registration'] = json_encode($this->admin->getUserRegistration());
        $data['book_registration'] = json_encode($this->admin->getBookRegistration());
        $data['recent_users'] = $this->admin->getRecentUsers();
        $data['recent_books'] = $this->admin->getRecentBooks();
        $data['user_gender'] = json_encode($this->admin->getUserGender());
        $data['user_log_action'] = $this->admin->getLogAction();

        $this->load->view('layout/layout_header', $data);
        $this->load->view('layout/layout_sidebar');
        $this->load->view('layout/layout_topbar');
        $this->load->view('operator/operator_index');
        $this->load->view('layout/layout_footer');
    }
}
