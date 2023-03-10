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
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('nama_lengkap');
            $this->session->unset_userdata('role');
            $this->session->set_flashdata('login_dulu', true);
            redirect('Auth');
        }
    }

    public function index()
    {
        $var['title'] = 'Dokter | Home';
        $id = $this->session->userdata('id');
        $var['dokter'] = $this->db->get_where('users', ['id' => $id])->row();
        $var['total_kunjungan'] = $this->model->jml_seluruh_kunjungan();
        $var['total_perhari'] = $this->model->jml_kunjungan_perhari();
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
        $var['view1'] = $this->model->detail_kunjungan2($id);
        $var['view2'] = $this->model->get_diagnosa2($id);
        $var['diagnosis'] = $this->model->get_tindakan_kunjungan($id);
        $this->load->view('dokter/detail_kunjungan', $var);
    }

    public function pemeriksaan($id)
    {
        $var['title'] = 'Dokter | Pemeriksaan';
        $var['data'] = $this->model->detail_kunjungan($id);
        $var['diagnosis'] = $this->model->get_diagnosis($id);
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
            if (!empty($this->input->post('id_tindakan'))) {
                foreach ($_POST['id_tindakan'] as $key => $value) {
                    $tindakan = [
                        'kode_kunjungan' => $id,
                        'kode_tindakan' => $this->input->post('id_tindakan')[$key],
                    ];
                    $this->db->insert('det_kunjungan_tindakan', $tindakan);
                }
            }
            $this->session->set_flashdata('success_save', true);
            redirect('Dokter/kunjungan');
        }
    }

    public function resume_medis($id)
    {
        $var['title'] = 'Dokter | Resume Medis';
        $var['view'] =  $this->model->resume_medis($id);
        $var['view2'] =  $this->model->resume_medis_2($id);
        $var['diagnosis'] = $this->model->get_tindakan_kunjungan($id);
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

    public function list_data_tindakan($params)
    {
        $list = $this->model->get_data_tindakan();
        // print_r($this->db->last_query());
        $data = array();
        $no = $_REQUEST['start'];
        foreach ($list as $tindakan) {
            // $kode_barang = preg_replace ('/[^\p{L}\p{N}]/u', '', $tindakan->kode_barang);
            // $nama_barang = preg_replace ('/[^\p{L}\p{N}]/u', '', $tindakan->nama_barang);

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $tindakan->tindakan;
            $row[] = $tindakan->tindakan_icd_9cm;
            $row[] = $tindakan->kode_tindakan_icd_9cm;
            $row[] = '<button type="button" class="btn btn-primary "onclick="pencarian_tindakan(\'' . $tindakan->id . '\',\'' . $tindakan->tindakan . '\',\'' . $tindakan->tindakan_icd_9cm . '\',\'' . $tindakan->kode_tindakan_icd_9cm . '\',\'' . $params . '\')">Pilih</button>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_REQUEST['draw'],
            "recordsTotal" => $this->model->jml_allid_tindakan(),
            "recordsFiltered" => $this->model->jml_filteredid_tindakan(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function riwayat_rekam_medis()
    {
        $var['title'] = 'Dokter | Riwayat Rekam Medis';
        $this->load->view('dokter/riwayat_rekam_medis', $var);
    }

    public function action_rekam_medis()
    {
        $this->form_validation->set_rules('no_rm', 'no rm', 'required|trim', ['required' => 'no rekam medis harus diisi']);
        if ($this->form_validation->run() == false) {
            $this->riwayat_rekam_medis();
        } else {
        $var['title'] = 'Dokter | Data Riwayat Rekam Medis';
        $no_rm = $this->input->post('no_rm');
        $var['data_rekmed'] = $this->model->detail_rekmed($no_rm);
        $var['diagnosis'] = $this->model->get_diagnosis_1();
        $var['diagnosis2'] = $this->model->get_diagnosis_2();
        $var['profile'] = $this->db->get('pasien')->result();
        $this->load->view('dokter/data_rekam_medis', $var);
        }
    }
}
