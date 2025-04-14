<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "
            SELECT `usm`.*, `um`.`menu`
            FROM `user_sub_menu` AS usm
            JOIN `user_menu` AS um
                ON `usm`.`menu_id` = `um`.`id`
        ";

        return $this->db->query($query)->result_array();
    }

    public function getSubMenuById($id)
    {
        $query = "
            SELECT `usm`.*, `um`.`menu`
            FROM `user_sub_menu` AS usm
            JOIN `user_menu` AS um
                ON `usm`.`menu_id` = `um`.`id`
            WHERE `usm`.`id` = " . $id . "
        ";
        $submenu = $this->db->query($query)->row();
        $menus = $this->db->get('user_menu')->result();
        $submenu->menus = $menus;

        return $submenu;
    }
}
