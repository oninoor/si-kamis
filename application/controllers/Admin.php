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
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('nama_lengkap');
            $this->session->unset_userdata('role');
            $this->session->set_flashdata('login_dulu', true);
            redirect('Auth');
        }
    }

    public function index()
    {
        $var['title'] = 'Admin | Dashboard';
        $var['jml_kunjungan'] = $this->model->jml_seluruh_kunjungan();
        $var['jml_pasien'] = $this->model->jml_seluruh_pasien();
        $var['jml_transaksi_obat'] = $this->model->jml_seluruh_transaksi_obat();
        $var['jml_diagnosis'] = $this->model->jml_diagnosis();
        $tahun = $this->input->get('tahun');
        if (empty($tahun)) {
            foreach ($this->model->grafik_pengunjung()->result_array() as $row) {
                $var['grafik_kunjungan'][] = (int) $row['Januari'];
                $var['grafik_kunjungan'][] = (int) $row['Februari'];
                $var['grafik_kunjungan'][] = (int) $row['Maret'];
                $var['grafik_kunjungan'][] = (int) $row['April'];
                $var['grafik_kunjungan'][] = (int) $row['Mei'];
                $var['grafik_kunjungan'][] = (int) $row['Juni'];
                $var['grafik_kunjungan'][] = (int) $row['Juli'];
                $var['grafik_kunjungan'][] = (int) $row['Agustus'];
                $var['grafik_kunjungan'][] = (int) $row['September'];
                $var['grafik_kunjungan'][] = (int) $row['Oktober'];
                $var['grafik_kunjungan'][] = (int) $row['November'];
                $var['grafik_kunjungan'][] = (int) $row['Desember'];
            }
        } else {
            foreach ($this->model->filter_grafik_pengunjung()->result_array() as $row) {
                $var['grafik_kunjungan'][] = (int) $row['Januari'];
                $var['grafik_kunjungan'][] = (int) $row['Februari'];
                $var['grafik_kunjungan'][] = (int) $row['Maret'];
                $var['grafik_kunjungan'][] = (int) $row['April'];
                $var['grafik_kunjungan'][] = (int) $row['Mei'];
                $var['grafik_kunjungan'][] = (int) $row['Juni'];
                $var['grafik_kunjungan'][] = (int) $row['Juli'];
                $var['grafik_kunjungan'][] = (int) $row['Agustus'];
                $var['grafik_kunjungan'][] = (int) $row['September'];
                $var['grafik_kunjungan'][] = (int) $row['Oktober'];
                $var['grafik_kunjungan'][] = (int) $row['November'];
                $var['grafik_kunjungan'][] = (int) $row['Desember'];
            }
        }
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

    public function data_pemeriksaan()
    {
        $var['title'] = 'Admin | Data Pemeriksaan';
        $var['pemeriksaan'] = $this->model->get_data_pemeriksaan();
        $this->load->view('admin/data_pemeriksaan', $var);
    }

    public function detail_pemeriksaan($id)
    {
        $var['title'] = 'Admin | Detail Pemeriksaan';
        $var['view'] = $this->model->detail_kunjungan($id);
        $var['view1'] = $this->model->detail_kunjungan2($id);
        $var['view2'] = $this->model->get_diagnosa2($id);
        $var['diagnosis'] = $this->model->get_tindakan_kunjungan($id);
        $this->load->view('admin/detail_pemeriksaan', $var);
    }

    public function data_transaksi_obat()
    {
        $var['title'] = 'Admin | Data Transaksi Obat';
        $var['riwayat'] = $this->model->riwayat_transaksi_obat();
        $this->load->view('admin/data_transaksi_obat', $var);
    }

    public function detail_transaksi_obat($id)
    {
        $var['title'] = 'Admin | Detail Transaksi Obat';
        $var['view'] = $this->model->detail_riwayat_transaksi($id);
        $var['view2'] = $this->model->detail_riwayat_transaksi2($id);
        $var['detail'] = $this->model->detail_transaksi_obat($id);
        $this->load->view('admin/detail_transaksi_obat', $var);
    }

    public function data_pembayaran()
    {
        $var['title'] = 'Admin | Data Pembayaran';
        $var['riwayat'] = $this->loket->riwayat_pembayaran();
        $this->load->view('admin/data_pembayaran', $var);
    }

    public function detail_pembayaran($id)
    {
        $var['title'] = 'Admin | Detail Pembayaran';
        $var['view'] = $this->loket->get_detail_pembayaran($id);
        $var['view2'] = $this->loket->get_detail_pembayaran2($id);
        $id_trans = $this->db->select('id_trans')->get_where('payment', ['id' => $id])->row();
        $var['obat'] = $this->db->get_where('transaksi_obat', ['id' => $id_trans->id_trans])->row();
        $var['detail'] = $this->db->get_where('detail_payment', ['id_payment' => $id])->result();
        $this->load->view('admin/detail_pembayaran', $var);
    }

    public function riwayat_kunjungan()
    {
        $var['title'] = 'Admin | Riwayat Kunjungan';
        $var['riwayat'] = $this->model->get_riwayat_kunjungan_admin();
        $this->load->view('admin/riwayat_kunjungan', $var);
    }

    public function detail_riwayat_kunjungan($id)
    {
        $var['title'] = 'Admin | Detail Riwayat Kunjungan';
        $var['view'] = $this->model->detail_kunjungan($id);
        $var['view1'] = $this->model->detail_kunjungan2($id);
        $var['view2'] = $this->model->get_diagnosa2($id);
        $var['diagnosis'] = $this->model->get_tindakan_kunjungan($id);
        $var['trans'] = $this->model->get_riwayat_transaksi_pasien($id);
        $var['detail_trans'] = $this->model->detail_transaksi_obat($var['trans']->id);
        $payment = $this->db->get_where('payment', ['id_trans' => $var['trans']->id])->row();
        $var['payment'] = $this->loket->get_detail_pembayaran($payment->id);
        $var['obat'] = $this->db->get_where('transaksi_obat', ['id' => $var['trans']->id])->row();
        $var['detail_payment'] = $this->db->get_where('detail_payment', ['id_payment' => $payment->id])->result();
        $this->load->view('admin/detail_riwayat_kunjungan', $var);
    }

    public function riwayat_rekam_medis()
    {
        $var['title'] = 'Admin | Riwayat Rekam Medis';
        $this->load->view('admin/riwayat_rekam_medis', $var);
    }

    public function action_rekam_medis()
    {
        $this->form_validation->set_rules('no_rm', 'no rm', 'required|trim', ['required' => 'no rekam medis harus diisi']);
        if ($this->form_validation->run() == false) {
            $this->riwayat_rekam_medis();
        } else {
        $var['title'] = 'Admin | Data Riwayat Rekam Medis';
        $no_rm = $this->input->post('no_rm');
        $var['data_rekmed'] = $this->model->detail_rekmed($no_rm);
        $var['diagnosis'] = $this->model->get_diagnosis_1();
        $var['diagnosis2'] = $this->model->get_diagnosis_2();
        $this->load->view('admin/data_rekam_medis', $var);
        }
    }
}
