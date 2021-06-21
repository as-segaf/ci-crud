<?php

class User_model extends CI_Model
{
    private $table = 'users';
    public $email;
    public $username;
    public $password;
    public $created_at;

    public function __construct()
    {
        $this->created_at = date('Y-m-d H:i:s');
    }

    public function rules()
    {
        return [
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required',
            ],
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required',
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ]
        ];
    }

    public function get_all_users()
    {
        return $this->db->get($this->table)->result();
    }

    public function get_user_by_id($id)
    {
        return $this->db->get_where($this->table, array('id' => $id))->row();
    }

    public function create_user()
    {
        $datas = $this->input->post();
        $this->email = $datas['email'];
        $this->username = $datas['username'];
        $this->password = password_hash($datas['password'], PASSWORD_BCRYPT);

        return $this->db->insert($this->table, $this);
    }

    public function update_user($id)
    {
        $datas = $this->input->post();
        $this->db->set('email', $datas['email']);
        $this->db->set('username', $datas['username']);
        $this->db->where('id', $id);
        
        return $this->db->update($this->table);
    }

    public function delete_user($id)
    {
        return $this->db->delete('users', array('id' => $id));
    }
}
