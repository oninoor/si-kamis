<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_loket', 'loket');
        $this->load->model('M_all', 'model');
        if (empty($this->session->userdata('role') == 1)) {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('no_rm');
            $this->session->unset_userdata('nama_lengkap');
            $this->session->set_flashdata('login_dulu', true);
            redirect('Auth');
        }
    }

    public function index()
    {
        $var['title'] = 'Admin | Dashboard';
        $this->load->view('admin/dashboard', $var);
    }

    public function data_pasien()
    {
        $var['title'] = 'Admin | Data Pasien';
        $var['pasien'] = $this->loket->get_pasien();
        $this->load->view('admin/data_pasien', $var);
    }

    public function detail_pasien($id)
    {
        $var['title'] = 'Admin | Detail Pasien';
        $var['view'] = $this->loket->detail_pasien($id);
        $this->load->view('admin/detail_pasien', $var);
    }

    public function data_kunjungan()
    {
        $var['title'] = 'Admin | Data Kunjungan';
        $var['kunjungan'] = $this->model->get_kunjungan_admin();
        $this->load->view('admin/data_kunjungan', $var);
    }

    public function detail_kunjungan($id)
    {
        $var['title'] = 'Admin | Detail Kunjungan';
        $var['view'] = $this->model->detail_kunjungan($id);
        $this->load->view('admin/detail_kunjungan', $var);
    }

    public function diagnosis()
    {
        $var['title'] = 'Admin | Data Diagnosis';
        $var['diagnosis'] = $this->model->get_diagnosis();
        $this->load->view('admin/diagnosis', $var);
    }

    public function tambah_diagnosis()
    {
        $var['title'] = 'Admin | Tambah Diagnosis';
        $this->load->view('admin/add_diagnosis', $var);
    }

    public function save_diagnosis()
    {
        $this->form_validation->set_rules('nama_diagnosis', 'nama', 'required|trim', ['required' => 'diagnosis harus diisi']);
        $this->form_validation->set_rules('diagnosis_icd_10', 'diagnosis icd 10', 'required|trim', ['required' => 'diagnosis icd 10 harus diisi']);
        $this->form_validation->set_rules('kode_diagnosis_icd_10', 'kode diagnosis icd 10', 'required|trim', ['required' => 'kode diagnosis icd 10 harus diisi']);
        if ($this->form_validation->run() == false) {
            $this->tambah_diagnosis();
        } else {
            $this->model->save_diagnosis();
            $this->session->set_flashdata('success_insert', true);
            redirect('Admin/diagnosis');
        }
    }
}
