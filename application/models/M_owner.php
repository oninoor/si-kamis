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

    public function update_petugas()
    {
        $post = $this->input->post();
        $this->nama_lengkap = $post['nama_lengkap'];
        $this->alamat = $post['alamat'];
        $this->no_telp = $post['no_telp'];
        $this->role = $post['role'];
        $this->db->update($this->users, $this, ['id' => $post['id']]);
    }

    public function jml_seluruh_user()
    {
        $this->db->from("users");
        return $this->db->count_all_results();
    }
}
