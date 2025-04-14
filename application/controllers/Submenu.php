<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submenu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        _checkIsLogin();
        $this->load->model('Menu_model', 'menu');
        $this->load->model('LogAction_model', 'logaction');
    }

    public function index()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['submenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Submenu / Title', 'required', [
            'required' => "Submenu / Title can't be empty"
        ]);

        $this->form_validation->set_rules('menu_id', 'Menu', 'required', [
            'required' => "Menu can't be empty"
        ]);

        $this->form_validation->set_rules('url', 'Url', 'required', [
            'required' => "Url can't be empty"
        ]);

        $this->form_validation->set_rules('icon', 'Icon Class', 'required', [
            'required' => "Icon Class can't be empty"
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/layout_header', $data);
            $this->load->view('layout/layout_sidebar');
            $this->load->view('layout/layout_topbar');
            $this->load->view('submenu/submenu_index');
            $this->load->view('layout/layout_footer');
        } else {
            $submenu = htmlspecialchars($this->input->post('title', true));
            $data = [
                "title" => $submenu,
                "menu_id" => htmlspecialchars($this->input->post('menu_id', true)),
                'url' => htmlspecialchars($this->input->post('url', true)),
                'icon' => htmlspecialchars($this->input->post('icon', true))
            ];
            $this->db->insert('user_sub_menu', $data);

            $userLogAction = [
                'user_id' => $this->session->userdata('id_user'),
                'action' => 'Submenu "' . $submenu . '" has been added!',
            ];

            $this->logaction->insertLog($userLogAction);

            $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Submenu "<b>' . $submenu . '</b>" has been added!</div>');
            redirect('submenu');
        }
    }

    public function change_submenu_by_id()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['submenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Submenu / Title', 'required', [
            'required' => "Submenu / Title can't be empty"
        ]);

        $this->form_validation->set_rules('menu_id', 'Menu', 'required', [
            'required' => "Menu can't be empty"
        ]);

        $this->form_validation->set_rules('url', 'Url', 'required', [
            'required' => "Url can't be empty"
        ]);

        $this->form_validation->set_rules('icon', 'Icon Class', 'required', [
            'required' => "Icon Class can't be empty"
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/layout_header', $data);
            $this->load->view('layout/layout_sidebar');
            $this->load->view('layout/layout_topbar');
            $this->load->view('submenu/submenu_index');
            $this->load->view('layout/layout_footer');
        } else {
            $id = htmlspecialchars($this->input->post('id', true));
            $submenu = htmlspecialchars($this->input->post('title', true));
            $data = [
                "title" => $submenu,
                "menu_id" => htmlspecialchars($this->input->post('menu_id', true)),
                'url' => htmlspecialchars($this->input->post('url', true)),
                'icon' => htmlspecialchars($this->input->post('icon', true))
            ];
            $this->db->where('id', $id);
            $this->db->update('user_sub_menu', $data);

            $userLogAction = [
                'user_id' => $this->session->userdata('id_user'),
                'action' => 'Submenu "' . $submenu . '" has been changed!',
            ];

            $this->logaction->insertLog($userLogAction);

            $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Submenu "<b>' . $submenu . '</b>" has been changed!</div>');
            redirect('submenu');
        }
    }

    public function delete_submenu_by_id()
    {
        $id = $this->uri->segment(3);
        $submenu = $this->db->get_where('user_sub_menu', ['id' => $id])->row_array()['title'];
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');

        $userLogAction = [
            'user_id' => $this->session->userdata('id_user'),
            'action' => 'Submenu "' . $submenu . '" has been deleted!',
        ];

        $this->logaction->insertLog($userLogAction);

        $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Submenu "<b>' . $submenu . '</b>" has been deleted!</div>');
        redirect('submenu');
    }

    public function get_submenu_by_id($submenuId)
    {
        $submenu = $this->menu->getSubMenuById($submenuId);
        exit(json_encode($submenu));
    }
}
