<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member_model extends CI_Model
{
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

        $book = $this->db->query($query)->row_array();

        return $book;
    }

    public function getTotalBookBorrowedByUser($userId)
    {
        $query = "SELECT COUNT(tb.id) AS total_book_borrowed
            FROM transaction_borrow AS tb
            JOIN status AS st
                ON tb.status_id = st.id
            JOIN user_data AS ud
                ON tb.user_id = ud.id
            WHERE ud.id = $userId
                AND st.status = 'Accepted'
        ";

        $result = $this->db->query($query)->row_array()['total_book_borrowed'];
        return $result;
    }

    public function getTotalBookReturnedByUser($userId)
    {
        $query = "SELECT COUNT(tr.id) AS total_book_returned
            FROM transaction_return AS tr
            JOIN transaction_borrow AS tb
                ON tr.borrow_id = tb.id
            JOIN status AS st
                ON tr.status_id = st.id
            JOIN user_data AS ud
                ON tb.user_id = ud.id
            WHERE ud.id = $userId
                AND st.status = 'Returned'
        ";

        $result = $this->db->query($query)->row_array()['total_book_returned'];
        return $result;
    }

    public function getTotalQuantityBorrowedByUser($userId)
    {
        $query = "SELECT SUM(tb.quantity) AS total_quantity_borrowed
            FROM transaction_borrow AS tb
            JOIN status AS st
                ON tb.status_id = st.id
            JOIN user_data AS ud
                ON tb.user_id = ud.id
            WHERE ud.id = $userId
                AND st.status = 'Accepted'
        ";

        $result = $this->db->query($query)->row_array()['total_quantity_borrowed'];
        return $result;
    }

    public function getTotalFineAmountByUser($userId)
    {
        $query = "SELECT SUM(tr.fine_amount) AS total_fine_amount
            FROM transaction_return AS tr
            JOIN transaction_borrow AS tb
                ON tr.borrow_id = tb.id
            JOIN status AS st
                ON tr.status_id = st.id
            JOIN user_data AS ud
                ON tb.user_id = ud.id
            WHERE ud.id = $userId
                AND st.status = 'Returned'
        ";

        $result = $this->db->query($query)->row_array()['total_fine_amount'];
        return $result;
    }

    public function getMonthlyBookBorrowedByUser($userId)
    {
        $query = "SELECT DATE_FORMAT(tb.borrow_date, '%b') AS month, COUNT(*) AS total
            FROM transaction_borrow AS tb
            JOIN status AS st
                ON tb.status_id = st.id
            WHERE tb.user_id = $userId
                AND st.status = 'Accepted'
            GROUP BY MONTH(tb.borrow_date), tb.borrow_date;
        ";

        $result = $this->db->query($query)->result_array();

        // Inisialisasi array asosiatif untuk menyimpan data yang telah dielaborasi
        $processedData = array();

        // Proses data untuk menggabungkan total jika bulan sama
        foreach ($result as $row) {
            $month = $row['month'];
            $total = $row['total'];

            // Jika bulan sudah ada dalam array processedData, tambahkan totalnya
            if (isset($processedData[$month])) {
                $processedData[$month]['total'] += $total;
            } else {
                // Jika bulan belum ada dalam array processedData, tambahkan data baru
                $processedData[$month] = array(
                    'month' => $month,
                    'total' => $total
                );
            }
        }

        // Ubah array asosiatif ke dalam array numerik
        $processedData = array_values($processedData);

        return $processedData;
    }

    public function getMonthlyBookReturnedByUser($userId)
    {
        $query = "SELECT DATE_FORMAT(tr.return_date, '%b') AS month, COUNT(*) AS total
            FROM transaction_borrow AS tb
            JOIN transaction_return AS tr
                ON tb.id = tr.borrow_id
            JOIN status AS st
                ON tr.status_id = st.id
            WHERE tb.user_id = $userId
                AND tr.return_date IS NOT NULL
                AND st.status = 'Returned'
            GROUP BY MONTH(tr.return_date), tr.return_date;
        ";

        $result = $this->db->query($query)->result_array();

        // Inisialisasi array asosiatif untuk menyimpan data yang telah dielaborasi
        $processedData = array();

        // Proses data untuk menggabungkan total jika bulan sama
        foreach ($result as $row) {
            $month = $row['month'];
            $total = $row['total'];

            // Jika bulan sudah ada dalam array processedData, tambahkan totalnya
            if (isset($processedData[$month])) {
                $processedData[$month]['total'] += $total;
            } else {
                // Jika bulan belum ada dalam array processedData, tambahkan data baru
                $processedData[$month] = array(
                    'month' => $month,
                    'total' => $total
                );
            }
        }

        // Ubah array asosiatif ke dalam array numerik
        $processedData = array_values($processedData);

        return $processedData;
    }

    public function getRecentlyBookBorrowedByUser($userId)
    {
        $query = "SELECT
            bd.id, bd.title, ba.author, bp.publisher, bc.category,
            bd.cover_image, MAX(tb.borrow_date) AS borrow_date
            FROM transaction_borrow AS tb
            JOIN book_data AS bd
                ON tb.book_id = bd.id
            JOIN book_author AS ba
                ON bd.author_id = ba.id
            JOIN book_publisher AS bp
                ON bd.publisher_id = bp.id
            JOIN book_category AS bc
                ON bd.category_id = bc.id
            JOIN status AS st
                ON tb.status_id = st.id
            WHERE tb.user_id = $userId
                AND st.status = 'Accepted'
            GROUP BY bd.id, bd.title, ba.author, bd.cover_image
            ORDER BY borrow_date DESC
            LIMIT 3
        ";

        $result = $this->db->query($query)->result_array();

        return $result;
    }

    public function getRecentlyBookReturnedByUser($userId)
    {
        $query = "SELECT
            bd.id, bd.title, ba.author, bp.publisher, bc.category,
            bd.cover_image, MAX(tb.borrow_date) AS borrow_date
            FROM transaction_return AS tr
            JOIN transaction_borrow AS tb
                ON tr.borrow_id = tb.id
            JOIN book_data AS bd
                ON tb.book_id = bd.id
            JOIN book_author AS ba
                ON bd.author_id = ba.id
            JOIN book_publisher AS bp
                ON bd.publisher_id = bp.id
            JOIN book_category AS bc
                ON bd.category_id = bc.id
            JOIN status AS st
                ON tr.status_id = st.id
            WHERE tb.user_id = $userId
                AND st.status = 'Returned'
            GROUP BY bd.id, bd.title, ba.author, bd.cover_image
            ORDER BY borrow_date DESC
            LIMIT 3
        ";

        $result = $this->db->query($query)->result_array();

        return $result;
    }

    public function getTitleBookByTransactionReturnId($transactionReturnId)
    {
        $query = "SELECT bd.title FROM transaction_return AS tr
            JOIN transaction_borrow AS tb
                ON tr.borrow_id = tb.id
            JOIN book_data AS bd
                ON tb.book_id = bd.id
            WHERE tr.id = $transactionReturnId
        ";

        $result = $this->db->query($query)->row_array();

        return $result;
    }

    public function getLatestBorrowedStatusByUser($userId)
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
            ORDER BY tb.id DESC
            LIMIT 3
        ";

        return $this->db->query($query)->result_array();
    }
}
