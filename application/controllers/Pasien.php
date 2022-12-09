<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_all', 'model');
        $this->load->model('M_loket', 'loket');
        $this->load->library('form_validation');
        if (empty($this->session->userdata('role') == 0)) {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('no_rm');
            $this->session->unset_userdata('nama_lengkap');
            $this->session->set_flashdata('login_dulu', true);
            redirect('Auth/login_pasien');
        }
    }

    public function index()
    {
        $var['title'] = 'Pasien | Home';
        $no_rm = $this->session->userdata('no_rm');
        $var['jumlah_pemeriksaan'] = $this->model->jumlah_pemeriksaan_pasien();
        $var['view'] = $this->db->get_where('pasien', ['no_rm' => $no_rm])->row();
        $this->load->view('pasien/home', $var);
    }

    public function pemeriksaan()
    {
        $var['title'] = 'Pasien | Pemeriksaan';
        $var['perawatan'] = $this->model->riwayat_rekmed_pasien();
        $this->load->view('pasien/rekam_medis', $var);
    }

    public function detail_pemeriksaan($id)
    {
        $var['title'] = 'Pasien | Detail Pemeriksaan';
        $var['view'] = $this->model->detail_kunjungan($id);
        $var['view1'] = $this->model->detail_kunjungan2($id);
        $var['view2'] = $this->model->get_diagnosa2($id);
        $var['diagnosis'] = $this->model->get_tindakan_kunjungan($id);
        $var['trans'] = $this->model->get_riwayat_transaksi_pasien($id);
        $var['detail_trans'] = $this->model->detail_transaksi_obat($var['trans']->id);
        $payment = $this->db->get_where('payment', ['id_trans' => $var['trans']->id])->row();
        $var['payment'] = $this->loket->get_detail_pembayaran($payment->id);
        $var['obat'] = $this->db->get_where('transaksi_obat', ['id' => $var['trans']->id])->row();
        $var['detail_payment'] =$this->db->get_where('detail_payment', ['id_payment' => $payment->id])->result();
        $this->load->view('pasien/detail_rekam_medis', $var);
    }

    public function save_password_baru()
    {
    
        // $this->form_validation->set_rules('no_rm,', 'No Rekam Medis', 'required|trim', ['required' => 'no rekam medis tidak boleh kosong']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|matches[konfirm_password]', ['required' => 'password tidak boleh kosong']);
		$this->form_validation->set_rules('konfirm_password', 'Konfirmasi Password', 'required|trim|matches[password]', ['required' => 'konfirmasi password tidak boleh kosong', 'matches' => 'konfirmasi password salah']);
        if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$no_rm = $this->input->post('no_rm');
            $password = $this->input->post('password');
            $cek_akun = $this->db->get_where('pasien', ['no_rm' => $no_rm])->row();
            if($cek_akun) {
                $this->db->set('password', password_hash($password, PASSWORD_BCRYPT));
                $this->db->set('password_view', $password);
                $this->db->where('no_rm', $no_rm);
                $this->db->update('pasien');
                $this->session->set_flashdata('success_ubah_password', true);
                redirect('Pasien');
            } else {
                $this->session->set_flashdata('akun_tidak_ada', true);
                redirect('Pasien');
            }
		}
    }
}
