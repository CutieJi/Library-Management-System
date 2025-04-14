<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        _checkIsLogin();
        $this->load->model('Admin_model', 'admin');
        $this->load->model('User_model', 'user');
        $this->load->model('LogAction_model', 'logaction');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();
        $data['total_account'] = $this->db->from('user_data')->count_all_results();
        $data['total_admin'] = $this->admin->getTotalByRole("Administrator")['total'];
        $data['total_operator'] = $this->admin->getTotalByRole("Operator")['total'];
        $data['total_user'] = $this->admin->getTotalByRole("User")['total'];
        $data['total_role'] = $this->db->from('user_role')->count_all_results();
        $data['total_publisher'] = $this->db->from('book_publisher')->count_all_results();
        $data['total_author'] = $this->db->from('book_author')->count_all_results();
        $data['total_book'] = $this->db->from('book_data')->count_all_results();
        $data['user_registration'] = json_encode($this->admin->getUserRegistration());
        $data['book_registration'] = json_encode($this->admin->getBookRegistration());
        $data['recent_users'] = $this->admin->getRecentUsers();
        $data['recent_books'] = $this->admin->getRecentBooks();
        $data['user_gender'] = json_encode($this->admin->getUserGender());
        $data['user_log_action'] = $this->admin->getLogAction();

        $this->load->view('layout/layout_header', $data);
        $this->load->view('layout/layout_sidebar');
        $this->load->view('layout/layout_topbar');
        $this->load->view('admin/admin_index');
        $this->load->view('layout/layout_footer');
    }

    public function role()
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required|is_unique[user_role.role]', [
            'required' => "Role Name can't be empty",
            'is_unique' => 'A role with name "' . htmlspecialchars($this->input->post('role'), true) . '" already exists. Please use another name if you want to add it!'
        ]);

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layout/layout_header', $data);
            $this->load->view('layout/layout_sidebar');
            $this->load->view('layout/layout_topbar');
            $this->load->view('admin/admin_role');
            $this->load->view('layout/layout_footer');
        } else {
            $role = htmlspecialchars($this->input->post('role'), true);
            $this->db->insert('user_role', ['role' => $role]);

            $userLogAction = [
                'user_id' => $this->session->userdata('id_user'),
                'action' => 'Role "' . $role . '" has been added!',
            ];

            $this->logaction->insertLog($userLogAction);

            $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Role "<b>' . $role . '</b>" has been added!</div>');
            redirect('admin/role');
        }
    }

    public function role_access($role_name)
    {
        $data['title'] = 'Change Role Access';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['role' => $role_name])->row_array();
        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('layout/layout_header', $data);
        $this->load->view('layout/layout_sidebar');
        $this->load->view('layout/layout_topbar');
        $this->load->view('admin/admin_role_access');
        $this->load->view('layout/layout_footer');
    }

    public function change_role_access()
    {
        $menu_id = htmlspecialchars($this->input->post('menuId'));
        $role_id = htmlspecialchars($this->input->post('roleId'));

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);

            $role = $this->db->get_where('user_role', ['id' => $role_id])->row_array()['role'];
            $menu = $this->db->get_where('user_menu', ['id' => $menu_id])->row_array()['menu'];

            $userLogAction = [
                'user_id' => $this->session->userdata('id_user'),
                'action' => 'Role "' . $role . '" granted access to menu "' . $menu . '"',
            ];

            $this->logaction->insertLog($userLogAction);
        } else {
            $this->db->delete('user_access_menu', $data);

            $role = $this->db->get_where('user_role', ['id' => $role_id])->row_array()['role'];
            $menu = $this->db->get_where('user_menu', ['id' => $menu_id])->row_array()['menu'];

            $userLogAction = [
                'user_id' => $this->session->userdata('id_user'),
                'action' => 'Role "' . $role . '" granted no access to menu "' . $menu . '"',
            ];

            $this->logaction->insertLog($userLogAction);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Access has been updated!</div>');
    }

    public function change_role_by_id()
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required|is_unique[user_role.role]', [
            'required' => "Role Name can't be empty",
            'is_unique' => 'A role with name "' . htmlspecialchars($this->input->post('role'), true) . '" already exists. Please use another name if you want to change it!'
        ]);

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layout/layout_header', $data);
            $this->load->view('layout/layout_sidebar');
            $this->load->view('layout/layout_topbar');
            $this->load->view('admin/admin_role');
            $this->load->view('layout/layout_footer');
        } else {
            $id = htmlspecialchars($this->input->post('id'));
            $role = htmlspecialchars($this->input->post('role'), true);
            $roleBefore = $this->db->get_where('user_role', ['id' => $id])->row_array();

            $this->db->where('id', $id);
            $this->db->update('user_role', ['role' => $role]);

            $userLogAction = [
                'user_id' => $this->session->userdata('id_user'),
                'action' => 'Role "' . $roleBefore['role'] . '" has been change to "' . $role . '"',
            ];

            $this->logaction->insertLog($userLogAction);

            $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Role "<b>' . $roleBefore['role'] . '</b>" has been change to "<b>' . $role . '</b>"!</div>');
            redirect('admin/role');
        }
    }

    public function delete_role_by_id()
    {
        $id = $this->uri->segment(3);
        $role = $this->db->get_where('user_role', ['id' => $id])->row_array()['role'];
        $this->db->where('id', $id);
        $this->db->delete('user_role');

        $userLogAction = [
            'user_id' => $this->session->userdata('id_user'),
            'action' => 'Role "' . $role . '" has been deleted!',
        ];

        $this->logaction->insertLog($userLogAction);

        $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Role "<b>' . $role . '</b>" has been deleted!</div>');
        redirect('admin/role');
    }

    public function get_role_by_id($roleId)
    {
        $role = $this->db->get_where('user_role', ['id' => $roleId])->row_array();
        exit(json_encode($role));
    }

    public function user_data()
    {
        $data['title'] = 'User Data';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['users'] = $this->user->getUserAllWithRole();

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
            $this->load->view('admin/admin_user_data');
            $this->load->view('layout/layout_footer');
        } else {

            // check if change password field empty or not
            if (htmlspecialchars($this->input->post('password'))) {
                $data = [
                    'first_name' => htmlspecialchars($this->input->post('first_name', true)),
                    'last_name' => htmlspecialchars($this->input->post('last_name', true)),
                    'gender' => htmlspecialchars($this->input->post('gender', true)),
                    'address' => htmlspecialchars($this->input->post('address', true)),
                    'phone_number' => htmlspecialchars($this->input->post('phone_number', true)),
                    'role_id' => htmlspecialchars($this->input->post('role_id', true)),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                ];
            } else {
                $data = [
                    'first_name' => htmlspecialchars($this->input->post('first_name', true)),
                    'last_name' => htmlspecialchars($this->input->post('last_name', true)),
                    'gender' => htmlspecialchars($this->input->post('gender', true)),
                    'address' => htmlspecialchars($this->input->post('address', true)),
                    'phone_number' => htmlspecialchars($this->input->post('phone_number', true)),
                    'role_id' => htmlspecialchars($this->input->post('role_id', true)),
                ];
            }

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

            $this->db->where('id', htmlspecialchars($this->input->post('id', true)));
            $this->db->update('user_data', $data);

            $usernameAdmin = $this->db->get_where('user_data', ['id' => $this->session->userdata('id_user')])->row_array()['username'];
            $usernameUser = $this->db->get_where('user_data', ['id' => htmlspecialchars($this->input->post('id', true))])->row_array()['username'];

            $userLogAction = [
                'user_id' => $this->session->userdata('id_user'),
                'action' => 'Admin "' . $usernameAdmin . '" has been change user data "' . $usernameUser . '"!',
            ];

            $this->logaction->insertLog($userLogAction);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success mb-4">User <b>' . htmlspecialchars($this->input->post('username', true)) . '</b> has been updated!</div>'
            );
            redirect('admin/user_data');
        }
    }

    public function get_user_by_username()
    {
        $username = $this->uri->segment(3);
        $user = $this->user->getUserByUsername($username);

        exit(json_encode($user));
    }

    public function delete_user_by_username()
    {
        $username = $this->uri->segment(3);
        $avatar_image = $this->db->get_where('user_data', ['username' => $username])->row_array()['avatar_image'];

        if ($avatar_image != "default_male.jpg" && $avatar_image != "default_female.jpg") {
            unlink(FCPATH . 'assets/img/avatar_image/' . $avatar_image);
        }

        $usernameAdmin = $this->db->get_where('user_data', ['id' => $this->session->userdata('id_user')])->row_array()['username'];
        $usernameUser = $this->db->get_where('user_data', ['username' => $username])->row_array()['username'];
        $userId = $this->db->get_where('user_data', ['username' => $username])->row_array()['id'];

        $userLogAction = [
            'user_id' => $this->session->userdata('id_user'),
            'action' => 'Admin "' . $usernameAdmin . '" has been deleted user data "' . $usernameUser . '"!',
        ];

        $this->logaction->insertLog($userLogAction);

        $this->db->delete('user_data', ['username' => $username]);
        $this->db->delete('user_log_action', ['user_id' => $userId]);

        $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mr-4">Account has been deleted!</div>');
        redirect('admin/user_data');
    }
}
