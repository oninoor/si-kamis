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

    public function edit_diagnosis($id)
    {
        $var['title'] = 'Admin | Edit Diagnosis';
        $var['edit'] = $this->db->get_where('diagnosis', ['id' => $id])->row();
        $this->load->view('admin/edit_diagnosis', $var);
    }

    public function update_diagnosis()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nama_diagnosis', 'nama', 'required|trim', ['required' => 'diagnosis harus diisi']);
        $this->form_validation->set_rules('diagnosis_icd_10', 'diagnosis icd 10', 'required|trim', ['required' => 'diagnosis icd 10 harus diisi']);
        $this->form_validation->set_rules('kode_diagnosis_icd_10', 'kode diagnosis icd 10', 'required|trim', ['required' => 'kode diagnosis icd 10 harus diisi']);
        if ($this->form_validation->run() == false) {
            $this->edit_diagnosis($id);
        } else {
            $this->model->update_diagnosis();
            $this->session->set_flashdata('success_update', true);
            redirect('Admin/diagnosis');
        }
    }

    public function hapus_diagnosis($id)
    {
        $this->db->delete('diagnosis', ['id' => $id]);
        $this->session->set_flashdata('success_delete', true);
        redirect('Admin/diagnosis');
    }

    public function tindakan()
    {
        $var['title'] = 'Admin | Tindakan';
        $var['tindakan'] = $this->model->get_tindakan();
        $this->load->view('admin/tindakan', $var);
    }

    public function tambah_tindakan()
    {
        $var['title'] = 'Admin | Tambah Tindakan';
        $this->load->view('admin/add_tindakan', $var);
    }

    public function save_tindakan()
    {
        $this->form_validation->set_rules('tindakan', 'tindakan', 'required|trim', ['required' => 'tindakan harus diisi']);
        $this->form_validation->set_rules('tindakan_icd_9cm', 'tindakan icd 9cm', 'required|trim', ['required' => 'tindakan icd 9cm harus diisi']);
        $this->form_validation->set_rules('kode_tindakan_icd_9cm', 'kode tindakan icd 9cm', 'required|trim', ['required' => 'kode tindakan icd 9cm harus diisi']);
        if ($this->form_validation->run() == false) {
            $this->tambah_tindakan();
        } else {
            $this->model->save_tindakan();
            $this->session->set_flashdata('success_insert', true);
            redirect('Admin/tindakan');
        }
    }

    public function edit_tindakan($id)
    {
        $var['title'] = 'Admin | Edit Tindakan';
        $var['edit'] = $this->db->get_where('tindakan', ['id' => $id])->row();
        $this->load->view('admin/edit_tindakan', $var);
    }

    public function update_tindakan()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('tindakan', 'tindakan', 'required|trim', ['required' => 'tindakan harus diisi']);
        $this->form_validation->set_rules('tindakan_icd_9cm', 'tindakan icd 9cm', 'required|trim', ['required' => 'tindakan icd 9cm harus diisi']);
        $this->form_validation->set_rules('kode_tindakan_icd_9cm', 'kode tindakan icd 9cm', 'required|trim', ['required' => 'kode tindakan icd 9cm harus diisi']);
        if ($this->form_validation->run() == false) {
            $this->edit_tindakan($id);
        } else {
            $this->model->update_tindakan();
            $this->session->set_flashdata('success_update', true);
            redirect('Admin/tindakan');
        }
    }

    public function hapus_tindakan($id)
    {
        $this->db->delete('tindakan', ['id' => $id]);
        $this->session->set_flashdata('success_delete', true);
        redirect('Admin/tindakan');
    }
}
