<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function getRole($role)
    {
        $role = $this->db->escape($role);

        $query = $this->db->query("SELECT
                    role
                FROM user_role AS ur
                WHERE ur.id = $role")->row_array();

        return $query;
    }

    public function getUserAllWithRole()
    {
        $query = "
            SELECT `ud`.`id`, `ud`.`avatar_image`, `ud`.`username`, 
            `ud`.`first_name`, `ud`.`last_name`, `ud`.`gender`, `ud`.`address`, `ud`.`phone_number`,
            `ud`.`created_at`, `ud`.`updated_at`, `ud`.`email`, `ur`.`role`
            FROM `user_data` AS ud
            JOIN `user_role` AS ur
                ON `ud`.`role_id` = `ur`.`id`
        ";

        return $this->db->query($query)->result_array();
    }

    public function getUserByUsername($username)
    {
        $query = "
            SELECT `ud`.`id`, `ud`.`avatar_image`, `ud`.`username`, 
            `ud`.`first_name`, `ud`.`last_name`, `ud`.`gender`, `ud`.`address`, `ud`.`phone_number`,
            `ud`.`created_at`, `ud`.`updated_at`, `ud`.`email`, `ud`.`role_id`, `ur`.`role`
            FROM `user_data` AS ud
            JOIN `user_role` AS ur
                ON `ud`.`role_id` = `ur`.`id`
            WHERE `ud`.`username` = '$username'
        ";

        $user = $this->db->query($query)->row();
        $roles = $this->db->get('user_role')->result();
        $user->roles = $roles;

        return $user;
    }
}
