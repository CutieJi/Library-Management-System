<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book_model extends CI_Model
{
    public function getAllBook()
    {
        $query = "
            SELECT `bd`.*, `bp`.`publisher`, `ba`.`author`, `bc`.`category` 
            FROM `book_data` AS bd
            JOIN `book_publisher` AS bp
                ON `bd`.`publisher_id` = `bp`.`id`
            JOIN `book_author` AS ba
                ON `bd`.`author_id` = `ba`.`id`
            JOIN `book_category` AS bc
                ON `bd`.`category_id` = `bc`.`id`
        ";

        return $this->db->query($query)->result_array();
    }

    public function getBookById($id)
    {
        $query = "
            SELECT `bd`.`id`, `bd`.`cover_image`, `bd`.`title`, 
            `bd`.`synopsis`, `bd`.`language`, `bd`.`publish_date`, `bd`.`total_page`, `bd`.`quantity_available`,
            `bd`.`created_at`, `bd`.`updated_at`, `bd`.`publisher_id`, `bd`.`author_id`, `bd`.`category_id`,
            `bp`.`publisher`, `ba`.`author`, `bc`.`category`
            FROM `book_data` AS bd
            JOIN `book_publisher` AS bp
                ON `bd`.`publisher_id` = `bp`.`id`
            JOIN `book_author` AS ba
                ON `bd`.`author_id` = `ba`.`id`
            JOIN `book_category` AS bc
                ON `bd`.`category_id` = `bc`.`id`
            WHERE `bd`.`id` = '$id'
        ";

        $book = $this->db->query($query)->row();

        $publishers = $this->db->get('book_publisher')->result();
        $book->publishers = $publishers;

        $authors = $this->db->get('book_author')->result();
        $book->authors = $authors;

        $categorys = $this->db->get('book_category')->result();
        $book->categorys = $categorys;

        return $book;
    }

    public function getBookRecentlyAdded()
    {
        $query = "
            SELECT `bd`.*, `bp`.`publisher`, `ba`.`author`, `bc`.`category` 
            FROM `book_data` AS bd
            JOIN `book_publisher` AS bp
                ON `bd`.`publisher_id` = `bp`.`id`
            JOIN `book_author` AS ba
                ON `bd`.`author_id` = `ba`.`id`
            JOIN `book_category` AS bc
                ON `bd`.`category_id` = `bc`.`id`
            ORDER BY bd.created_at DESC
            LIMIT 10
        ";

        return $this->db->query($query)->result_array();
    }

    public function getBookByCategory($category)
    {
        $query = "
            SELECT `bd`.*, `bp`.`publisher`, `ba`.`author`, `bc`.`category` 
            FROM `book_data` AS bd
            JOIN `book_publisher` AS bp
                ON `bd`.`publisher_id` = `bp`.`id`
            JOIN `book_author` AS ba
                ON `bd`.`author_id` = `ba`.`id`
            JOIN `book_category` AS bc
                ON `bd`.`category_id` = `bc`.`id`
            WHERE `bc`.`category` LIKE '$category'
        ";

        return $this->db->query($query)->result_array();
    }

    public function getAllCategories()
    {
        $this->db->select('category');
        $this->db->distinct();
        $result = $this->db->get('book_category')->result_array();

        $categories = array_column($result, 'category');

        return $categories;
    }

    public function getListBorrowByUser($userId)
    {
        $query = "SELECT
            `tb`.`id`, `bd`.`cover_image`, `bd`.`title`,
            `tb`.`quantity`, `tb`.`borrow_date`, `tb`.`return_date`,
            `st`.`status`, `ud`.`id` AS user_id
            FROM `transaction_borrow` AS tb
            JOIN `book_data` AS bd
                ON `tb`.`book_id` = `bd`.`id`
            JOIN `status` AS st
                ON `tb`.`status_id` = `st`.`id`
            JOIN `user_data` AS ud
                ON `tb`.`user_id` = `ud`.`id`
            WHERE `ud`.`id` = $userId
        ";

        return $this->db->query($query)->result_array();
    }

    public function getAllListRequestBorrow()
    {
        $query = "SELECT
            `tb`.`id`, `bd`.`cover_image`, `bd`.`title`,
            `tb`.`quantity`, `tb`.`borrow_date`, `tb`.`return_date`,
            `st`.`status`, `ud`.`id` AS user_id, `ud`.`first_name`, 
            `ud`.`last_name`, `ud`.`avatar_image`
            FROM `transaction_borrow` AS tb
            JOIN `book_data` AS bd
                ON `tb`.`book_id` = `bd`.`id`
            JOIN `status` AS st
                ON `tb`.`status_id` = `st`.`id`
            JOIN `user_data` AS ud
                ON `tb`.`user_id` = `ud`.`id`
        ";

        return $this->db->query($query)->result_array();
    }

    public function getListReturnByUser($userId)
    {
        $query = "SELECT
            `tr`.`id`, `bd`.`cover_image`, `bd`.`title`,
            `tb`.`quantity`, `tb`.`borrow_date`, `tb`.`return_date`,
            `st`.`status`, `tr`.`fine_amount`, `tr`.`message`,
            `ud`.`id` AS user_id
            FROM transaction_return AS tr
            JOIN transaction_borrow AS tb
                ON `tr`.`borrow_id` = `tb`.`id`
            JOIN `book_data` AS bd
                ON `tb`.`book_id` = `bd`.`id`
            JOIN `status` AS st
                ON `tr`.`status_id` = `st`.`id`
            JOIN `user_data` AS ud
                ON `tb`.`user_id` = `ud`.`id`
            WHERE `ud`.`id` = $userId
        ";

        return $this->db->query($query)->result_array();
    }

    public function getAllListRequestReturn()
    {
        $query = "SELECT
            `tr`.`id`, `bd`.`id` AS book_id, `bd`.`cover_image`, `bd`.`title`,
            `tb`.`quantity`, `tb`.`borrow_date`, `tb`.`return_date` AS `request_return_date`,
            `tr`.`return_date`, `st`.`status`, `tr`.`fine_amount`, `tr`.`message`, `ud`.`id` AS user_id,
            `ud`.`first_name`, `ud`.`last_name`, `ud`.`avatar_image`
            FROM transaction_return AS tr
            JOIN transaction_borrow AS tb
                ON `tr`.`borrow_id` = `tb`.`id`
            JOIN `book_data` AS bd
                ON `tb`.`book_id` = `bd`.`id`
            JOIN `status` AS st
                ON `tr`.`status_id` = `st`.`id`
            JOIN `user_data` AS ud
                ON `tb`.`user_id` = `ud`.`id`
        ";

        return $this->db->query($query)->result_array();
    }
}
