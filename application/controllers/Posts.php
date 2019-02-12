<?php
class Posts extends CI_Controller {
    public function index() {

        $data['title'] = 'Seneste blogindlæg';

        $data['posts'] = $this->post_model->get_posts();

        $this->load->view('templates/header');
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug = NULL) {
        $data['post'] = $this->post_model->get_posts($slug);
        $post_id = $data['post']['id'];
        $data['comments'] = $this->comment_model->get_comments($post_id);

        if(empty($data['post'])) {
            show_404();
        }

        $data['title'] = $data['post']['title'];

        $this->load->view('templates/header');
        $this->load->view('posts/view', $data);
        $this->load->view('templates/footer');
    }

    public function create() {

        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $data['title'] = 'Opret Blog indlæg';

        $data['categories'] = $this->post_model->get_categories();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');
        $this->form_validation->set_rules('author', 'Author', 'required');

        if($this->form_validation->run() === false) {
            $this->load->view('templates/header');
            $this->load->view('posts/create', $data);
            $this->load->view('templates/footer');
        } else {

            $config['upload_path'] = 'C:\xampp\htdocs\assets\images\posts';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';
            
            $this->load->library('upload', $config);

            if(!$this->upload->do_upload()) {
                $error = array('error' => $this->upload->display_errors());
                $post_image = 'noimage.jpg';
            } else {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
            }

            $this->post_model->create_post($post_image);
            $this->session->set_flashdata('post_created', 'Blog indlæg oprettet');
            redirect('posts');
        }

    }

    public function delete($id) {

        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }
    $this->post_model->delete_post($id);
        $this->session->set_flashdata('post_deleted', 'Indlæg slettet');
    redirect('posts');
    }

    public function edit($slug) {

        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $data['post'] = $this->post_model->get_posts($slug);
        $data['categories'] = $this->post_model->get_categories();
        if(empty($data['post'])) {
            show_404();
        }
        $data['title'] = "Ret Blog indlæg";

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');
        $this->form_validation->set_rules('author', 'Author', 'required');

        $this->load->view('templates/header');
        $this->load->view('posts/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update() {
        $this->post_model->update_post();
        $this->session->set_flashdata('post_updated', 'Indlæg opdateret');
        redirect('posts');
    }


}