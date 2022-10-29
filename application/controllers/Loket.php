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
        $this->form_validation->set_rules('no_bpjs', 'bpjs', 'exact_length[11]|numeric', ['exact_length' => 'No BPJS harus 11 angka', 'numeric' => 'No BPJS harus berupa angka']);
        $this->form_validation->set_rules('nama_lengkap', 'nama', 'required|trim', ['required' => 'nama lengkap harus diisi']);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'required|trim', ['required' => 'jenis_kelamin harus diisi']);
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
        $this->form_validation->set_rules('no_bpjs', 'bpjs', 'exact_length[11]|numeric', ['exact_length' => 'No BPJS harus 11 angka', 'numeric' => 'No BPJS harus berupa angka']);
        $this->form_validation->set_rules('nama_lengkap', 'nama', 'required|trim', ['required' => 'nama lengkap harus diisi']);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'required|trim', ['required' => 'jenis_kelamin harus diisi']);
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
}
