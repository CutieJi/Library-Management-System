<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        _checkIsLogin();
        $this->load->model('LogAction_model', 'logaction');
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required|is_unique[user_menu.menu]', [
            'required' => "Menu name can't be empty",
            'is_unique' => 'A menu with the name "' . htmlspecialchars($this->input->post('menu')) . '" already exists. Please use another name if you want to add it!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/layout_header', $data);
            $this->load->view('layout/layout_sidebar');
            $this->load->view('layout/layout_topbar');
            $this->load->view('menu/menu_index');
            $this->load->view('layout/layout_footer');
        } else {
            $menu = htmlspecialchars($this->input->post('menu'));
            $this->db->insert('user_menu', ['menu' => $menu]);

            $userLogAction = [
                'user_id' => $this->session->userdata('id_user'),
                'action' => 'Menu "' . $menu . '" has been added!',
            ];

            $this->logaction->insertLog($userLogAction);

            $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Menu "<b>' . $menu . '</b>" has been added!</div>');
            redirect('menu');
        }
    }

    public function change_menu_by_id()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required|is_unique[user_menu.menu]', [
            'required' => "Menu name can't be empty",
            'is_unique' => 'A menu with the name "' . htmlspecialchars($this->input->post('menu')) . '" already exists. Please use another name if you want to change it!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/layout_header', $data);
            $this->load->view('layout/layout_sidebar');
            $this->load->view('layout/layout_topbar');
            $this->load->view('menu/menu_index');
            $this->load->view('layout/layout_footer');
        } else {
            $id = htmlspecialchars($this->input->post('id'));
            $menu = htmlspecialchars($this->input->post('menu'));
            $menuBefore = $this->db->get_where('user_menu', ['id' => $id])->row_array();

            $this->db->where('id', $id);
            $this->db->update('user_menu', ['menu' => $menu]);

            $userLogAction = [
                'user_id' => $this->session->userdata('id_user'),
                'action' => 'Menu "' . $menuBefore['menu'] . '" has been change to "' . $menu . '"!',
            ];

            $this->logaction->insertLog($userLogAction);

            $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Menu "<b>' . $menuBefore['menu'] . '</b>" has been change to "<b>' . $menu . '</b>"!</div>');
            redirect('menu');
        }
    }

    public function delete_menu_by_id()
    {
        $id = $this->uri->segment(3);
        $menu_name = $this->db->get_where('user_menu', ['id' => $id])->row_array()['menu'];
        $this->db->where('id', $id);
        $this->db->delete('user_menu');

        $userLogAction = [
            'user_id' => $this->session->userdata('id_user'),
            'action' => 'Menu "' . $menu_name . '" has been deleted!',
        ];

        $this->logaction->insertLog($userLogAction);

        $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Menu "<b>' . $menu_name . '</b>" has been deleted!</div>');
        redirect('menu');
    }

    public function get_menu_by_id($menuId)
    {
        $menu = $this->db->get_where('user_menu', ['id' => $menuId])->row_array();
        exit(json_encode($menu));
    }
}
