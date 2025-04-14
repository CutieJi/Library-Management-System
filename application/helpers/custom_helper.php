<?php

function _checkIsLogin()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        // use role_id based on database
        $email = $ci->session->userdata('email');
        $roleId = $ci->db->query("
            SELECT `user_data`.`role_id`
            FROM `user_data` 
            WHERE `user_data`.`email` = '$email'
        ")->row_array()['role_id'];

        $menu = $ci->uri->segment(1);
        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menuId = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $roleId,
            'menu_id' => $menuId
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function check_access($roleName, $menuId)
{
    $ci = get_instance();
    $roleId = $ci->db->get_where('user_role', ['role' => $roleName])->row_array()['id'];
    $ci->db->where('role_id', $roleId);
    $ci->db->where('menu_id', $menuId);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function get_role_name($roleId)
{
    $ci = get_instance();
    $roleName = $ci->db->get_where('user_role', ['id' => $roleId])->row_array()['role'];
    return $roleName;
}
