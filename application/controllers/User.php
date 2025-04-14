<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        _checkIsLogin();
        $this->load->model('User_model', 'user');
        $this->load->model('LogAction_model', 'logaction');
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();
        $data['role_name'] = $this->user->getRole($data['user']['role_id'])['role'];

        // First Name Field
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim', ['required' => "First Name can't be empty"]);
        // Last Name Field
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim', ['required' => "Last Name can't be empty"]);
        // Gender Field
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim', ['required' => "Gender can't be empty"]);
        // Address Field
        $this->form_validation->set_rules('address', 'Address', 'required|trim', ['required' => "Address can't be empty"]);
        // Phone Number Field
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|trim', ['required' => "Phone Number can't be empty"]);

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layout/layout_header', $data);
            $this->load->view('layout/layout_sidebar');
            $this->load->view('layout/layout_topbar');
            $this->load->view('user/user_index', $data);
            $this->load->view('layout/layout_footer');
        } else {
            $data = [
                'first_name' => htmlspecialchars($this->input->post('first_name', true)),
                'last_name' => htmlspecialchars($this->input->post('last_name', true)),
                'gender' => htmlspecialchars($this->input->post('gender', true)),
                'address' => htmlspecialchars($this->input->post('address', true)),
                'phone_number' => htmlspecialchars($this->input->post('phone_number', true)),
            ];

            // Check if there are images to be uploaded
            $upload_image = $_FILES['avatar_image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/avatar_image/';

                // Get extension file
                $file_ext = pathinfo($_FILES['avatar_image']['name'], PATHINFO_EXTENSION);

                // Create unique file name with uniqid() function and concate with extension name
                $unique_filename = uniqid() . '_' . time() . '.' . $file_ext;

                $config['file_name'] = $unique_filename;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('avatar_image')) {
                    $old_avatar_image = $this->db->get_where("user_data", ['id' => $this->session->userdata('id_user')])->row_array()['avatar_image'];
                    if ($old_avatar_image != "default_male.jpg" && $old_avatar_image != "default_female.jpg") {
                        unlink(FCPATH . 'assets/img/avatar_image/' . $old_avatar_image);
                    }
                    $new_avatar_image = $this->upload->data('file_name');
                    $this->db->set('avatar_image', $new_avatar_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->where('id', $this->session->userdata('id_user'));
            $this->db->update('user_data', $data);

            $userLogAction = [
                'user_id' => $this->session->userdata('id_user'),
                'action' => 'Profile edited!',
            ];

            $this->logaction->insertLog($userLogAction);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success mb-4">Profile edited!</div>'
            );
            redirect('user');
        }
    }

    public function delete_account()
    {
        $avatar_image = $this->db->get_where('user_data', ['id' => $this->session->userdata('id_user')])->row_array()['avatar_image'];

        if ($avatar_image != "default_male.jpg" && $avatar_image != "default_female.jpg") {
            unlink(FCPATH . 'assets/img/avatar_image/' . $avatar_image);
        }

        $this->db->delete('user_data', ['id' => $this->session->userdata('id_user')]);
        $this->db->delete('user_log_action', ['user_id' => $this->session->userdata('id_user')]);

        $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mr-4">Your account has been deleted!</div>');
        redirect('auth/logout');
    }

    public function change_password()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim', [
            'required' => "Current Password can't be empty",
        ]);

        $this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[8]|matches[confirm_new_password]', [
            'required' => "New Password can't be empty",
            'matches' => '',
            'min_length' => 'New Password too short, minimum is 8 character'
        ]);

        $this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'required|trim|matches[new_password]', [
            'required' => "Confirm New Password can't be empty",
            'matches' =>
            'Confirm New Password is not the same as New Password',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/layout_header', $data);
            $this->load->view('layout/layout_sidebar');
            $this->load->view('layout/layout_topbar');
            $this->load->view('user/user_change_password', $data);
            $this->load->view('layout/layout_footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Wrong Current Password!</div>');
                redirect('user/change_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning">The new password cannot be the same as the current password!</div>');
                    redirect('user/change_password');
                } else {
                    // password ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user_data');

                    $userLogAction = [
                        'user_id' => $this->session->userdata('id_user'),
                        'action' => 'Password changed!',
                    ];

                    $this->logaction->insertLog($userLogAction);

                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success">Password Changed!</div>'
                    );
                    redirect('user/change_password');
                }
            }
        }
    }
}
