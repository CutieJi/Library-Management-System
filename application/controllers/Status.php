<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        _checkIsLogin();
        $this->load->model('LogAction_model', 'logaction');
    }

    public function index()
    {
        $data['title'] = 'List Status';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['status'] = $this->db->get('status')->result_array();

        $this->form_validation->set_rules('status', 'Status', 'required|is_unique[status.status]', [
            'required' => "Status name can't be empty",
            'is_unique' => 'A status with the name "' . htmlspecialchars($this->input->post('status')) . '" already exists. Please use another name if you want to add it!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/layout_header', $data);
            $this->load->view('layout/layout_sidebar');
            $this->load->view('layout/layout_topbar');
            $this->load->view('status/status_index');
            $this->load->view('layout/layout_footer');
        } else {
            $status = htmlspecialchars($this->input->post('status'));
            $this->db->insert('status', ['status' => $status]);

            $userLogAction = [
                'user_id' => $this->session->userdata('id_user'),
                'action' => 'Status "' . $status . '" has been added!',
            ];

            $this->logaction->insertLog($userLogAction);

            $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Status "<b>' . $status . '</b>" has been added!</div>');
            redirect('status');
        }
    }

    public function change_status_by_id()
    {
        $data['title'] = 'List Status';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['status'] = $this->db->get('status')->result_array();

        $this->form_validation->set_rules('status', 'Status', 'required|is_unique[status.status]', [
            'required' => "Status name can't be empty",
            'is_unique' => 'A status with the name "' . htmlspecialchars($this->input->post('status')) . '" already exists. Please use another name if you want to change it!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/layout_header', $data);
            $this->load->view('layout/layout_sidebar');
            $this->load->view('layout/layout_topbar');
            $this->load->view('status/status_index');
            $this->load->view('layout/layout_footer');
        } else {
            $id = htmlspecialchars($this->input->post('id'));
            $status = htmlspecialchars($this->input->post('status'));
            $statusBefore = $this->db->get_where('status', ['id' => $id])->row_array();

            $this->db->where('id', $id);
            $this->db->update('status', ['status' => $status]);

            $userLogAction = [
                'user_id' => $this->session->userdata('id_user'),
                'action' => 'Status "' . $statusBefore['status'] . '" has been change to "' . $status . '"!',
            ];

            $this->logaction->insertLog($userLogAction);

            $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Status "<b>' . $statusBefore['status'] . '</b>" has been change to "<b>' . $status . '</b>"!</div>');
            redirect('status');
        }
    }

    public function delete_status_by_id()
    {
        $id = $this->uri->segment(3);
        $statusName = $this->db->get_where('status', ['id' => $id])->row_array()['status'];
        $this->db->where('id', $id);
        $this->db->delete('status');

        $userLogAction = [
            'user_id' => $this->session->userdata('id_user'),
            'action' => 'Status "' . $statusName . '" has been deleted!',
        ];

        $this->logaction->insertLog($userLogAction);

        $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Status "<b>' . $statusName . '</b>" has been deleted!</div>');
        redirect('status');
    }

    public function get_status_by_id($statusId)
    {
        $status = $this->db->get_where('status', ['id' => $statusId])->row_array();
        exit(json_encode($status));
    }
}
