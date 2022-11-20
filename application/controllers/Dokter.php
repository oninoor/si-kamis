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
        if (empty($this->session->userdata('role') == 3)) {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('no_rm');
            $this->session->unset_userdata('nama_lengkap');
            $this->session->set_flashdata('login_dulu', true);
            redirect('Auth');
        }
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

    public function pemeriksaan($id)
    {
        $var['title'] = 'Dokter | Pemeriksaan';
        $var['data'] = $this->model->detail_kunjungan($id);
        $var['diagnosis'] = $this->model->get_diagnosis();
        $this->load->view('dokter/pemeriksaan', $var);
    }

    public function ajax_diagnosis()
    {
        switch ($_GET['jenis']) {
                //ambil data diagnosis
            case 'diagnosis':
                $id_diagnosis = $_POST['id_diagnosis'];
                if ($id_diagnosis == '') {
                    exit;
                } else {
                    $diagnosis = $this->db->query("SELECT * FROM diagnosis WHERE id ='$id_diagnosis'")->row_array();
                    echo $diagnosis['diagnosis_icd_10'];
                    exit;
                }
                break;

                //ambil data desa
            case 'diagnosis2':
                $id_diagnosis = $_POST['id_diagnosis'];
                if ($id_diagnosis == '') {
                    exit;
                } else {
                    $diagnosis = $this->db->query("SELECT * FROM diagnosis WHERE id ='$id_diagnosis'")->row_array();
                    echo $diagnosis['kode_diagnosis_icd_10'];
                    exit;
                }
                break;
        }
    }

    public function save_pemeriksaan()
    {
        $id = $this->input->post('kd_kunjungan');
        $this->form_validation->set_rules('anamnesis', 'anamnesis', 'required|trim', ['required' => 'anamnesis harus diisi']);
        $this->form_validation->set_rules('kd_diagnosa', 'Kode Diagnosa', 'required|trim', ['required' => 'Kode diagnosa harus diisi']);
        $this->form_validation->set_rules('diagnosis1_icd_10', 'Diagnosa 1 ICD 10', 'required|trim', ['required' => 'Diagnosis 1 ICD 10 harus diisi']);
        $this->form_validation->set_rules('kode_diagnosis1_icd_10', 'Kode Diagnosa 1 ICD 10', 'required|trim', ['required' => 'Kode Diagnosis 1 ICD 10 harus diisi']);
        // $this->form_validation->set_rules('kd_diagnosa2', 'Kode Diagnosa 2', 'required|trim', ['required' => 'Kode diagnosa 2 harus diisi']);
        // $this->form_validation->set_rules('diagnosis2_icd_10', 'Diagnosa 2 ICD 10', 'required|trim', ['required' => 'Diagnosis 2 ICD 10 harus diisi']);
        // $this->form_validation->set_rules('kode_diagnosis2_icd_10', 'Kode Diagnosa 2 ICD 10', 'required|trim', ['required' => 'Kode Diagnosis 2 ICD 10 harus diisi']);
        $this->form_validation->set_rules('tindak_lanjut', 'Tindak Lanjut', 'required|trim', ['required' => 'Tindak Lanjut harus diisi']);
        $this->form_validation->set_rules('terapi_obat', 'Terapi Obat', 'required|trim', ['required' => 'Terapi Obat harus diisi']);
        if ($this->form_validation->run() == false) {
            $this->pemeriksaan($id);
        } else {
            $this->model->save_pemeriksaan();
            $this->session->set_flashdata('success_save', true);
            redirect('Dokter/kunjungan');
        }
    }

    public function resume_medis($id)
    {
        $var['title'] = 'Dokter | Resume Medis';
        $var['view'] =  $this->model->resume_medis($id);
        $var['view2'] =  $this->model->resume_medis_2($id);
        $this->load->view('dokter/resume_medis', $var);
    }

    public function diagnosis()
    {
        $var['title'] = 'Dokter | Data Diagnosis';
        $var['diagnosis'] = $this->model->get_diagnosis();
        $this->load->view('dokter/diagnosis', $var);
    }

    public function tindakan()
    {
        $var['title'] = 'Dokter | Data Tindakan';
        $var['tindakan'] = $this->model->get_tindakan();
        $this->load->view('dokter/tindakan', $var);
    }
}
