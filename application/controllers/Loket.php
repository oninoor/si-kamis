<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loket extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_loket', 'model');
        $this->load->library('form_validation');
        if (empty($this->session->userdata('role') == 2)) {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('no_rm');
            $this->session->unset_userdata('nama_lengkap');
            $this->session->set_flashdata('login_dulu', true);
            redirect('Auth');
        }
    }

    public function index()
    {
        $var['title'] = 'Petugas Loket | Dashboard';
        $this->load->view('loket/dashboard', $var);
    }

    public function pasien()
    {
        $var['title'] = 'Petugas Loket | Pasien / User';
        $var['pasien'] = $this->model->get_pasien();
        $this->load->view('loket/pasien', $var);
    }

    public function tambah_pasien()
    {
        $var['title'] = 'Petugas Loket | Tambah Pasien /  User';
        $var['kota'] = $this->db->get('regencies')->result_array();
        $last_norm = $this->model->max_norm();
        $no_urut = substr($last_norm, 4, 5);
        $no_rm = $no_urut + 1;
        $no_rm_diurut = sprintf("%05s", $no_rm);
        $var['no_rm'] = $no_rm_diurut;
        $this->load->view('loket/add_pasien', $var);
    }

    public function save_pasien()
    {
        $this->form_validation->set_rules('nik', 'nik', 'required|trim|is_unique[pasien.nik]|exact_length[16]|numeric', ['required' => 'NIK harus diisi', 'is_unique' => 'NIK telah terdaftar', 'exact_length' => 'NIK harus 16 angka', 'numeric' => 'NIK harus berupa angka']);
        $this->form_validation->set_rules('jenis_pasien', 'jenis pasien', 'required|trim', ['required' => 'jenis pasien harus diisi']);
        if ($this->input->post('jenis_pasien') == 'bpjs') {
            $this->form_validation->set_rules('no_bpjs', 'bpjs', 'required|trim|exact_length[11]|numeric', ['required' => 'no bpjs harus diisi', 'exact_length' => 'No BPJS harus 11 angka', 'numeric' => 'No BPJS harus berupa angka']);
        }
        $this->form_validation->set_rules('nama_lengkap', 'nama', 'required|trim', ['required' => 'nama lengkap harus diisi']);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'required|trim', ['required' => 'jenis kelamin harus diisi']);
        $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'required|trim', ['required' => 'tempat lahir harus diisi']);
        $this->form_validation->set_rules('tgl', 'tanggal', 'required|trim', ['required' => 'tanggal harus diisi']);
        $this->form_validation->set_rules('bln', 'bulan', 'required|trim', ['required' => 'bulan harus diisi']);
        $this->form_validation->set_rules('thn', 'tahun', 'required|trim', ['required' => 'tahun harus diisi']);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', ['required' => 'alamat harus diisi']);
        $this->form_validation->set_rules('kota', 'kota', 'required|trim', ['required' => 'kota harus diisi']);
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'required|trim', ['required' => 'kecamatan harus diisi']);
        $this->form_validation->set_rules('desa', 'desa', 'required|trim', ['required' => 'desa harus diisi']);
        $this->form_validation->set_rules('no_telp', 'no telepon', 'required|trim|max_length[12]|numeric', ['required' => 'no telepon harus diisi', 'max_length' => 'maksimal no telepon 12 angka', 'numeric' => 'no telepon harus angka']);
        $this->form_validation->set_rules('pendidikan_terakhir', 'pendidikan terakhir', 'required|trim', ['required' => 'pendidikan terakhir harus diisi']);
        $this->form_validation->set_rules('nama_wali', 'nama wali', 'required|trim', ['required' => 'nama wali harus diisi']);
        $this->form_validation->set_rules('hubungan', 'hubungan', 'required|trim', ['required' => 'hubungan dengan pasien harus diisi']);
        if ($this->form_validation->run() == false) {
            $this->tambah_pasien();
        } else {
            $this->model->save_pasien();
            $this->session->set_flashdata('success_insert', true);
            redirect('Loket/pasien');
        }
    }

    public function wilayah()
    {
        switch ($_GET['jenis']) {
                //ambil data kecamatan
            case 'kecamatan':
                $id_city = $_POST['id_city'];
                if ($id_city == '') {
                    exit;
                } else {
                    $kecamatan = $this->db->query("SELECT  * FROM districts WHERE regency_id ='$id_city' ORDER BY name ASC")->result_array();
                    foreach ($kecamatan as $kec) {
                        echo '<option value="' . $kec['id'] . '">' . $kec['name'] . '</option>';
                    }
                    exit;
                }
                break;

                //ambil data desa
            case 'desa':
                $id_districts = $_POST['id_districts'];
                if ($id_districts == '') {
                    exit;
                } else {
                    $desa = $this->db->query("SELECT  * FROM villages WHERE district_id ='$id_districts' ORDER BY name ASC")->result_array();
                    foreach ($desa as $desa) {
                        echo '<option value="' . $desa['id'] . '">' . $desa['name'] . '</option>';
                    }
                    exit;
                }
                break;
        }
    }

    public function detail_pasien($id)
    {
        $var['title'] = 'Petugas Loket | Detail Pasien';
        $var['view'] = $this->model->detail_pasien($id);
        $this->load->view('loket/detail_pasien', $var);
    }

    public function edit_pasien($id)
    {
        $var['title'] = 'Petugas Loket | Perbarui Data Pasien';
        $var['edit'] = $this->db->get_where('pasien', ['id' => $id])->row();
        $var['kota'] = $this->db->get('regencies')->result_array();
        $var['kecamatan'] = $this->db->get('districts')->result_array();
        $var['desa'] = $this->db->get('villages')->result_array();
        $this->load->view('loket/edit_pasien', $var);
    }

    public function update_pasien()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nik', 'nik', 'required|trim|exact_length[16]|numeric', ['required' => 'NIK harus diisi', 'exact_length' => 'NIK harus 16 angka', 'numeric' => 'NIK harus berupa angka']);
        $this->form_validation->set_rules('jenis_pasien', 'jenis pasien', 'required|trim', ['required' => 'jenis pasien harus diisi']);
        if ($this->input->post('jenis_pasien') == 'bpjs') {
            $this->form_validation->set_rules('no_bpjs', 'bpjs', 'required|trim|exact_length[11]|numeric', ['required' => 'no bpjs harus diisi', 'exact_length' => 'No BPJS harus 11 angka', 'numeric' => 'No BPJS harus berupa angka']);
        }
        $this->form_validation->set_rules('nama_lengkap', 'nama', 'required|trim', ['required' => 'nama lengkap harus diisi']);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'required|trim', ['required' => 'jenis kelamin harus diisi']);
        $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'required|trim', ['required' => 'tempat lahir harus diisi']);
        $this->form_validation->set_rules('tgl', 'tanggal', 'required|trim', ['required' => 'tanggal harus diisi']);
        $this->form_validation->set_rules('bln', 'bulan', 'required|trim', ['required' => 'bulan harus diisi']);
        $this->form_validation->set_rules('thn', 'tahun', 'required|trim', ['required' => 'tahun harus diisi']);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', ['required' => 'alamat harus diisi']);
        $this->form_validation->set_rules('kota', 'kota', 'required|trim', ['required' => 'kota harus diisi']);
        $this->form_validation->set_rules('no_telp', 'no telepon', 'required|trim|max_length[12]|numeric', ['required' => 'no telepon harus diisi', 'max_length' => 'maksimal no telepon 12 angka', 'numeric' => 'no telepon harus angka']);
        $this->form_validation->set_rules('pendidikan_terakhir', 'pendidikan terakhir', 'required|trim', ['required' => 'pendidikan terakhir harus diisi']);
        $this->form_validation->set_rules('nama_wali', 'nama wali', 'required|trim', ['required' => 'nama wali harus diisi']);
        $this->form_validation->set_rules('hubungan', 'hubungan', 'required|trim', ['required' => 'hubungan dengan pasien harus diisi']);
        if ($this->form_validation->run() == false) {
            $this->edit_pasien($id);
        } else {
            $this->model->update_pasien();
            $this->session->set_flashdata('success_update', true);
            redirect('Loket/pasien');
        }
    }

    public function hapus_pasien($id)
    {
        $this->db->delete('pasien', ['id' => $id]);
        $this->session->set_flashdata('success_delete', true);
        redirect('Loket/pasien');
    }

    public function cetak_data_pasien($id)
    {
        $var['cetak'] = 'Petugas Loket | Pasien';
        $var['view'] = $this->db->get_where('pasien', ['id' => $id])->row();
        $this->load->view('cetak/data_pasien', $var);
    }

    public function pendaftaran()
    {
        $var['title'] = 'Petugas Loket | Pendaftaran';
        $var['pendaftaran'] = $this->model->get_pendaftaran();
        $this->load->view('loket/pendaftaran', $var);
    }

    public function tambah_pendaftaran()
    {
        $var['title'] = 'Petugas Loket | Tambah Pendaftaran';
        $last_kode = $this->model->max_kode_kunjungan();
        $cek_kode = substr($last_kode, 5, 6);
        $kode_plus = $cek_kode + 1;
        $kode_fix = sprintf("%06s", $kode_plus);
        $var['kode_kunjungan'] = $kode_fix;
        $var['pasien'] = $this->db->get('pasien')->result();
        $var['dokter'] = $this->db->get_where('users', ['role' => 3])->result();
        $this->load->view('loket/add_pendaftaran', $var);
    }

    public function max_no_antri()
    {
        $data = $this->model->max_no_antri();
        // var_dump($data);
        echo json_encode($data);
    }

    public function save_pendaftaran()
    {
        $this->form_validation->set_rules('no_rekmed', 'no rekam medis', 'required|trim', ['required' => 'pasien harus diisi']);
        $this->form_validation->set_rules('dokter', 'dokter', 'required|trim', ['required' => 'dokter harus diisi']);
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim', ['required' => 'tanggal harus diisi']);
        $this->form_validation->set_rules('tinggi_badan', 'tinggi badan', 'required|trim', ['required' => 'tinggi badan harus diisi']);
        $this->form_validation->set_rules('berat_badan', 'berat badan', 'required|trim', ['required' => 'berat badan harus diisi']);
        $this->form_validation->set_rules('suhu', 'suhu', 'required|trim', ['required' => 'suhu harus diisi']);
        $this->form_validation->set_rules('tekanan_darah_sistole', 'tekanan darah sistole', 'required|trim', ['required' => 'tekanan darah sistole harus diisi']);
        $this->form_validation->set_rules('tekanan_darah_diastole', 'tekanan darah diastole', 'required|trim', ['required' => 'tekanan darah diastole harus diisi']);
        $this->form_validation->set_rules('nadi', 'nadi', 'required|trim', ['required' => 'nadi harus diisi']);
        $this->form_validation->set_rules('gejala', 'gejala', 'required|trim', ['required' => 'gejala harus diisi']);
        if ($this->form_validation->run() == false) {
            $this->tambah_pendaftaran();
        } else {
            $this->model->save_pendaftaran();
            $this->session->set_flashdata('success_insert', true);
            redirect('Loket/pendaftaran');
        }
    }

    public function edit_pendaftaran($id)
    {
        $var['title'] = 'Loket | Edit Pendaftaran';
        $var['pasien'] = $this->db->get('pasien')->result();
        $var['dokter'] = $this->db->get_where('users', ['role' => 3])->result();
        $var['edit'] = $this->db->get_where('kunjungan', ['kd_kunjungan' => $id])->row();
        $this->load->view('loket/edit_pendaftaran', $var);
    }

    public function update_pendaftaran()
    {
        $id = $this->input->post('kd_kunjungan');
        $this->form_validation->set_rules('no_rekmed', 'no rekam medis', 'required|trim', ['required' => 'pasien harus diisi']);
        $this->form_validation->set_rules('dokter', 'dokter', 'required|trim', ['required' => 'dokter harus diisi']);
        $this->form_validation->set_rules('tinggi_badan', 'tinggi badan', 'required|trim', ['required' => 'tinggi badan harus diisi']);
        $this->form_validation->set_rules('berat_badan', 'berat badan', 'required|trim', ['required' => 'berat badan harus diisi']);
        $this->form_validation->set_rules('suhu', 'suhu', 'required|trim', ['required' => 'suhu harus diisi']);
        $this->form_validation->set_rules('tekanan_darah_sistole', 'tekanan darah sistole', 'required|trim', ['required' => 'tekanan darah sistole harus diisi']);
        $this->form_validation->set_rules('tekanan_darah_diastole', 'tekanan darah diastole', 'required|trim', ['required' => 'tekanan darah diastole harus diisi']);
        $this->form_validation->set_rules('nadi', 'nadi', 'required|trim', ['required' => 'nadi harus diisi']);
        $this->form_validation->set_rules('gejala', 'gejala', 'required|trim', ['required' => 'gejala harus diisi']);
        if ($this->form_validation->run() == false) {
            $this->edit_pendaftaran($id);
        } else {
            $this->model->update_pendaftaran();
            $this->session->set_flashdata('success_update', true);
            redirect('Loket/pendaftaran');
        }
    }

    public function hapus_pendaftaran($id)
    {
        $this->db->delete('kunjungan', ['kd_kunjungan' => $id]);
        $this->session->set_flashdata('success_delete', true);
        redirect('Loket/pendaftaran');
    }

    public function masuk_pemeriksaan($id)
    {
        $this->db->set('status', 1)->where('kd_kunjungan', $id)->update('kunjungan');
        $this->session->set_flashdata('success_pemeriksaan', true);
        redirect('Loket/pendaftaran');
    }

    public function kunjungan()
    {
        $var['title'] = 'Petugas Loket | Kunjungan';
        $var['kunjungan'] = $this->model->get_kunjungan();
        $this->load->view('loket/kunjungan', $var);
    }

    public function detail_kunjungan($id)
    {
        $var['title'] = 'Petugas Loket | Detail Kunjungan';
        $var['view'] = $this->model->detail_kunjungan($id);
        $this->load->view('loket/detail_kunjungan', $var);
    }

    public function pembayaran()
    {
        $var['title'] = 'Petugas Loket | Pembayaran';
        $var['pembayaran'] = $this->model->get_pembayaran();
        $this->load->view('loket/pembayaran', $var);
    }

    public function transaksi_pembayaran($id)
    {
        $var['title'] = 'Petugas Loket | Transaksi Pembayaran';
        $var['view'] = $this->model->get_transaksi($id);
        $this->load->view('loket/transaksi_pembayaran', $var);
    }

    public function save_pembayaran()
    {
        date_default_timezone_set("Asia/Jakarta");
        $id_trans = $this->input->post('id_trans');
        $tgl_payment = date('Y-m-d');
        $nominal_bayar = $this->input->post('nominal_bayar');
        $total_trans = $this->input->post('total_trans');
        $kembalian = $this->input->post('kembalian');

        $payment = [
            'id_trans' => $id_trans,
            'tgl_payment' => $tgl_payment,
            'nominal_bayar' => $nominal_bayar,
            'total_biaya' => $total_trans,
            'nominal_kembalian' => $kembalian
        ];
        
        $this->db->insert('payment', $payment);
        $last_idpayment = $this->model->last_idpayment();
        foreach($_POST['keterangan'] as $key => $value) {
            $detail_payment = [
                'id_payment' => $last_idpayment[0]->id,
                'keterangan' => $this->input->post('keterangan')[$key],
                'biaya' => $this->input->post('biaya')[$key],
            ];
            $this->db->insert('detail_payment', $detail_payment);
        }

        $kd_kunjungan = $this->input->post('kd_kunjungan');

        $this->db->set('status', 4);
        $this->db->where('kd_kunjungan', $kd_kunjungan);
        $this->db->update('kunjungan');

        $this->session->set_flashdata('pembayaran_tersimpan', true);
        redirect('Loket/riwayat_pembayaran');
        
    }

    public function riwayat_pembayaran()
    {
        $var['title'] = 'Petugas Loket | Riwayat Pembayaran';
        $var['riwayat'] = $this->model->riwayat_pembayaran();
        // var_dump($var['riwayat']);
        $this->load->view('loket/riwayat_pembayaran', $var);
    }

    public function detail_riwayat_pembayaran()
    {
        $var['title'] = 'Petugas Obat | Detail Riwayat Pembayaran';
        $var['view'] = $this->model->get_detail_pembayaran();
        $this->load->view('loket/detail_riwayat_pembayaran', $var);
    }

}
