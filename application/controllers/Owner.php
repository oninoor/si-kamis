<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Owner extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_owner', 'owner');
        $this->load->library('form_validation');
        if (empty($this->session->userdata('role' == 0))) {
            $this->session->set_flashdata('login_dulu', true);
            redirect('Auth');
        }
    }

    public function index()
    {
        $var['title'] = 'Owner | Dashboard';
        $this->load->view('owner/dashboard', $var);
    }

    public function petugas()
    {
        $var['title'] = 'Owner | Petugas';
        $var['petugas'] = $this->owner->get_users();
        $this->load->view('owner/petugas', $var);
    }

    public function tambah_petugas()
    {
        $var['title'] = 'Owner | Tambah Petugas';
        $this->load->view('owner/add_petugas', $var);
    }

    public function save_petugas()
    {
        $this->form_validation->set_rules('nama_lengkap', 'nama', 'required|trim', ['required' => 'nama lengkap harus diisi']);
        $this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[users.username]', ['is_unique' => 'username telah terdaftar atau terpakai', 'required' => 'username harus diisi']);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', ['required' => 'alamat harus diisi']);
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required|trim|max_length[13]|numeric', ['required' => 'no telepon harus di isi', 'max_length' => 'nomor telepon maksimal 13 angka', 'numeric' => 'no telepon harus angka']);
        $this->form_validation->set_rules('password', 'password', 'required|trim', ['required' => 'password harus diisi']);
        $this->form_validation->set_rules('role', 'role', 'required|trim', ['required' => 'role / posisi harus diisi']);
        if ($this->form_validation->run() == false) {
            $this->tambah_petugas();
        } else {
            $this->owner->save_petugas();
            $this->session->set_flashdata('success_insert', true);
            redirect('Owner/petugas');
        }
    }

    public function aktifkan_petugas($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id', $id);
        $this->db->update('users');
        $this->session->set_flashdata('success_active', true);
        redirect('Owner/petugas');
    }

    public function nonaktifkan_petugas($id)
    {
        $this->db->set('status', 0);
        $this->db->where('id', $id);
        $this->db->update('users');
        $this->session->set_flashdata('success_nonaktiv', true);
        redirect('Owner/petugas');
    }

    public function edit_petugas($id)
    {
        $var['title'] = 'Owner | Perbarui Petugas';
        $var['edit'] = $this->db->get_where('users', ['id' => $id])->row();
        $this->load->view('owner/edit_petugas', $var);
    }

    public function update_petugas()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nama_lengkap', 'nama', 'required|trim', ['required' => 'nama lengkap harus diisi']);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', ['required' => 'alamat harus diisi']);
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required|trim|max_length[13]|numeric', ['required' => 'no telepon harus di isi', 'max_length' => 'nomor telepon maksimal 13 angka', 'numeric' => 'no telepon harus angka']);
        $this->form_validation->set_rules('role', 'role', 'required|trim', ['required' => 'role / posisi harus diisi']);
        if ($this->form_validation->run() == false) {
            $this->edit_petugas($id);
        } else {
            $this->owner->update_petugas();
            $this->session->set_flashdata('success_update', true);
            redirect('Owner/petugas');
        }
    }

    public function hapus_petugas($id) 
    {
        $this->db->delete('users', ['id' => $id]);
        $this->session->set_flashdata('success_delete', true);
        redirect('Owner/petugas');
    }
}
