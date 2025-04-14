<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        _checkIsLogin();
        $this->load->model('Book_model', 'book');
        $this->load->model('LogAction_model', 'logaction');
    }

    public function index()
    {
        $data['title'] = 'Book Publisher';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['book_publisher'] = $this->db->get('book_publisher')->result_array();

        $this->form_validation->set_rules('publisher', 'Publisher', 'required|is_unique[book_publisher.publisher]', [
            'required' => "Publisher name can't be empty",
            'is_unique' => 'A publisher with the name "' . htmlspecialchars($this->input->post('publisher')) . '" already exists. Please use another name if you want to add it!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/layout_header', $data);
            $this->load->view('layout/layout_sidebar');
            $this->load->view('layout/layout_topbar');
            $this->load->view('book/book_publisher');
            $this->load->view('layout/layout_footer');
        } else {
            $publisher = htmlspecialchars($this->input->post('publisher'));
            $this->db->insert('book_publisher', ['publisher' => $publisher]);

            $userLogAction = [
                'user_id' => $this->session->userdata('id_user'),
                'action' => 'Publisher "' . $publisher . '" has been added!',
            ];

            $this->logaction->insertLog($userLogAction);

            $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Publisher "<b>' . $publisher . '</b>" has been added!</div>');
            redirect('book');
        }
    }

    public function change_publisher_by_id()
    {
        $data['title'] = 'Book Publisher';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['book_publisher'] = $this->db->get('book_publisher')->result_array();

        $this->form_validation->set_rules('publisher', 'Publisher', 'required|is_unique[book_publisher.publisher]', [
            'required' => "Publisher name can't be empty",
            'is_unique' => 'A publisher with the name "' . htmlspecialchars($this->input->post('publisher')) . '" already exists. Please use another name if you want to change it!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/layout_header', $data);
            $this->load->view('layout/layout_sidebar');
            $this->load->view('layout/layout_topbar');
            $this->load->view('book/book_publisher');
            $this->load->view('layout/layout_footer');
        } else {
            $id = htmlspecialchars($this->input->post('id'));
            $publisher = htmlspecialchars($this->input->post('publisher'));
            $publisherBefore = $this->db->get_where('book_publisher', ['id' => $id])->row_array();

            $this->db->where('id', $id);
            $this->db->update('book_publisher', ['publisher' => $publisher]);

            $userLogAction = [
                'user_id' => $this->session->userdata('id_user'),
                'action' => 'Publisher "' . $publisherBefore['publisher'] . '" has been change to "' . $publisher . '"!',
            ];

            $this->logaction->insertLog($userLogAction);

            $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Publisher "<b>' . $publisherBefore['publisher'] . '</b>" has been change to "<b>' . $publisher . '</b>"!</div>');
            redirect('book');
        }
    }

    public function delete_publisher_by_id()
    {
        $id = $this->uri->segment(3);
        $publisherName = $this->db->get_where('book_publisher', ['id' => $id])->row_array()['publisher'];
        $this->db->where('id', $id);
        $this->db->delete('book_publisher');

        $userLogAction = [
            'user_id' => $this->session->userdata('id_user'),
            'action' => 'Publisher "' . $publisherName . '" has been deleted!',
        ];

        $this->logaction->insertLog($userLogAction);

        $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Publisher "<b>' . $publisherName . '</b>" has been deleted!</div>');
        redirect('book');
    }

    public function get_publisher_by_id($publisherId)
    {
        $publisher = $this->db->get_where('book_publisher', ['id' => $publisherId])->row_array();
        exit(json_encode($publisher));
    }

    public function book_author()
    {
        $data['title'] = 'Book Author';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['book_author'] = $this->db->get('book_author')->result_array();

        $this->form_validation->set_rules('author', 'Author', 'required|is_unique[book_author.author]', [
            'required' => "Author name can't be empty",
            'is_unique' => 'A author with the name "' . htmlspecialchars($this->input->post('author')) . '" already exists. Please use another name if you want to add it!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/layout_header', $data);
            $this->load->view('layout/layout_sidebar');
            $this->load->view('layout/layout_topbar');
            $this->load->view('book/book_author');
            $this->load->view('layout/layout_footer');
        } else {
            $author = htmlspecialchars($this->input->post('author'));
            $this->db->insert('book_author', ['author' => $author]);

            $userLogAction = [
                'user_id' => $this->session->userdata('id_user'),
                'action' => 'Author "' . $author . '" has been added!',
            ];

            $this->logaction->insertLog($userLogAction);

            $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Author "<b>' . $author . '</b>" has been added!</div>');
            redirect('book/book_author');
        }
    }

    public function change_author_by_id()
    {
        $data['title'] = 'Book Author';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['book_author'] = $this->db->get('book_author')->result_array();

        $this->form_validation->set_rules('author', 'Author', 'required|is_unique[book_author.author]', [
            'required' => "Author name can't be empty",
            'is_unique' => 'A author with the name "' . htmlspecialchars($this->input->post('author')) . '" already exists. Please use another name if you want to change it!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/layout_header', $data);
            $this->load->view('layout/layout_sidebar');
            $this->load->view('layout/layout_topbar');
            $this->load->view('book/book_author');
            $this->load->view('layout/layout_footer');
        } else {
            $id = htmlspecialchars($this->input->post('id'));
            $author = htmlspecialchars($this->input->post('author'));
            $authorBefore = $this->db->get_where('book_author', ['id' => $id])->row_array();

            $this->db->where('id', $id);
            $this->db->update('book_author', ['author' => $author]);

            $userLogAction = [
                'user_id' => $this->session->userdata('id_user'),
                'action' => 'Author "' . $authorBefore['author'] . '" has been change to "' . $author . '"!',
            ];

            $this->logaction->insertLog($userLogAction);

            $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Author "<b>' . $authorBefore['author'] . '</b>" has been change to "<b>' . $author . '</b>"!</div>');
            redirect('book/book_author');
        }
    }

    public function delete_author_by_id()
    {
        $id = $this->uri->segment(3);
        $authorName = $this->db->get_where('book_author', ['id' => $id])->row_array()['author'];
        $this->db->where('id', $id);
        $this->db->delete('book_author');

        $userLogAction = [
            'user_id' => $this->session->userdata('id_user'),
            'action' => 'Author "' . $authorName . '" has been deleted!',
        ];

        $this->logaction->insertLog($userLogAction);

        $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Author "<b>' . $authorName . '</b>" has been deleted!</div>');
        redirect('book/book_author');
    }

    public function get_author_by_id($authorId)
    {
        $author = $this->db->get_where('book_author', ['id' => $authorId])->row_array();
        exit(json_encode($author));
    }

    public function book_data()
    {
        $data['title'] = 'Book Data';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['book_data'] = $this->book->getAllBook();
        $data['publisher'] = $this->db->get('book_publisher')->result_array();
        $data['author'] = $this->db->get('book_author')->result_array();
        $data['category'] = $this->db->get('book_category')->result_array();

        // Title Field
        $this->form_validation->set_rules('title', 'Title', 'required', [
            'required' => "Title name can't be empty",
        ]);

        // Synopsis Field
        $this->form_validation->set_rules('synopsis', 'Synopsis', 'required', [
            'required' => "Synopsis can't be empty",
        ]);

        // Language Field
        $this->form_validation->set_rules('language', 'Language', 'required', [
            'required' => "Language can't be empty",
        ]);

        // Publish Date Field
        $this->form_validation->set_rules('publish_date', 'Publish Date', 'required', [
            'required' => "Publish Date can't be empty",
        ]);

        // Total Page Field
        $this->form_validation->set_rules('total_page', 'Total Page', 'required', [
            'required' => "Total Page can't be empty",
        ]);

        // Quantity Available Field
        $this->form_validation->set_rules('quantity_available', 'Quantity Available', 'required', [
            'required' => "Quantity Available can't be empty",
        ]);

        // Publisher Field
        $this->form_validation->set_rules('publisher_id', 'Publisher', 'required', [
            'required' => "Publisher can't be empty",
        ]);

        // Author Field
        $this->form_validation->set_rules('author_id', 'Author', 'required', [
            'required' => "Author can't be empty",
        ]);

        // Category Field
        $this->form_validation->set_rules('category_id', 'Category', 'required', [
            'required' => "Category can't be empty",
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/layout_header', $data);
            $this->load->view('layout/layout_sidebar');
            $this->load->view('layout/layout_topbar');
            $this->load->view('book/book_data');
            $this->load->view('layout/layout_footer');
        } else {
            $data = [
                'title' => htmlspecialchars($this->input->post('title', true)),
                'synopsis' => htmlspecialchars($this->input->post('synopsis', true)),
                'language' => htmlspecialchars($this->input->post('language', true)),
                'publish_date' => htmlspecialchars($this->input->post('publish_date', true)),
                'total_page' => htmlspecialchars($this->input->post('total_page', true)),
                'quantity_available' => htmlspecialchars($this->input->post('quantity_available', true)),
                'publisher_id' => htmlspecialchars($this->input->post('publisher_id', true)),
                'author_id' => htmlspecialchars($this->input->post('author_id', true)),
                'category_id' => htmlspecialchars($this->input->post('category_id', true))
            ];

            // Check if there are images to be uploaded
            $upload_image = $_FILES['cover_image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg|png|webp|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/cover_image/';

                // Get extension file
                $file_ext = pathinfo($_FILES['cover_image']['name'], PATHINFO_EXTENSION);

                // Create unique file name with uniqid() function and concate with extension name
                $unique_filename = uniqid() . '_' . time() . '.' . $file_ext;

                $config['file_name'] = $unique_filename;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('cover_image')) {
                    $new_cover_image = $this->upload->data('file_name');
                    $this->db->set('cover_image', $new_cover_image);
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $data += ['cover_image' => 'default_cover.jpg'];
            }


            $this->db->insert('book_data', $data);

            $userLogAction = [
                'user_id' => $this->session->userdata('id_user'),
                'action' => 'A new book "' . $data['title'] . '" has been added!',
            ];

            $this->logaction->insertLog($userLogAction);

            $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">A new book "<b>' . $data['title'] . '</b>" has been added</div>');
            redirect('book/book_data');
        }
    }

    public function change_book_data_by_id()
    {
        $data['title'] = 'Book Data';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['book_data'] = $this->book->getAllBook();
        $data['publisher'] = $this->db->get('book_publisher')->result_array();
        $data['author'] = $this->db->get('book_author')->result_array();
        $data['category'] = $this->db->get('book_category')->result_array();

        // Title Field
        $this->form_validation->set_rules('title', 'Title', 'required', [
            'required' => "Title name can't be empty",
        ]);

        // Synopsis Field
        $this->form_validation->set_rules('synopsis', 'Synopsis', 'required', [
            'required' => "Synopsis can't be empty",
        ]);

        // Language Field
        $this->form_validation->set_rules('language', 'Language', 'required', [
            'required' => "Language can't be empty",
        ]);

        // Publish Date Field
        $this->form_validation->set_rules('publish_date', 'Publish Date', 'required', [
            'required' => "Publish Date can't be empty",
        ]);

        // Total Page Field
        $this->form_validation->set_rules('total_page', 'Total Page', 'required', [
            'required' => "Total Page can't be empty",
        ]);

        // Quantity Available Field
        $this->form_validation->set_rules('quantity_available', 'Quantity Available', 'required', [
            'required' => "Quantity Available can't be empty",
        ]);

        // Publisher Field
        $this->form_validation->set_rules('publisher_id', 'Publisher', 'required', [
            'required' => "Publisher can't be empty",
        ]);

        // Author Field
        $this->form_validation->set_rules('author_id', 'Author', 'required', [
            'required' => "Author can't be empty",
        ]);

        // Category Field
        $this->form_validation->set_rules('category_id', 'Category', 'required', [
            'required' => "Category can't be empty",
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/layout_header', $data);
            $this->load->view('layout/layout_sidebar');
            $this->load->view('layout/layout_topbar');
            $this->load->view('book/book_data');
            $this->load->view('layout/layout_footer');
        } else {
            $data = [
                'title' => htmlspecialchars($this->input->post('title', true)),
                'synopsis' => htmlspecialchars($this->input->post('synopsis', true)),
                'language' => htmlspecialchars($this->input->post('language', true)),
                'publish_date' => htmlspecialchars($this->input->post('publish_date', true)),
                'total_page' => htmlspecialchars($this->input->post('total_page', true)),
                'quantity_available' => htmlspecialchars($this->input->post('quantity_available', true)),
                'publisher_id' => htmlspecialchars($this->input->post('publisher_id', true)),
                'author_id' => htmlspecialchars($this->input->post('author_id', true)),
                'category_id' => htmlspecialchars($this->input->post('category_id', true))
            ];

            // Check if there are images to be uploaded
            $upload_image = $_FILES['cover_image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg|png|webp|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/cover_image/';

                // Get extension file
                $file_ext = pathinfo($_FILES['cover_image']['name'], PATHINFO_EXTENSION);

                // Create unique file name with uniqid() function and concate with extension name
                $unique_filename = uniqid() . '_' . time() . '.' . $file_ext;

                $config['file_name'] = $unique_filename;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('cover_image')) {
                    $old_cover_image = $this->db->get_where("book_data", ['id' => htmlspecialchars($this->input->post('id'))])->row_array()['cover_image'];
                    if ($old_cover_image != "default_cover.jpg") {
                        unlink(FCPATH . 'assets/img/cover_image/' . $old_cover_image);
                    }
                    $new_cover_image = $this->upload->data('file_name');
                    $this->db->set('cover_image', $new_cover_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $titleBefore = $this->db->get_where('book_data', ['id' => htmlspecialchars($this->input->post('id'))])->row_array()['title'];

            if ($titleBefore != $data['title']) {
                $messageAction = 'Book "' . $titleBefore . '" has been change to "' . $data['title'] . '"!';
            } else {
                $messageAction = 'Book "' . $data['title'] . '" has been upadted!';
            }

            $this->db->where('id', htmlspecialchars($this->input->post('id', true)));
            $this->db->update('book_data', $data);

            $userLogAction = [
                'user_id' => $this->session->userdata('id_user'),
                'action' => $messageAction,
            ];

            $this->logaction->insertLog($userLogAction);

            $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">' . $messageAction . '</div>');
            redirect('book/book_data');
        }
    }

    public function get_book_by_id()
    {
        $id = $this->uri->segment(3);
        $book = $this->book->getBookById($id);

        exit(json_encode($book));
    }

    public function delete_book_by_id()
    {
        $id = $this->uri->segment(3);
        $cover_image = $this->db->get_where('book_data', ['id' => $id])->row_array()['cover_image'];

        if ($cover_image != "default_cover.jpg") {
            unlink(FCPATH . 'assets/img/cover_image/' . $cover_image);
        }

        $usernameOperator = $this->db->get_where('user_data', ['id' => $this->session->userdata('id_user')])->row_array()['username'];
        $bookTitle = $this->db->get_where('book_data', ['id' => $id])->row_array()['title'];

        $userLogAction = [
            'user_id' => $this->session->userdata('id_user'),
            'action' => 'Operator "' . $usernameOperator . '" has been deleted book data "' . $bookTitle . '"!',
        ];

        $this->logaction->insertLog($userLogAction);

        $this->db->delete('book_data', ['id' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mr-4">Book <b>"' . $bookTitle . '" has been deleted!</div>');
        redirect('book/book_data');
    }

    public function book_category()
    {
        $data['title'] = 'Book Category';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['book_category'] = $this->db->get('book_category')->result_array();

        $this->form_validation->set_rules('category', 'Category', 'required|is_unique[book_category.category]', [
            'required' => "Category name can't be empty",
            'is_unique' => 'A category with the name "' . htmlspecialchars($this->input->post('category')) . '" already exists. Please use another name if you want to add it!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/layout_header', $data);
            $this->load->view('layout/layout_sidebar');
            $this->load->view('layout/layout_topbar');
            $this->load->view('book/book_category');
            $this->load->view('layout/layout_footer');
        } else {
            $category = htmlspecialchars($this->input->post('category'));
            $this->db->insert('book_category', ['category' => $category]);

            $userLogAction = [
                'user_id' => $this->session->userdata('id_user'),
                'action' => 'Category "' . $category . '" has been added!',
            ];

            $this->logaction->insertLog($userLogAction);

            $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Category "<b>' . $category . '</b>" has been added!</div>');
            redirect('book/book_category');
        }
    }

    public function change_category_by_id()
    {
        $data['title'] = 'Book Category';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['book_category'] = $this->db->get('book_category')->result_array();

        $this->form_validation->set_rules('category', 'Category', 'required|is_unique[book_category.category]', [
            'required' => "Category name can't be empty",
            'is_unique' => 'A category with the name "' . htmlspecialchars($this->input->post('category')) . '" already exists. Please use another name if you want to change it!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/layout_header', $data);
            $this->load->view('layout/layout_sidebar');
            $this->load->view('layout/layout_topbar');
            $this->load->view('book/book_category');
            $this->load->view('layout/layout_footer');
        } else {
            $id = htmlspecialchars($this->input->post('id'));
            $category = htmlspecialchars($this->input->post('category'));
            $categoryBefore = $this->db->get_where('book_category', ['id' => $id])->row_array();

            $this->db->where('id', $id);
            $this->db->update('book_category', ['category' => $category]);

            $userLogAction = [
                'user_id' => $this->session->userdata('id_user'),
                'action' => 'Category "' . $categoryBefore['category'] . '" has been change to "' . $category . '"!',
            ];

            $this->logaction->insertLog($userLogAction);

            $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Category "<b>' . $categoryBefore['category'] . '</b>" has been change to "<b>' . $category . '</b>"!</div>');
            redirect('book/book_category');
        }
    }

    public function delete_category_by_id()
    {
        $id = $this->uri->segment(3);
        $categoryName = $this->db->get_where('book_category', ['id' => $id])->row_array()['category'];
        $this->db->where('id', $id);
        $this->db->delete('book_category');

        $userLogAction = [
            'user_id' => $this->session->userdata('id_user'),
            'action' => 'Category "' . $categoryName . '" has been deleted!',
        ];

        $this->logaction->insertLog($userLogAction);

        $this->session->set_flashdata('message', '<div class="alert alert-success mb-4">Category "<b>' . $categoryName . '</b>" has been deleted!</div>');
        redirect('book/book_category');
    }

    public function get_category_by_id($categoryId)
    {
        $category = $this->db->get_where('book_category', ['id' => $categoryId])->row_array();
        exit(json_encode($category));
    }
}
