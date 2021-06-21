<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['users'] = $this->user_model->get_all_users();
        $this->load->view('user_index', $data);
    }

    public function create()
    {
        $this->load->view('user_create');
    }

    public function store()
    {
        $validation = $this->form_validation;
        $validation->set_rules($this->user_model->rules());

        if ($validation->run()) {
            $this->user_model->create_user();
            $this->session->set_flashdata('sucess', 'Data berhasil di simpan');
            return redirect('user');
        }
        
        $this->load->view('user_create');
    }

    public function edit($id)
    {
        $user = $this->user_model->get_user_by_id($id);

        if ($user == null) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            return redirect('user');
        }

        $data['user'] = $user;

        $this->load->view('user_edit', $data);
    }

    public function update($id)
    {
        $data['user'] = $this->user_model->get_user_by_id($id);

        if ($data['user'] == null) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            return redirect('user');
        }

        $validation = $this->form_validation;
        $validation->set_rules('email', 'Email', 'required');
        $validation->set_rules('username', 'Username', 'required');

        if ($validation->run()) {
            $this->user_model->update_user($id);
            $this->session->set_flashdata('sucess', 'Data berhasil diupdate');
            return redirect('user');
        }

        $this->load->view('user_edit', $data);
    }

    public function delete($id)
    {
        $user = $this->user_model->get_user_by_id($id);

        if ($user == null) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            return redirect('user');
        }

        $this->user_model->delete_user($id);
        return redirect('user');
    }
}
