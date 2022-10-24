<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_owner extends CI_Model
{
    private $users = 'users';

    public function get_users()
    {
        return $this->db->get($this->users)->result();
    }

    public function save_petugas()
    {
        $post = $this->input->post();
        $password = $this->input->post('password', true);
        $this->nama_lengkap = $post['nama_lengkap'];
        $this->alamat = $post['alamat'];
        $this->no_telp = $post['no_telp'];
        $this->username = $post['username'];
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        $this->role = $post['role'];
        $this->status = 0;
        $this->db->insert($this->users, $this);
    }
}
