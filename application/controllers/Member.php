<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{

    private $data = array();

    public function __construct()
    {
        parent::__construct();
        _checkIsLogin();
        $this->load->model('Book_model', 'book');
        $this->load->model('Member_model', 'member');
        $this->load->model('Admin_model', 'admin');
        $this->load->model('LogAction_model', 'logaction');
        $this->load->library("form_validation");
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['total_book_borrowed'] = $this->member->getTotalBookBorrowedByUser($data['user']['id']);
        $data['total_book_returned'] = $this->member->getTotalBookReturnedByUser($data['user']['id']);
        $data['total_quantity_borrowed'] = $this->member->getTotalQuantityBorrowedByUser($data['user']['id']);
        $data['total_fine_amount'] = $this->member->getTotalFineAmountByUser($data['user']['id']);
        $data['monthly_book_borrowed'] = json_encode($this->member->getMonthlyBookBorrowedByUser($data['user']['id']));
        $data['monthly_book_returned'] = json_encode($this->member->getMonthlyBookReturnedByUser($data['user']['id']));
        $data['recently_book_borrowed'] = $this->member->getRecentlyBookBorrowedByUser($data['user']['id']);
        $data['recently_book_returned'] = $this->member->getRecentlyBookReturnedByUser($data['user']['id']);
        $data['user_log_action'] = $this->admin->getLogActionByUser($data['user']['id']);
        $data['latest_borrowed_status'] = $this->member->getLatestBorrowedStatusByUser($data['user']['id']);

        $this->load->view('layout/layout_header', $data);
        $this->load->view('layout/layout_sidebar');
        $this->load->view('layout/layout_topbar');
        $this->load->view('member/member_index');
        $this->load->view('layout/layout_footer');
    }

    public function list_book()
    {
        $data['title'] = 'List Book';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['recently_added_books'] = $this->book->getBookRecentlyAdded();
        $data['education_books'] = $this->book->getBookByCategory("education");
        $data['motivation_books'] = $this->book->getBookByCategory("motivation");
        $data['fiction_books'] = $this->book->getBookByCategory("fiction");

        $categories = $this->book->getAllCategories();

        foreach ($categories as $category) {
            $data['books'][$category] = $this->book->getBookByCategory($category);
        }

        $data['categories'] = $categories;

        $this->load->view('layout/layout_header', $data);
        $this->load->view('layout/layout_sidebar');
        $this->load->view('layout/layout_topbar');
        $this->load->view('member/member_list_book');
        $this->load->view('layout/layout_footer');
    }

    public function book()
    {
        $id = $this->uri->segment(3);
        $this->data['book'] = $this->member->getBookById($id);
        $this->data['title'] = 'Book - ' . $this->data['book']['title'];
        $this->data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('borrow_date', 'Borrow Date', 'required', [
            'required' => "Borrow Date can't be empty",
        ]);

        $this->form_validation->set_rules('return_date', 'Return Date', 'required', [
            'required' => "Return Date can't be empty",
        ]);

        $this->form_validation->set_rules('quantity', 'Quantity', 'required|callback_validate_quantity', [
            'required' => "Quantity can't be empty",
        ]);

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layout/layout_header', $this->data);
            $this->load->view('layout/layout_sidebar');
            $this->load->view('layout/layout_topbar');
            $this->load->view('member/member_book');
            $this->load->view('layout/layout_footer');
        } else {
            // $quantityBefore = $this->data['book']['quantity_available'];

            $data = [
                "borrow_date" => htmlspecialchars($this->input->post('borrow_date')),
                "return_date" => htmlspecialchars($this->input->post('return_date')),
                "quantity" => htmlspecialchars($this->input->post('quantity')),
                "status_id" => 1,
                "user_id" => $this->session->userdata('id_user'),
                "book_id" => $this->data['book']['id']
            ];

            $this->db->insert('transaction_borrow', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mr-4">This book has been successfully added to list borrow!</div>');

            // $updateQuantity = $quantityBefore - $data['quantity'];

            // $this->db->where('id', $this->data['book']['id']);
            // $this->db->update('book_data', ['quantity_available' => $updateQuantity]);

            $userLogAction = [
                'user_id' => $this->session->userdata('id_user'),
                'action' => 'Borrowed new book "' . $this->data['book']['title'] . '"!',
            ];

            $this->logaction->insertLog($userLogAction);

            redirect('member/book/' . $this->data['book']['id']);
        }
    }

    public function validate_quantity($input)
    {
        $maxQuantity = $this->data['book']['quantity_available'];

        if ($input == "") {
            $this->form_validation->set_message('validate_quantity', "Quantity can't be empty");
            return false;
        } else if ($input > $maxQuantity) {
            $this->form_validation->set_message('validate_quantity', "Max quantity is $maxQuantity");
            return false;
        } else {
            return true;
        }
    }

    public function list_borrow()
    {
        $data['title'] = 'List Borrow';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['list_borrow'] = $this->book->getListBorrowByUser($this->session->userdata('id_user'));

        $this->load->view('layout/layout_header', $data);
        $this->load->view('layout/layout_sidebar');
        $this->load->view('layout/layout_topbar');
        $this->load->view('member/member_list_borrow');
        $this->load->view('layout/layout_footer');
    }

    public function list_return()
    {
        $data['title'] = 'List Return';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['list_return'] = $this->book->getListReturnByUser($this->session->userdata('id_user'));

        $this->load->view('layout/layout_header', $data);
        $this->load->view('layout/layout_sidebar');
        $this->load->view('layout/layout_topbar');
        $this->load->view('member/member_list_return');
        $this->load->view('layout/layout_footer');
    }

    public function change_return_status_by_id()
    {
        $id = $this->uri->segment(3);
        $book = $this->member->getTitleBookByTransactionReturnId($id);

        $this->db->where('id', $id);
        $this->db->update('transaction_return', ['status_id' => 6]);

        $userLogAction = [
            'user_id' => $this->session->userdata('id_user'),
            'action' => 'Request return borrowed book "' . $book['title'] . '" successfully!',
        ];

        $this->logaction->insertLog($userLogAction);

        $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Request return borrowed book successfully!</div>');
        redirect('member/list_return');
    }
}
