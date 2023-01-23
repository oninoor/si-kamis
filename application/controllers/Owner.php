<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Owner extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_owner', 'owner');
        $this->load->model('M_all', 'model');
        $this->load->model('M_loket', 'loket');
        $this->load->library('form_validation');
        if (empty($this->session->userdata('role') == 0)) {
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
        $var['title'] = 'Owner | Dashboard';
        $var['jml_pasien'] = $this->model->jml_seluruh_pasien();
        $var['jml_user'] = $this->owner->jml_seluruh_user();
        $var['jml_kunjungan'] = $this->model->jml_seluruh_kunjungan();
        $var['jml_transaksi_obat'] = $this->model->jml_seluruh_transaksi_obat();
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

    public function data_pasien()
    {
        $var['title'] = 'Owner | Data Pasien';
        $var['pasien'] = $this->loket->get_pasien();
        $this->load->view('owner/data_pasien', $var);
    }

    public function detail_pasien($id)
    {
        $var['title'] = 'Owner | Detail Pasien';
        $var['view'] = $this->loket->detail_pasien($id);
        $this->load->view('owner/detail_pasien', $var);
    }

    public function data_kunjungan()
    {
        $var['title'] = 'Owner | Data Kunjungan';
        $var['kunjungan'] = $this->model->get_kunjungan_admin();
        $this->load->view('owner/data_kunjungan', $var);
    }

    public function detail_kunjungan($id)
    {
        $var['title'] = 'Owner | Detail Kunjungan';
        $var['view'] = $this->model->detail_kunjungan($id);
        $this->load->view('owner/detail_kunjungan', $var);
    }

    public function data_diagnosis()
    {
        $var['title'] = 'Owner | Data Diagnosis';
        $var['diagnosis'] = $this->model->get_diagnosis();
        $this->load->view('owner/data_diagnosis', $var);
    }

    public function data_tindakan()
    {
        $var['title'] = 'Owner | Tindakan';
        $var['tindakan'] = $this->model->get_tindakan();
        $this->load->view('owner/data_tindakan', $var);
    }

    public function data_pemeriksaan()
    {
        $var['title'] = 'Owner | Data Tindakan';
        $var['pemeriksaan'] = $this->model->get_data_pemeriksaan();
        $this->load->view('owner/data_pemeriksaan', $var);
    }

    public function detail_pemeriksaan($id)
    {
        $var['title'] = 'Owner | Detail Pemeriksaan';
        $var['view'] = $this->model->detail_kunjungan($id);
        $var['view1'] = $this->model->detail_kunjungan2($id);
        $var['view2'] = $this->model->get_diagnosa2($id);
        $var['diagnosis'] = $this->model->get_tindakan_kunjungan($id);
        $this->load->view('owner/detail_pemeriksaan', $var);
    }

    public function data_transaksi_obat()
    {
        $var['title'] = 'Owner | Data Transaksi Obat';
        $var['riwayat'] = $this->model->riwayat_transaksi_obat();
        $this->load->view('owner/data_transaksi_obat', $var);
    }

    public function data_pembayaran()
    {
        $var['title'] = 'Owner | Data Pembayaran';
        $var['riwayat'] = $this->loket->riwayat_pembayaran();
        $this->load->view('owner/data_pembayaran', $var);
    }

    public function detail_pembayaran($id)
    {
        $var['title'] = 'Owner | Detail Pembayaran';
        $var['view'] = $this->loket->get_detail_pembayaran($id);
        $var['view2'] = $this->loket->get_detail_pembayaran2($id);
        $id_trans = $this->db->select('id_trans')->get_where('payment', ['id' => $id])->row();
        $var['obat'] = $this->db->get_where('transaksi_obat', ['id' => $id_trans->id_trans])->row();
        $var['detail'] = $this->db->get_where('detail_payment', ['id_payment' => $id])->result();
        $this->load->view('owner/detail_pembayaran', $var);
    }

    public function riwayat_kunjungan()
    {
        $var['title'] = 'Owner | Riwayat Kunjungan';
        $var['riwayat'] = $this->model->get_riwayat_kunjungan_admin();
        $this->load->view('owner/riwayat_kunjungan', $var);
    }

    public function detail_riwayat_kunjungan($id)
    {
        $var['title'] = 'Owner | Detail Riwayat Kunjungan';
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
        $this->load->view('owner/detail_riwayat_kunjungan', $var);
    }

    public function riwayat_rekam_medis()
    {
        $var['title'] = 'Owner | Riwayat Rekam Medis';
        $this->load->view('owner/riwayat_rekam_medis', $var);
    }

    public function action_rekam_medis()
    {
        $this->form_validation->set_rules('no_rm', 'no rm', 'required|trim', ['required' => 'no rekam medis harus diisi']);
        if ($this->form_validation->run() == false) {
            $this->riwayat_rekam_medis();
        } else {
        $var['title'] = 'Owner | Data Riwayat Rekam Medis';
        $no_rm = $this->input->post('no_rm');
        $var['data_rekmed'] = $this->model->detail_rekmed($no_rm);
        $var['diagnosis'] = $this->model->get_diagnosis_1();
        $var['diagnosis2'] = $this->model->get_diagnosis_2();
        $this->load->view('owner/data_rekam_medis', $var);
        }
    }

    public function data_obat()
    {
        $var['title'] = 'Owner | Data Obat';
        $var['obat'] =  $this->db->order_by('id', 'desc')->get('obat')->result();
        $this->load->view('owner/data_obat', $var);
    }
}
