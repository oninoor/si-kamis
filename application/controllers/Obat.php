<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_loket', 'loket');
        $this->load->model('M_all', 'model');
        if (empty($this->session->userdata('role') == 4)) {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('no_rm');
            $this->session->unset_userdata('nama_lengkap');
            $this->session->set_flashdata('login_dulu', true);
            redirect('Auth');
        }
    }

    public function index()
    {
        $var['title'] = 'Petugas Obat | Dashboard';
        $this->load->view('petugas_obat/dashboard', $var);
    }

    public function obat()
    {
        $var['title'] = 'Petugas Obat | Data Obat';
        $var['obat'] = $this->db->order_by('id', 'desc')->get('obat')->result();
        $this->load->view('petugas_obat/obat', $var);
    }

    public function tambah_obat()
    {
        $var['title'] = 'Petugas Obat | Tambah Obat';
        $this->load->view('petugas_obat/add_obat', $var);
    }

    public function save_obat()
    {
        $this->form_validation->set_rules('nama_obat', 'nama', 'required|trim', ['required' => 'nama obat harus diisi']);
        $this->form_validation->set_rules('jenis_obat', 'jenis_obat', 'required|trim', ['required' => 'jenis obat harus diisi']);
        $this->form_validation->set_rules('harga', 'harga', 'required|trim', ['required' => 'harga harus diisi']);
        $this->form_validation->set_rules('stok', 'stok', 'required|trim', ['required' => 'stok harus diisi']);
        if ($this->form_validation->run() == false) {
            $this->tambah_obat();
        } else {
            $this->model->save_obat();
            $this->session->set_flashdata('success_save', true);
            redirect('Obat/obat');
        }
    }

    public function tambah_stok()
    {
        $id_obat = $this->input->post('id');
        $stok = $this->input->post('tambah_stok');

        if (!empty($stok)) {
            $this->db->query("UPDATE `obat` SET `stok`=stok+'$stok' WHERE id='$id_obat'");
            $this->session->set_flashdata('success_add_stok', true);
            redirect('Obat/obat');
        } else {
            $this->session->set_flashdata('stok_kosong', true);
            redirect('Obat/obat');
        }
    }

    public function update_obat()
    {
        $nama_obat = $this->input->post('nama_obat');
        $jenis_obat = $this->input->post('jenis_obat');
        $harga = $this->input->post('harga');
        if (empty($nama_obat)) {
            $this->session->set_flashdata('nama_obat_kosong', true);
            redirect('Obat/obat');
        } else if (empty($jenis_obat)) {
            $this->session->set_flashdata('jenis_obat_kosong', true);
            redirect('Obat/obat');
        } else if (empty($harga)) {
            $this->session->set_flashdata('harga_kosong', true);
            redirect('Obat/obat');
        } else {
            $this->model->update_obat();
            $this->session->set_flashdata('success_update', true);
            redirect('Obat/obat');
        }
    }

    public function hapus_obat($id)
    {
        $this->db->delete('obat', ['id' => $id]);
        $this->session->set_flashdata('success_delete', true);
        redirect('Obat/obat');
    }

    public function layanan_obat()
    {
        $var['title'] = 'Petugas Obat | Layanan Obat';
        $var['kunjungan'] = $this->model->get_layanan_obat();
        $this->load->view('petugas_obat/layanan_obat', $var);
    }

    public function transaksi_obat($id)
    {
        $var['title'] = 'Petugas Obat | Transaksi Obat';
        $var['view'] = $this->model->resume_medis($id);
        $this->load->view('petugas_obat/transaksi_obat', $var);
    }

    public function list_data_obat($params)
    {
        $list = $this->model->get_data_obat();
        // print_r($this->db->last_query());
        $data = array();
        $no = $_REQUEST['start'];
        foreach ($list as $obat) {
            // $kode_barang = preg_replace ('/[^\p{L}\p{N}]/u', '', $obat->kode_barang);
            // $nama_barang = preg_replace ('/[^\p{L}\p{N}]/u', '', $obat->nama_barang);

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $obat->nama_obat;
            $row[] = $obat->harga;
            $row[] = $obat->jenis_obat;
            $row[] = '<button type="button" class="btn btn-primary "onclick="pencarian_nama(\'' . $obat->id . '\',\'' . $obat->nama_obat . '\',\'' . $obat->harga . '\',\'' . $params . '\')">Pilih</button>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_REQUEST['draw'],
            "recordsTotal" => $this->model->jml_allid(),
            "recordsFiltered" => $this->model->jml_filteredid(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function get_obat()
    {
        // $this->model->ambil_obat();
        $obat = $this->db->get('obat');

        if ($obat->num_rows() > 0) {
            $json['status']     = 1;
            foreach ($obat->result() as $o) {
                $json['datanya'][] = $o;
            }
            $json['jumlah_obat'] = count($obat->result());
        } else {
            $json['status']     = 0;
        }

        echo json_encode($json);
    }

    public function get_data_pasien($params)
    {
        $data = $this->model->get_pasien_json($params);
        $json['data_pasien'] = @$data->jenis_pasien;
        echo json_encode($json);
    }

    public function save_transaksi()
    {
        $kd_kunjungan = $this->input->post('kd_kunjungan');
        $tgl_trans = $this->input->post('tgl_trans');
        $petugas_obat = $this->input->post('petugas_obat');
        $total_biaya = $this->input->post('total_trans');

        if (empty($total_biaya)) {
            $this->session->set_flashdata('obat_null', true);
            redirect('Obat/transaksi_obat/' . $kd_kunjungan);
        } else {
            $total_qty = 0;
            foreach ($_POST['qty'] as $value) {
                $total_qty += $value;
            }
            $jml_qty = $total_qty;
            $transaksi = array(
                'kode_kunjungan' => $kd_kunjungan,
                'tgl_trans' => $tgl_trans,
                'petugas_obat' => $petugas_obat,
                'total_qty' => $jml_qty,
                'total_biaya' => $total_biaya,
            );
            $this->db->insert('transaksi_obat', $transaksi);

            $last_idtrans = $this->model->last_idtrans();
            foreach ($_POST['id_obat'] as $key => $value) {
                $detail_transaksi = array(
                    'kode_trans' => $last_idtrans[0]->id,
                    'id_obat' => $this->input->post('id_obat')[$key],
                    'qty' => $this->input->post('qty')[$key],
                    'harga' => $this->input->post('harga')[$key],
                    'subtotal' => $this->input->post('subtotal')[$key]
                );
                $this->db->insert('detail_transaksi_obat', $detail_transaksi);
            }


            foreach ($_POST['id_obat'] as $key => $value) {
                $id_obat = $this->input->post('id_obat')[$key];
                $qty = $this->input->post('qty')[$key];
                $dataobat = $this->db->get_where('obat', ['id' => $id_obat])->row();
                if ($dataobat->stok == 0) {
                    $this->session->set_flashdata('stok_habis', true);
                    redirect('Obat/transaksi_obat/' . $kd_kunjungan);
                } else {
                    $this->db->query("UPDATE `obat` SET `stok`=stok-'$qty' WHERE id='$id_obat'");
                }
            }

            $this->db->set('status', 3);
            $this->db->where('kd_kunjungan', $kd_kunjungan);
            $this->db->update('kunjungan');

            $this->session->set_flashdata('transaksi_berhasil', true);
            redirect('Obat/riwayat_layanan_obat');
        }
    }

    public function riwayat_layanan_obat()
    {
        $var['title'] = 'Petugas Obat | Riwayat Layanan Obat';
        $var['riwayat'] = $this->model->riwayat_transaksi_obat();
        $this->load->view('petugas_obat/riwayat_layanan', $var);
    }

    public function non_transaksi()
    {
        $kd_kunjungan = $this->input->get('kd_kunjungan');
        $tgl_trans = $this->input->get('tgl_trans');
        $petugas_obat = $this->input->get('petugas_obat');
        $non_transaksi = array(
            'kode_kunjungan' => $kd_kunjungan,
            'tgl_trans' => $tgl_trans,
            'petugas_obat' => $petugas_obat,
            'total_qty' => 0,
            'total_biaya' => 0,
        );
        $this->db->insert('transaksi_obat', $non_transaksi);

        //update status kunjungan
        $this->db->set('status', 3);
        $this->db->where('kd_kunjungan', $kd_kunjungan);
        $this->db->update('kunjungan');
        $this->session->set_flashdata('berhasil_kepembayaran', true);
        redirect('Obat/riwayat_layanan_obat');
    }

    public function detail_riwayat_transaksi($id)
    {
        $var['title'] = 'Petugas Obat | Detail Riwayat Transaksi Obat';
        $var['view'] = $this->model->detail_riwayat_transaksi($id);
        $var['view2'] = $this->model->detail_riwayat_transaksi2($id);
        $var['detail'] = $this->model->detail_transaksi_obat($id);
        $this->load->view('petugas_obat/detail_riwayat_obat', $var);
    }
}
