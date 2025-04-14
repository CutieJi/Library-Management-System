<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LogAction_model extends CI_Model
{
    public function insertLog($data)
    {
        $this->db->insert('user_log_action', $data);
    }

    public function getAllLog()
    {
        $query = "SELECT
                ula.id, first_name, last_name, 
                username, avatar_image,
                role, action, 
                ula.created_at, ula.updated_at
            FROM user_data AS ud
            JOIN user_role AS ur
                ON ud.role_id = ur.id
            JOIN user_log_action AS ula
                ON ud.id = ula.user_id
        ";

        return $this->db->query($query)->result_array();
    }
}
