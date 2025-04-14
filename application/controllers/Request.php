<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Request extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        _checkIsLogin();
        $this->load->model('Book_model', 'book');
        $this->load->model('Member_model', 'member');
        $this->load->model('LogAction_model', 'logaction');
        $this->load->library("form_validation");
    }

    public function index()
    {
        $data['title'] = 'Request Borrow';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['list_borrow'] = $this->book->getAllListRequestBorrow();

        $this->load->view('layout/layout_header', $data);
        $this->load->view('layout/layout_sidebar');
        $this->load->view('layout/layout_topbar');
        $this->load->view('request/request_borrow');
        $this->load->view('layout/layout_footer');
    }

    public function change_request_accepted()
    {
        $id = $this->uri->segment(3);

        $this->db->where('id', $id);
        $this->db->update('transaction_borrow', ['status_id' => 3]);

        $userLogAction = [
            'user_id' => $this->session->userdata('id_user'),
            'action' => 'Operator has been accepted borrow!',
        ];

        $this->logaction->insertLog($userLogAction);

        $transaction_borrow = $this->db->get_where('transaction_borrow', ['id' => $id])->row_array();
        $book_data = $this->db->get_where('book_data', ['id' => $transaction_borrow['book_id']])->row_array();
        $quantityBefore = $book_data['quantity_available'];

        $updateQuantity = $quantityBefore - $transaction_borrow['quantity'];

        $this->db->where('id', $book_data['id']);
        $this->db->update('book_data', ['quantity_available' => $updateQuantity]);

        // create list return
        $data_return = [
            "status_id" => 4,
            "borrow_id" => $id,
        ];

        $this->db->insert('transaction_return', $data_return);

        $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Operator has accepted borrow!</div>');
        redirect('request');
    }

    public function change_request_rejected()
    {
        $id = $this->uri->segment(3);

        $this->db->where('id', $id);
        $this->db->update('transaction_borrow', ['status_id' => 2]);

        $userLogAction = [
            'user_id' => $this->session->userdata('id_user'),
            'action' => 'Operator has been rejected borrow!',
        ];

        $this->logaction->insertLog($userLogAction);

        $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Operator has rejected borrow!</div>');
        redirect('request');
    }

    public function return()
    {
        $data['title'] = 'Request Return';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['list_return'] = $this->book->getAllListRequestReturn();

        $this->form_validation->set_rules('return_date', 'Return Date', 'required', [
            'required' => "Return Date can't be empty"
        ]);

        $this->form_validation->set_rules('quantity', 'Quantity', 'required', [
            'required' => "Quantity can't be empty"
        ]);

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layout/layout_header', $data);
            $this->load->view('layout/layout_sidebar');
            $this->load->view('layout/layout_topbar');
            $this->load->view('request/request_return');
            $this->load->view('layout/layout_footer');
        } else {
            $data = [
                "return_date" => htmlspecialchars($this->input->post('return_date', true)),
                "quantity" => htmlspecialchars($this->input->post('quantity', true)),
                "fine_amount" => htmlspecialchars($this->input->post('fine_amount', true)),
                "message" => htmlspecialchars($this->input->post('message', true)),
                "status_id" => 5
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('transaction_return', $data);

            $userLogAction = [
                'user_id' => $this->session->userdata('id_user'),
                'action' => 'Operator has been verify request return!',
            ];

            $this->logaction->insertLog($userLogAction);

            $book_data = $this->db->get_where('book_data', ['id' => htmlspecialchars($this->input->post('book_id'))])->row_array();
            $quantityBefore = $book_data['quantity_available'];

            $updateQuantity = $quantityBefore + htmlspecialchars($this->input->post('quantity', true));

            $this->db->where('id', $book_data['id']);
            $this->db->update('book_data', ['quantity_available' => $updateQuantity]);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success mb-4">Operator has been verify request return!</div>'
            );
            redirect('request/return');
        }
    }
}
