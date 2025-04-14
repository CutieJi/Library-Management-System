<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getTotalByRole($role)
    {
        $role = $this->db->escape($role);
        $query = $this->db->query("SELECT
            COUNT(*) AS total
            FROM user_data AS ud
            JOIN user_role AS ur
            ON ud.role_id = ur.id
            WHERE ur.role = $role
        ")->row_array();

        return $query;
    }

    public function getUserRegistration()
    {
        $query = $this->db->query("SELECT 
            DATE_FORMAT(created_at, '%b') AS month, 
            COUNT(*) AS total 
            FROM user_data 
            GROUP BY MONTH(created_at), created_at;
        ");

        $result = $query->result_array();

        $processedData = [];

        // process data for aggregate total if month name is same
        foreach ($result as $row) {
            $month = $row['month'];
            $total = $row['total'];

            // if already month name on array processedData, aggregate the total
            if (isset($processedData[$month])) {
                $processedData[$month]['total'] += $total;
            } else {
                // if month name not registered on array proccessData, insert new data
                $processedData[$month] = [
                    'month' => $month,
                    'total' => $total
                ];
            }
        }

        $processedData = array_values($processedData);

        return $processedData;
    }

    public function getBookRegistration()
    {
        $query = $this->db->query("SELECT 
            DATE_FORMAT(created_at, '%b') AS month, 
            COUNT(*) AS total 
            FROM book_data 
            GROUP BY MONTH(created_at), created_at;
        ");

        $result = $query->result_array();

        $processedData = [];

        // process data for aggregate total if month name is same
        foreach ($result as $row) {
            $month = $row['month'];
            $total = $row['total'];

            // if already month name on array processedData, aggregate the total
            if (isset($processedData[$month])) {
                $processedData[$month]['total'] += $total;
            } else {
                // if month name not registered on array proccessData, insert new data
                $processedData[$month] = [
                    'month' => $month,
                    'total' => $total
                ];
            }
        }

        $processedData = array_values($processedData);

        return $processedData;
    }

    public function getRecentUsers()
    {
        $query = "SELECT
            first_name, last_name, 
            username, avatar_image, role
            FROM user_data AS ud
            JOIN user_role AS ur
            ON ud.role_id = ur.id
            ORDER BY ud.created_at DESC
            LIMIT 3
        ";

        return $this->db->query($query)->result_array();
    }

    public function getRecentBooks()
    {
        $query = $this->db->query("SELECT
            bd.id, bd.title, ba.author, bp.publisher, bc.category, bd.cover_image
            FROM book_data AS bd
            JOIN book_author AS ba
                ON bd.author_id = ba.id
            JOIN book_publisher AS bp
                ON bd.publisher_id = bp.id
            JOIN book_category AS bc
                ON bd.category_id = bc.id
            ORDER BY bd.created_at DESC
            LIMIT 3
        ")->result_array();

        return $query;
    }

    public function getUserGender()
    {
        $query = $this->db->query("SELECT
            gender, COUNT(*) AS total
            FROM user_data
            GROUP BY gender
        ");

        return $query->result_array();
    }

    public function getLogAction()
    {
        $query = $this->db->query("SELECT
            first_name, last_name, username, 
            avatar_image, role, action
            FROM user_data AS ud
            JOIN user_role AS ur
                ON ud.role_id = ur.id
            JOIN user_log_action AS ula
                ON ud.id = ula.user_id
            ORDER BY ula.created_at DESC
            LIMIT 5
        ")->result_array();

        return $query;
    }

    public function getLogActionByUser($userId)
    {
        $query = "SELECT
            first_name, last_name, username, 
            avatar_image, role, action
            FROM user_data AS ud
            JOIN user_role AS ur
                ON ud.role_id = ur.id
            JOIN user_log_action AS ula
                ON ud.id = ula.user_id
            WHERE ud.id = $userId
            ORDER BY ula.created_at DESC
            LIMIT 5
        ";

        $result = $this->db->query($query)->result_array();

        return $result;
    }
}
