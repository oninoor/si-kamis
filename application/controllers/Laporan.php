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
            $this->load->view('laporan/laporan_kunjungan', $var);
        }
    }

    public function filter_laporan_kunjungan()
    {
        $var['title'] = 'Laporan | Filter Laporan Kunjungan';
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $var['tgl_awal'] = $tgl_awal;
        $var['tgl_akhir'] = $tgl_akhir;
        $var['laporan'] = $this->model->filter_laporan_kunjungan($tgl_awal, $tgl_akhir);
        $var['jumlah'] = $this->model->count_filter_laporan_kunjungan($tgl_awal, $tgl_akhir);
        $this->load->view('laporan/laporan_kunjungan', $var);
    }

    public function cetak_laporan_kunjungan()
    {
        $var['title'] = 'Cetak Laporan Kunjungan';
        $tgl_awal = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');
        $var['tgl_awal'] = $tgl_awal;
        $var['tgl_akhir'] = $tgl_akhir;
        if(empty($tgl_awal) && empty($tgl_akhir)) {
            $var['laporan'] = $this->model->laporan_kunjungan();
            $var['jumlah'] = $this->model->count_laporan_kunjungan();
        } else {
            $var['laporan'] = $this->model->filter_laporan_kunjungan($tgl_awal, $tgl_akhir);
            $var['jumlah'] = $this->model->count_filter_laporan_kunjungan($tgl_awal, $tgl_akhir);
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
            $var['jumlah'] = $this->model->count_laporan_kunjungan();
            $this->load->view('laporan/laporan_kunjungan', $var);
        }
    }

    public function laporan_pembayaran_admin()
    {
        if (empty($this->session->userdata('role') == 1)) {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('nama_lengkap');
            $this->session->unset_userdata('role');
            $this->session->set_flashdata('login_dulu', true);
            redirect('Auth');
        } else {
            $var['title'] = 'Laporan | Laporan Pembayaran';
            $var['laporan'] = $this->model->laporan_pembayaran();
            $var['jumlah'] = $this->model->count_laporan_pembayaran();
            $this->load->view('laporan/laporan_pembayaran', $var);
        }
    }

    public function filter_laporan_pembayaran()
    {
        $var['title'] = 'Laporan | Filter Laporan Kunjungan';
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $var['tgl_awal'] = $tgl_awal;
        $var['tgl_akhir'] = $tgl_akhir;
        $var['laporan'] = $this->model->filter_laporan_pembayaran($tgl_awal, $tgl_akhir);
        $var['jumlah'] = $this->model->count_filter_laporan_pembayaran($tgl_awal, $tgl_akhir);
        $this->load->view('laporan/laporan_pembayaran', $var);
    }

    public function cetak_laporan_pembayaran()
    {
        $var['title'] = 'Cetak Laporan Kunjungan';
        $tgl_awal = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');
        $var['tgl_awal'] = $tgl_awal;
        $var['tgl_akhir'] = $tgl_akhir;
        if(empty($tgl_awal) && empty($tgl_akhir)) {
            $var['laporan'] = $this->model->laporan_pembayaran();
            $var['jumlah'] = $this->model->count_laporan_pembayaran();
        } else {
            $var['laporan'] = $this->model->filter_laporan_pembayaran($tgl_awal, $tgl_akhir);
            $var['jumlah'] = $this->model->count_filter_laporan_pembayaran($tgl_awal, $tgl_akhir);
        }
        $this->load->view('cetak/cetak_laporan_pembayaran', $var);
    }

    public function laporan_pembayaran_owner()
    {
        if (empty($this->session->userdata('role') == 0)) {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('nama_lengkap');
            $this->session->unset_userdata('role');
            $this->session->set_flashdata('login_dulu', true);
            redirect('Auth');
        } else {
            $var['title'] = 'Laporan | Laporan Pembayaran';
            $var['laporan'] = $this->model->laporan_pembayaran();
            $var['jumlah'] = $this->model->count_laporan_pembayaran();
            $this->load->view('laporan/laporan_pembayaran', $var);
        }
    }

    public function laporan_pembayaran_loket()
    {
        if (empty($this->session->userdata('role') == 2)) {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('nama_lengkap');
            $this->session->unset_userdata('role');
            $this->session->set_flashdata('login_dulu', true);
            redirect('Auth');
        } else {
            $var['title'] = 'Laporan | Laporan Pembayaran';
            $var['laporan'] = $this->model->laporan_pembayaran();
            $var['jumlah'] = $this->model->count_laporan_pembayaran();
            $this->load->view('laporan/laporan_pembayaran', $var);
        }
    }

    public function laporan_penggunaan_obat_admin()
    {
        if (empty($this->session->userdata('role') == 1)) {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('nama_lengkap');
            $this->session->unset_userdata('role');
            $this->session->set_flashdata('login_dulu', true);
            redirect('Auth');
        } else {
            $var['title'] = 'Laporan | Laporan Penggunaan Obat';
            $var['laporan'] = $this->model->laporan_penggunaan_obat();
            $var['jumlah'] = $this->model->count_laporan_penggunaan_obat();
            $this->load->view('laporan/laporan_penggunaan_obat', $var);
        }
    }

    public function filter_laporan_penggunaan_obat()
    {
        $var['title'] = 'Laporan | Filter Laporan Penggunaan Obat';
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $jenis_pasien = $this->input->post('jenis_pasien');
        $var['tgl_awal'] = $tgl_awal;
        $var['tgl_akhir'] = $tgl_akhir;
        $var['jenis_pasien'] = $jenis_pasien;
        $var['laporan'] = $this->model->filter_laporan_penggunaan_obat($tgl_awal, $tgl_akhir, $jenis_pasien);
        $var['jumlah'] = $this->model->count_filter_laporan_penggunaan_obat($tgl_awal, $tgl_akhir, $jenis_pasien);
        // var_dump($var['laporan']);
        $this->load->view('laporan/laporan_penggunaan_obat', $var);
    }

    public function cetak_laporan_penggunaan_obat()
    {
        $var['title'] = 'Cetak Laporan Kunjungan';
        $tgl_awal = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');
        $jenis_pasien = $this->input->get('jenis_pasien');
        $var['tgl_awal'] = $tgl_awal;
        $var['tgl_akhir'] = $tgl_akhir;
        $var['jenis_pasien'] = $jenis_pasien;
        if(empty($tgl_awal) && empty($tgl_akhir) && empty($jenis_pasien)) {
            $var['laporan'] = $this->model->laporan_penggunaan_obat();
            $var['jumlah'] = $this->model->count_laporan_penggunaan_obat();
        } else {
            $var['laporan'] = $this->model->filter_laporan_penggunaan_obat($tgl_awal, $tgl_akhir, $jenis_pasien);
            $var['jumlah'] = $this->model->count_filter_laporan_penggunaan_obat($tgl_awal, $tgl_akhir, $jenis_pasien);
        }
        $this->load->view('cetak/cetak_laporan_penggunaan_obat', $var);
    }

    public function laporan_penggunaan_obat_owner()
    {
        if (empty($this->session->userdata('role') == 0)) {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('nama_lengkap');
            $this->session->unset_userdata('role');
            $this->session->set_flashdata('login_dulu', true);
            redirect('Auth');
        } else {
            $var['title'] = 'Laporan | Laporan Penggunaan Obat';
            $var['laporan'] = $this->model->laporan_penggunaan_obat();
            $var['jumlah'] = $this->model->count_laporan_penggunaan_obat();
            $this->load->view('laporan/laporan_penggunaan_obat', $var);
        }
    }

    public function laporan_penggunaan_obat_petugas()
    {
        if (empty($this->session->userdata('role') == 4)) {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('nama_lengkap');
            $this->session->unset_userdata('role');
            $this->session->set_flashdata('login_dulu', true);
            redirect('Auth');
        } else {
            $var['title'] = 'Laporan | Laporan Penggunaan Obat';
            $var['laporan'] = $this->model->laporan_penggunaan_obat();
            $var['jumlah'] = $this->model->count_laporan_penggunaan_obat();
            $this->load->view('laporan/laporan_penggunaan_obat', $var);
        }
    }

    public function laporan_10_penyakit_admin()
    {
        if (empty($this->session->userdata('role') == 1)) {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('nama_lengkap');
            $this->session->unset_userdata('role');
            $this->session->set_flashdata('login_dulu', true);
            redirect('Auth');
        } else {
            $var['title'] = 'Laporan | Laporan 10 Besar Penyakit';
            $var['data'] = $this->model->laporan_10_besar();
            // var_dump($var['data']);
            $this->load->view('laporan/laporan_10_penyakit', $var);
        }
    }

    public function laporan_10_penyakit_owner()
    {
        if (empty($this->session->userdata('role') == 0)) {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('nama_lengkap');
            $this->session->unset_userdata('role');
            $this->session->set_flashdata('login_dulu', true);
            redirect('Auth');
        } else {
            $var['title'] = 'Laporan | Laporan 10 Besar Penyakit';
            $var['data'] = $this->model->laporan_10_besar();
            // var_dump($var['data']);
            $this->load->view('laporan/laporan_10_penyakit', $var);
        }
    }

    public function laporan_10_penyakit_dokter()
    {
        if (empty($this->session->userdata('role') == 3)) {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('nama_lengkap');
            $this->session->unset_userdata('role');
            $this->session->set_flashdata('login_dulu', true);
            redirect('Auth');
        } else {
            $var['title'] = 'Laporan | Laporan 10 Besar Penyakit';
            $var['data'] = $this->model->laporan_10_besar();
            // var_dump($var['data']);
            $this->load->view('laporan/laporan_10_penyakit', $var);
        }
    }

    public function cetak_laporan_10_penyakit()
    {
        $var['title'] = 'Cetak 10 Besar Penyakit';
        $var['data'] = $this->model->laporan_10_besar();
        $this->load->view('cetak/cetak_10_penyakit', $var);
    }

    public function laporan_10_obat_admin()
    {
        if (empty($this->session->userdata('role') == 1)) {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('nama_lengkap');
            $this->session->unset_userdata('role');
            $this->session->set_flashdata('login_dulu', true);
            redirect('Auth');
        } else {
            $var['title'] = 'Laporan | Laporan 10 Besar Obat';
            $var['data'] = $this->model->laporan_10_besar();
            $this->load->view('laporan/laporan_10_obat', $var);
        }
    }

    public function laporan_10_obat_owner()
    {
        if (empty($this->session->userdata('role') == 0)) {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('nama_lengkap');
            $this->session->unset_userdata('role');
            $this->session->set_flashdata('login_dulu', true);
            redirect('Auth');
        } else {
            $var['title'] = 'Laporan | Laporan 10 Besar Obat';
            $var['data'] = $this->model->laporan_10_besar();
            $this->load->view('laporan/laporan_10_obat', $var);
        }
    }

    public function laporan_10_obat_petugas_obat()
    {
        if (empty($this->session->userdata('role') == 4)) {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('nama_lengkap');
            $this->session->unset_userdata('role');
            $this->session->set_flashdata('login_dulu', true);
            redirect('Auth');
        } else {
            $var['title'] = 'Laporan | Laporan 10 Besar Obat';
            $var['data'] = $this->model->laporan_10_besar();
            $this->load->view('laporan/laporan_10_obat', $var);
        }
    }
    
    public function cetak_laporan_10_obat()
    {
        $var['title'] = 'Cetak 10 Besar Obat';
        $var['data'] = $this->model->laporan_10_besar();
        $this->load->view('cetak/cetak_10_obat', $var);
    }
}
