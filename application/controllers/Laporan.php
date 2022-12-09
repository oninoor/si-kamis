<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_all', 'model');
    }

    public function laporan_kunjungan_admin()
    {
        if (empty($this->session->userdata('role') == 1)) {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('nama_lengkap');
            $this->session->unset_userdata('role');
            $this->session->set_flashdata('login_dulu', true);
            redirect('Auth');
        } else {
            $var['title'] = 'Laporan | Laporan Kunjungan';
            $var['laporan'] = $this->model->laporan_kunjungan();
            $var['jumlah'] = $this->model->count_laporan_kunjungan();
            $this->load->view('laporan/laporan_kunjungan_admin', $var);
        }
    }

    public function filter_laporan_kunjungan()
    {
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $var['laporan'] = $this->model->filter_laporan_kunjungan($tgl_awal, $tgl_akhir);
        $var['jumlah'] = $this->model->count_filter_laporan_kunjungan($tgl_awal, $tgl_akhir);
        $this->load->view('laporan/laporan_kunjungan_admin', $var);
    }

    public function cetak_laporan_kunjungan()
    {
        $var['title'] = 'Cetak Laporan Kunjungan';
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        if(empty($tgl_awal) && empty($tgl_akhir)) {
            $var['laporan'] = $this->model->laporan_kunjungan();
        } else {
            $var['laporan'] = $this->model->filter_laporan_kunjungan($tgl_awal, $tgl_akhir);
        }
        $this->load->view('cetak/cetak_laporan_kunjungan', $var);
    }

    public function laporan_kunjungan_owner()
    {
        if (empty($this->session->userdata('role') == 0)) {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('nama_lengkap');
            $this->session->unset_userdata('role');
            $this->session->set_flashdata('login_dulu', true);
            redirect('Auth');
        } else {
            $var['title'] = 'Laporan | Laporan Kunjungan';
            $var['laporan'] = $this->model->laporan_kunjungan();
            $var['jumlah'] = $this->model->count_laporan_kunjungan();
            $this->load->view('laporan/laporan_kunjungan', $var);
        }
    }

    public function laporan_kunjungan_loket()
    {
        if (empty($this->session->userdata('role') == 2)) {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('nama_lengkap');
            $this->session->unset_userdata('role');
            $this->session->set_flashdata('login_dulu', true);
            redirect('Auth');
        } else {
            $var['title'] = 'Laporan | Laporan Kunjungan';
            $var['laporan'] = $this->model->laporan_kunjungan();
            $this->load->view('laporan/laporan_kunjungan', $var);
        }
    }



}
