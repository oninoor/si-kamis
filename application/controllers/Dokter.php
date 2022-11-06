<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_loket', 'loket');
        $this->load->model('M_all', 'model');
    }

    public function index()
    {
        $var['title'] = 'Dokter | Home';
        $id = $this->session->userdata('id');
        $var['dokter'] = $this->db->get_where('users', ['id' => $id])->row();
        $this->load->view('dokter/home', $var);
    }

    public function kunjungan()
    {
        $var['title'] = 'Dokter | Pemeriksaan';
        $var['kunjungan'] = $this->model->get_kunjungan();
        $this->load->view('dokter/kunjungan', $var);
    }

    public function detail_kunjungan($id)
    {
        $var['title'] = 'Dokter | Detail Pemeriksaan';
        $var['view'] = $this->model->detail_kunjungan($id);
        $this->load->view('dokter/detail_kunjungan', $var);
    }
}