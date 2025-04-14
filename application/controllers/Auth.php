<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    private $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->library("form_validation");
    }

    public function index()
    {
        $this->_alreadyLogin();
        // Username / Email Field
        $this->form_validation->set_rules('identity', 'Username or Email', 'required|trim', [
            'required' => "Username or Email can't be empty"
        ]);

        // Password Field
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => "Password can't be empty"
        ]);

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = "Log in";
            $this->load->view('layout/layout_header', $data);
            $this->load->view('auth/auth_index');
            $this->load->view('layout/layout_footer_auth');
        } else {
            $this->_signin();
        }
    }

    private function _signin()
    {
        $identity = htmlspecialchars($this->input->post('identity', true));
        $password = $this->input->post('password');

        // Determine if input is email or username
        $is_email = filter_var($identity, FILTER_VALIDATE_EMAIL);

        // Check if the user exists based on email or username
        if ($is_email) {
            $user = $this->db->get_where('user_data', ['email' => $identity])->row_array();
        } else {
            $user = $this->db->get_where('user_data', ['username' => $identity])->row_array();
        }

        if ($user) {
            // User found, check password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'id_user' => $user['id'],
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                if ($user['role_id'] == 1) {
                    redirect('admin');
                }
                if ($user['role_id'] == 2) {
                    redirect('member');
                }
                if ($user['role_id'] == 3) {
                    redirect('operator');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning ml-4 mr-4">The password you entered is incorrect</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger ml-4 mr-4">The account you entered was not found</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        if ($this->session->flashdata('message')) {
            $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mr-4">Your account has been deleted!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mr-4">You have successfully logout!</div>');
        }
        redirect('auth');
    }

    private function _alreadyLogin()
    {
        if ($this->session->userdata('role_id') == 1) {
            redirect('admin');
        }

        if ($this->session->userdata('role_id') == 2) {
            redirect('user');
        }
    }

    public function signup()
    {
        $this->_alreadyLogin();
        // First Name Field
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim', ['required' => "First Name can't be empty"]);
        // Last Name Field
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim', ['required' => "Last Name can't be empty"]);
        // Username Field
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user_data.username]|regex_match[/^[a-z0-9]+$/]', [
            'required' => "Username can't be empty",
            'is_unique' => 'Username already taken, use another username to register',
            'regex_match' => 'Username can only contain lowercase letters and numbers without symbols'
        ]);
        // Gender Field
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim|callback_validate_gender', ['required' => "Gender can't be empty"]);
        // Address Field
        $this->form_validation->set_rules('address', 'Address', 'required|trim', ['required' => "Address can't be empty"]);
        // Phone Number Field
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|trim', ['required' => "Phone Number can't be empty"]);
        // Email Field
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user_data.email]', [
            'required' => "Email can't be empty",
            'valid_email' => 'Please insert a valid email',
            'is_unique' => 'Email already registered, use another email to register'
        ]);
        // Password Field
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[confirm_password]', [
            'required' => "Password can't be empty",
            'matches' => '',
            'min_length' => 'Password too short, minimum is 8 character'
        ]);
        // Confirm Password Field
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|matches[password]', [
            'required' => "Confirm Password can't be empty",
            'matches' => 'Confirm Password is not the same as Password',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->data['title'] = "Register";
            $this->load->view('layout/layout_header', $this->data);
            $this->load->view('auth/auth_signup');
            $this->load->view('layout/layout_footer_auth');
        } else {
            $avatar_image = htmlspecialchars($this->input->post('gender', true)) == "Male" ? "default_male.jpg" : "default_female.jpg";

            // Check if any data already exists in the user_data table, if data empty use role 1, if data exists use role 2
            $this->db->from('user_data');
            $user_exists = $this->db->get()->num_rows();
            $role_id = ($user_exists > 0) ? 2 : 1;

            $data = [
                'first_name' => htmlspecialchars($this->input->post('first_name', true)),
                'last_name' => htmlspecialchars($this->input->post('last_name', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'gender' => htmlspecialchars($this->input->post('gender', true)),
                'address' => htmlspecialchars($this->input->post('address', true)),
                'phone_number' => htmlspecialchars($this->input->post('phone_number', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'avatar_image' => $avatar_image,
                'role_id' => $role_id
            ];

            $this->db->insert('user_data', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mr-4">Your account has been successfully registered, please log in</div>');
            redirect('auth');
        }
    }

    public function validate_gender($input)
    {
        if ($input == "") {
            $this->form_validation->set_message('validate_gender', "Gender can't be empty");
            return false;
        } else {
            $this->data['selected_gender'] = $input;
            return true;
        }
    }

    public function blocked()
    {
        if (!$this->db->get_where('user_data', ['id' => $this->session->userdata('id_user')])->row_array()) {
            redirect('auth/logout');
        }

        $data['error_code'] = '403';
        $data['title'] = 'ERROR - ' . $data['error_code'];
        $data['error_message'] = 'Access Forbidden';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('layout/layout_header', $data);
        $this->load->view('layout/layout_sidebar');
        $this->load->view('layout/layout_topbar');
        $this->load->view('auth/auth_blocked');
        $this->load->view('layout/layout_footer');
    }
}
