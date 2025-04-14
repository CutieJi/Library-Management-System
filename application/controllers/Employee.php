<?php

class Employee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        _checkIsLogin();
        $this->load->model('Employee_model.php');
    }

    public function index()
    {
        $data['title'] = 'Book Publisher';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['book_publisher'] = $this->db->get('book_publisher')->result_array();

        $this->form_validation->set_rules('publisher', 'Publisher', 'required|is_unique[book_publisher.publisher]', [
            'required' => "Publisher name can't be empty",
            'is_unique' => 'A publisher with the name "' . htmlspecialchars($this->input->post('publisher')) . '" already exists. Please use another name if you want to add it!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/layout_header', $data);
            $this->load->view('layout/layout_sidebar');
            $this->load->view('layout/layout_topbar');
            $this->load->view('book/book_publisher');
            $this->load->view('layout/layout_footer');
        } else {
            $publisher = htmlspecialchars($this->input->post('publisher'));
            $this->db->insert('book_publisher', ['publisher' => $publisher]);

            $userLogAction = [
                'user_id' => $this->session->userdata('id_user'),
                'action' => 'Publisher "' . $publisher . '" has been added!',
            ];

            $this->logaction->insertLog($userLogAction);

            $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Publisher "<b>' . $publisher . '</b>" has been added!</div>');
            redirect('book');
        }
    }
}