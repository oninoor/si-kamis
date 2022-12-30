<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_all extends CI_Model
{
    private $pasien = 'pasien';
    private $kunjungan = 'kunjungan';
    private $diagnosis = 'diagnosis';
    private $obat = 'obat';
    // private $tindakan = 'tindakan';

    public function get_kunjungan()
    {
        $dokter = $this->session->userdata('id');
        $this->db->select('kunjungan.*, 
                            pasien.no_rm, 
                            pasien.nama_lengkap, 
                            users.nama_lengkap AS nama_dokter
                            ');
        $this->db->from('kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->join('users', 'kunjungan.dokter = users.id');
        $this->db->where('kunjungan.status >=', 1);
        $this->db->where('kunjungan.status <', 4);
        $this->db->where('kunjungan.dokter', $dokter);
        $this->db->order_by('kunjungan.kd_kunjungan', 'asc');
        return $this->db->get()->result();
    }

    public function get_kunjungan_admin()
    {
        $this->db->select('kunjungan.*, 
        pasien.no_rm, 
        pasien.nama_lengkap, 
        users.nama_lengkap AS nama_dokter
        ');
        $this->db->from('kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->join('users', 'kunjungan.dokter = users.id');
        $this->db->order_by('kunjungan.kd_kunjungan', 'desc');
        return $this->db->get()->result();
    }

    public function detail_kunjungan($id)
    {
        $this->db->select('kunjungan.*,
                            pasien.nama_lengkap,
                            pasien.alamat,
                            pasien.no_telp,
                            pasien.nik,
                            pasien.tgl_lahir,
                            pasien.jenis_kelamin,
                            users.nama_lengkap as nama_dokter,
                            ');
        $this->db->from('kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->join('users', 'kunjungan.dokter = users.id');
        $this->db->where('kd_kunjungan', $id);
        return $this->db->get()->row();
    }

    public function detail_kunjungan2($id)
    {
        $this->db->select('kunjungan.*,
        diagnosis.nama_diagnosis,
        diagnosis.diagnosis_icd_10,
        diagnosis.kode_diagnosis_icd_10
        ');
        $this->db->from('kunjungan');
        $this->db->join('diagnosis', 'kunjungan.kd_diagnosa = diagnosis.id');
        $this->db->where('kd_kunjungan', $id);
        return $this->db->get()->row();
    }

    public function get_pasien_json($params)
    {
        return $this->db->get_where('pasien', ['no_rm' => $params])->row();
    }

    public function get_diagnosa2($id)
    {
        $this->db->select('kunjungan.*,
                            diagnosis.nama_diagnosis,
                            diagnosis.diagnosis_icd_10,
                            diagnosis.kode_diagnosis_icd_10
                            ');
        $this->db->from('kunjungan');
        $this->db->join('diagnosis', 'kunjungan.kd_diagnosa2 = diagnosis.id');
        $this->db->where('kd_kunjungan', $id);
        return $this->db->get()->row();
    }

    public function get_tindakan_kunjungan($id)
    {
        $this->db->select('dkt.*,
                            tindakan.tindakan,
                            tindakan.tindakan_icd_9cm,
                            tindakan.kode_tindakan_icd_9cm
                            ');
        $this->db->from('det_kunjungan_tindakan dkt');
        $this->db->join('tindakan', 'dkt.kode_tindakan = tindakan.id');
        $this->db->where('dkt.kode_kunjungan', $id);
        return $this->db->get()->result();
    }

    public function get_diagnosis()
    {
        return $this->db->order_by('id', 'desc')->get($this->diagnosis)->result();
    }

    public function save_diagnosis()
    {
        $post = $this->input->post();
        $this->nama_diagnosis = $post['nama_diagnosis'];
        $this->diagnosis_icd_10 = $post['diagnosis_icd_10'];
        $this->kode_diagnosis_icd_10 = $post['kode_diagnosis_icd_10'];
        $this->db->insert($this->diagnosis, $this);
    }

    public function update_diagnosis()
    {
        $post = $this->input->post();
        $this->nama_diagnosis = $post['nama_diagnosis'];
        $this->diagnosis_icd_10 = $post['diagnosis_icd_10'];
        $this->kode_diagnosis_icd_10 = $post['kode_diagnosis_icd_10'];
        $this->db->update($this->diagnosis, $this, ['id' => $post['id']]);
    }

    public function save_pemeriksaan()
    {
        $post = $this->input->post();
        $this->anamnesis = $post['anamnesis'];
        $this->kd_diagnosa = $post['kd_diagnosa'];
        if (empty($post['kd_diagnosa2'])) {
            $this->kd_diagnosa2 = 4;
        } else {
            $this->kd_diagnosa2 = $post['kd_diagnosa2'];
        }
        $this->tindak_lanjut = $post['tindak_lanjut'];
        $this->terapi_obat = $post['terapi_obat'];
        date_default_timezone_set('Asia/Jakarta');
        $this->waktu = date('H:i:s');
        $this->status = 2;
        $this->db->update($this->kunjungan, $this, ['kd_kunjungan' => $post['kd_kunjungan']]);
    }

    public function resume_medis($id)
    {
        $this->db->select('kunjungan.*,
                            pasien.nama_lengkap,
                            pasien.alamat,
                            pasien.no_telp,
                            pasien.nik,
                            pasien.tgl_lahir,
                            pasien.jenis_kelamin,
                            pasien.jenis_pasien,
                            pasien.alamat,
                            villages.name AS desa,
                            districts.name AS kecamatan,
                            regencies.name AS kota,
                            users.nama_lengkap as nama_dokter,
                            diagnosis.diagnosis_icd_10,
                            diagnosis.kode_diagnosis_icd_10,
                            ');
        $this->db->from('kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->join('users', 'kunjungan.dokter = users.id');
        $this->db->join('villages', 'pasien.desa = villages.id');
        $this->db->join('districts', 'pasien.kecamatan = districts.id');
        $this->db->join('regencies', 'pasien.kota = regencies.id');
        $this->db->join('diagnosis', 'kunjungan.kd_diagnosa = diagnosis.id');
        $this->db->where('kd_kunjungan', $id);
        return $this->db->get()->row();
    }

    public function resume_medis_2($id)
    {
        $this->db->select('kunjungan.*,
                            pasien.nama_lengkap,
                            pasien.alamat,
                            pasien.no_telp,
                            pasien.nik,
                            pasien.tgl_lahir,
                            pasien.jenis_kelamin,
                            pasien.alamat,
                            villages.name AS desa,
                            districts.name AS kecamatan,
                            regencies.name AS kota,
                            users.nama_lengkap as nama_dokter,
                            diagnosis.diagnosis_icd_10,
                            diagnosis.kode_diagnosis_icd_10,
                            ');
        $this->db->from('kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->join('users', 'kunjungan.dokter = users.id');
        $this->db->join('villages', 'pasien.desa = villages.id');
        $this->db->join('districts', 'pasien.kecamatan = districts.id');
        $this->db->join('regencies', 'pasien.kota = regencies.id');
        $this->db->join('diagnosis', 'kunjungan.kd_diagnosa2 = diagnosis.id');
        $this->db->where('kd_kunjungan', $id);
        return $this->db->get()->row();
    }

    public function save_obat()
    {
        $post = $this->input->post();
        $this->nama_obat = $post['nama_obat'];
        $this->jenis_obat = $post['jenis_obat'];
        $this->harga = str_replace(",", "", $post['harga']);
        $this->stok = $post['stok'];
        $this->db->insert($this->obat, $this);
    }

    public function update_obat()
    {
        $post = $this->input->post();
        $this->nama_obat = $post['nama_obat'];
        $this->jenis_obat = $post['jenis_obat'];
        $this->harga = str_replace(",", "", $post['harga']);
        $this->db->update($this->obat, $this, ['id' => $post['id']]);
    }

    public function get_layanan_obat()
    {
        $this->db->select('kunjungan.*, 
                                pasien.no_rm, 
                                pasien.nama_lengkap, 
                                pasien.tgl_lahir,
                                users.nama_lengkap AS nama_dokter,
                                diagnosis.nama_diagnosis,
                                diagnosis.diagnosis_icd_10
                                ');
        $this->db->from('kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->join('users', 'kunjungan.dokter = users.id');
        $this->db->join('diagnosis', 'kunjungan.kd_diagnosa = diagnosis.id');
        $this->db->where('kunjungan.status', 2);
        $this->db->order_by('kunjungan.kd_kunjungan', 'asc');
        return $this->db->get()->result();
    }

    // var $barang = 'barang';
    var $kolom_obat = array('a.id', 'a.nama_obat', 'a.harga', 'a.jenis_obat', 'a.stok', null); //set column field database for datatable orderable
    var $kolom_search = array('a.id', 'a.nama_obat', 'a.harga', 'a.jenis_obat', 'a.stok'); //set column field database for datatable searchable just title , author , category are searchable
    var $obatid = array('a.id' => 'asc'); // default order

    public function get_data_obat()
    {
        $this->get_query_obat();
        //	$this->db->where('orde_sungai',$id);

        if ($_REQUEST['length'] != -1) {
            $this->db->limit($_REQUEST['length'], $_REQUEST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    private function get_query_obat()
    {
        $this->db->select('*');
        $this->db->from('obat a');
        $this->db->order_by('a.id', 'desc');
        $this->db->where('a.stok >', 0);
        // $this->db->join('jenis c', 'a.id_jenis=c.id_jenis', 'left outer');
        // $this->db->join('merek b', 'a.id_merek=b.id_merek', 'left outer');
        $i = 0;


        foreach ($this->kolom_search as $item) {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    // $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->kolom_search) - 1 == $i); //last loop
                // $this->db->group_end(); //close bracket


            }

            $i++;
        }

        if (isset($_REQUEST['order'])) {
            $this->db->order_by($this->kolom_obat[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
        } else if (isset($this->obatid)) {
            $order = $this->obatid;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function jml_filteredid()
    {
        $this->get_query_obat();
        //$this->db->where('orde_sungai',$id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function jml_allid()
    {
        $this->db->from("obat");
        return $this->db->count_all_results();
    }

    public function ambil_obat()
    {
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

    public function last_idtrans()
    {
        $sql = $this->db->select('id');
        $sql = $this->db->from('transaksi_obat');
        $sql = $this->db->order_by('id', 'desc');
        $sql = $this->db->limit(1);
        $sql = $this->db->get();

        return $sql->result();
    }

    public function get_riwayat_layanan_obat()
    {
        $riwyat = $this->db->select("transaksi_obat.*,
                            kunjungan.no_rekmed,
                            pasien.nama_lengkap AS nama_pasien,
                            users.nama_lengkap AS nama_petugas,
        ")
            ->from('transaksi_obat')
            ->join('kunjungan', 'transaksi_obat.kode_kunjungan = kunjungan.kd_kunjungan')
            ->join('users', 'transaksi_obat.petugas_obat = users.id')
            ->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm')
            ->get()->result();

        return $riwyat;
    }


    public function get_tindakan()
    {
        return $this->db->order_by('id', 'desc')->get('tindakan')->result();
    }

    public function save_tindakan()
    {
        $post = $this->input->post();
        $this->tindakan = $post['tindakan'];
        $this->tindakan_icd_9cm = $post['tindakan_icd_9cm'];
        $this->kode_tindakan_icd_9cm = $post['kode_tindakan_icd_9cm'];
        $this->db->insert('tindakan', $this);
    }

    public function update_tindakan()
    {
        $post = $this->input->post();
        $this->tindakan = $post['tindakan'];
        $this->tindakan_icd_9cm = $post['tindakan_icd_9cm'];
        $this->kode_tindakan_icd_9cm = $post['kode_tindakan_icd_9cm'];
        $this->db->update('tindakan', $this, ['id' => $post['id']]);
    }


    // var $barang = 'barang';
    var $kolom_tindakan = array('a.id', 'a.tindakan', 'a.tindakan_icd_ocm', 'a.kode_tindakan_icd_9cm', null); //set column field database for datatable orderable
    var $kolom_search_tindakan = array('a.id', 'a.tindakan', 'a.tindakan_icd_ocm', 'a.kode_tindakan_icd_9cm'); //set column field database for datatable searchable just title , author , category are searchable
    var $tindakanid = array('a.id' => 'asc'); // default order

    public function get_data_tindakan()
    {
        $this->get_query_tindakan();
        //	$this->db->where('orde_sungai',$id);

        if ($_REQUEST['length'] != -1) {
            $this->db->limit($_REQUEST['length'], $_REQUEST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    private function get_query_tindakan()
    {
        $this->db->select('*');
        $this->db->from('tindakan a');
        $this->db->order_by('a.id', 'desc');
        // $this->db->join('jenis c', 'a.id_jenis=c.id_jenis', 'left outer');
        // $this->db->join('merek b', 'a.id_merek=b.id_merek', 'left outer');
        $i = 0;


        foreach ($this->kolom_search_tindakan as $item) {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    // $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->kolom_search_tindakan) - 1 == $i); //last loop
                // $this->db->group_end(); //close bracket


            }

            $i++;
        }

        if (isset($_REQUEST['order'])) {
            $this->db->order_by($this->kolom_search_tindakan[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
        } else if (isset($this->tindakanid)) {
            $order = $this->tindakanid;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function jml_filteredid_tindakan()
    {
        $this->get_query_tindakan();
        //$this->db->where('orde_sungai',$id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function jml_allid_tindakan()
    {
        $this->db->from("tindakan");
        return $this->db->count_all_results();
    }

    public function riwayat_transaksi_obat()
    {
        $this->db->select('trans.*,
                            kunjungan.kd_kunjungan,
                            kunjungan.no_rekmed,
                            kunjungan.dokter,
                            pasien.nama_lengkap as nama_pasien,
                            users.nama_lengkap as nama_petugas,
                            ');
        $this->db->from('transaksi_obat trans');
        $this->db->join('kunjungan', 'trans.kode_kunjungan = kunjungan.kd_kunjungan');
        $this->db->join('users', 'trans.petugas_obat = users.id');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->order_by('trans.id', 'desc');
        return $this->db->get()->result();
    }

    public function detail_riwayat_transaksi($id)
    {
        $this->db->select('trans.*,
                            kunjungan.kd_kunjungan,
                            kunjungan.no_rekmed,
                            kunjungan.dokter,
                            kunjungan.status,
                            pasien.nama_lengkap as nama_pasien,
                            pasien.jenis_pasien,
                            users.nama_lengkap as nama_petugas,
                            ');
        $this->db->from('transaksi_obat trans');
        $this->db->join('kunjungan', 'trans.kode_kunjungan = kunjungan.kd_kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->join('users', 'trans.petugas_obat = users.id');
        $this->db->where('trans.id', $id);
        return $this->db->get()->row();
    }

    public function detail_riwayat_transaksi2($id)
    {
        $this->db->select('trans.*,
                            kunjungan.kd_kunjungan,
                            kunjungan.no_rekmed,
                            kunjungan.dokter,
                            kunjungan.status,
                            users.nama_lengkap as nama_dokter
                            ');
        $this->db->from('transaksi_obat trans');
        $this->db->join('kunjungan', 'trans.kode_kunjungan = kunjungan.kd_kunjungan');
        $this->db->join('users', 'kunjungan.dokter = users.id');
        $this->db->where('trans.id', $id);
        return $this->db->get()->row();
    }

    public function detail_transaksi_obat($id)
    {
        $this->db->select('detail.*, obat.nama_obat');
        $this->db->from('detail_transaksi_obat detail');
        $this->db->join('obat', 'detail.id_obat = obat.id');
        $this->db->where('detail.kode_trans', $id);
        return $this->db->get()->result();
    }

    public function riwayat_rekmed_pasien()
    {
        $no_rm = $this->session->userdata('no_rm');
        $this->db->select('kunjungan.*,
                            pasien.nama_lengkap as nama_pasien,
                            users.nama_lengkap as nama_dokter,
                            diagnosis.nama_diagnosis');
        $this->db->from('kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->join('users', 'kunjungan.dokter = users.id');
        $this->db->join('diagnosis', 'kunjungan.kd_diagnosa = diagnosis.id');
        $this->db->where('kunjungan.no_rekmed', $no_rm);
        $this->db->where('kunjungan.status', 4);
        return $this->db->get()->result();
    }

    public function get_riwayat_transaksi_pasien($id)
    {
        $this->db->select('trans.*,
        users.nama_lengkap as nama_petugas,
        ');
        $this->db->from('transaksi_obat trans');
        $this->db->join('users', 'trans.petugas_obat = users.id');
        $this->db->where('trans.kode_kunjungan', $id);
        return $this->db->get()->row();
    }

    public function detail_transaksi_obat_pasien($id)
    {
        $this->db->select('detail.*, obat.nama_obat');
        $this->db->from('detail_transaksi_obat detail');
        $this->db->join('obat', 'detail.id_obat = obat.id');
        $this->db->where('detail.kode_trans', $id);
        return $this->db->get()->result();
    }

    public function jumlah_pemeriksaan_pasien()
    {
        $no_rm = $this->session->userdata('no_rm');
        $this->db->where('no_rekmed', $no_rm);
        return $this->db->count_all_results('kunjungan');
    }

    public function get_data_pemeriksaan()
    {
        $this->db->select('kunjungan.*, 
        pasien.no_rm, 
        pasien.nama_lengkap, 
        users.nama_lengkap AS nama_dokter
        ');
        $this->db->from('kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->join('users', 'kunjungan.dokter = users.id');
        $this->db->where('kunjungan.status >=', 1);
        $this->db->order_by('kunjungan.kd_kunjungan', 'asc');
        return $this->db->get()->result();
    }

    public function get_riwayat_kunjungan_admin()
    {
        $this->db->select('kunjungan.*, 
        pasien.no_rm, 
        pasien.nama_lengkap, 
        users.nama_lengkap AS nama_dokter
        ');
        $this->db->from('kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->join('users', 'kunjungan.dokter = users.id');
        $this->db->where('kunjungan.status', 4);
        $this->db->order_by('kunjungan.kd_kunjungan', 'desc');
        return $this->db->get()->result();
    }

    public function laporan_kunjungan()
    {

        $this->db->select('kunjungan.*,
                            pasien.nama_lengkap,
                            pasien.jenis_kelamin,
                            pasien.alamat,
                            pasien.jenis_pasien');
        $this->db->from('kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->where('kunjungan.status', 4);
        return $this->db->get()->result();
    }

    public function count_laporan_kunjungan()
    {
        $this->db->from("kunjungan");
        $this->db->where('kunjungan.status', 4);
        return $this->db->count_all_results();
    }

    public function filter_laporan_kunjungan($tgl_awal, $tgl_akhir)
    {

        $this->db->select('kunjungan.*,
                            pasien.nama_lengkap,
                            pasien.jenis_kelamin,
                            pasien.alamat,
                            pasien.jenis_pasien');
        $this->db->from('kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->where('kunjungan.status', 4);
        $this->db->where('kunjungan.tanggal >=', $tgl_awal);
        $this->db->where('kunjungan.tanggal <=', $tgl_akhir);
        return $this->db->get()->result();
    }

    public function count_filter_laporan_kunjungan($tgl_awal, $tgl_akhir)
    {
        $this->db->from("kunjungan");
        $this->db->where('kunjungan.status', 4);
        $this->db->where('kunjungan.tanggal >=', $tgl_awal);
        $this->db->where('kunjungan.tanggal <=', $tgl_akhir);
        return $this->db->count_all_results();
    }

    public function laporan_pembayaran()
    {
        $this->db->select('payment.*,
        trans.kode_kunjungan,
        kunjungan.no_rekmed,
        kunjungan.petugas_loket,
        kunjungan.tanggal as tanggal_kunjungan,
        pasien.nama_lengkap as nama_pasien,
        users.nama_lengkap as nama_petugas');
        $this->db->from('payment');
        $this->db->join('transaksi_obat trans', 'payment.id_trans = trans.id');
        $this->db->join('kunjungan', 'trans.kode_kunjungan = kunjungan.kd_kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->join('users', 'kunjungan.petugas_loket = users.id');
        return $this->db->get()->result();
    }

    public function count_laporan_pembayaran()
    {
        $this->db->from("payment");
        return $this->db->count_all_results();
    }

    public function filter_laporan_pembayaran($tgl_awal, $tgl_akhir)
    {
        $this->db->select('payment.*,
        trans.kode_kunjungan,
        kunjungan.no_rekmed,
        kunjungan.petugas_loket,
        kunjungan.tanggal as tanggal_kunjungan,
        pasien.nama_lengkap as nama_pasien,
        users.nama_lengkap as nama_petugas');
        $this->db->from('payment');
        $this->db->join('transaksi_obat trans', 'payment.id_trans = trans.id');
        $this->db->join('kunjungan', 'trans.kode_kunjungan = kunjungan.kd_kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->join('users', 'kunjungan.petugas_loket = users.id');
        $this->db->where('kunjungan.tanggal >=', $tgl_awal);
        $this->db->where('kunjungan.tanggal <=', $tgl_akhir);
        return $this->db->get()->result();
    }

    public function count_filter_laporan_pembayaran($tgl_awal, $tgl_akhir)
    {
        $this->db->from('payment');
        $this->db->join('transaksi_obat trans', 'payment.id_trans = trans.id');
        $this->db->join('kunjungan', 'trans.kode_kunjungan = kunjungan.kd_kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->join('users', 'kunjungan.petugas_loket = users.id');
        $this->db->where('kunjungan.tanggal >=', $tgl_awal);
        $this->db->where('kunjungan.tanggal <=', $tgl_akhir);
        return $this->db->count_all_results();
    }

    public function laporan_penggunaan_obat()
    {
        $this->db->select(
            'dto.*,
            kunjungan.tanggal,
            obat.nama_obat,
            obat.jenis_obat,
            pasien.no_rm,
            pasien.jenis_pasien',
        );
        $this->db->from('detail_transaksi_obat dto');
        $this->db->join('transaksi_obat', 'dto.kode_trans = transaksi_obat.id');
        $this->db->join('kunjungan', 'transaksi_obat.kode_kunjungan = kunjungan.kd_kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->join('obat', 'dto.id_obat = obat.id');
        return $this->db->get()->result();
    }

    public function count_laporan_penggunaan_obat()
    {
        $this->db->from("detail_transaksi_obat");
        return $this->db->count_all_results();
    }

    public function filter_laporan_penggunaan_obat($tgl_awal, $tgl_akhir, $jenis_pasien)
    {
        $this->db->select(
            'dto.*,
            kunjungan.tanggal,
            obat.nama_obat,
            obat.jenis_obat,
            pasien.no_rm,
            pasien.jenis_pasien',
        );
        $this->db->from('detail_transaksi_obat dto');
        $this->db->join('transaksi_obat', 'dto.kode_trans = transaksi_obat.id');
        $this->db->join('kunjungan', 'transaksi_obat.kode_kunjungan = kunjungan.kd_kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->join('obat', 'dto.id_obat = obat.id');
        $this->db->where('kunjungan.tanggal >=', $tgl_awal);
        $this->db->where('kunjungan.tanggal <=', $tgl_akhir);
        $this->db->where('pasien.jenis_pasien', $jenis_pasien);
        return $this->db->get()->result();
    }

    public function count_filter_laporan_penggunaan_obat($tgl_awal, $tgl_akhir, $jenis_pasien)
    {
        $this->db->from('detail_transaksi_obat dto');
        $this->db->join('transaksi_obat', 'dto.kode_trans = transaksi_obat.id');
        $this->db->join('kunjungan', 'transaksi_obat.kode_kunjungan = kunjungan.kd_kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->join('obat', 'dto.id_obat = obat.id');
        $this->db->where('kunjungan.tanggal >=', $tgl_awal);
        $this->db->where('kunjungan.tanggal <=', $tgl_akhir);
        $this->db->where('pasien.jenis_pasien', $jenis_pasien);
        return $this->db->count_all_results();
    }

    public function jml_seluruh_kunjungan()
    {
        $this->db->from("kunjungan");
        return $this->db->count_all_results();
    }

    public function jml_kunjungan_perhari()
    {
        $tgl = date('Y-m-d');
        $this->db->from("kunjungan");
        $this->db->where('tanggal', $tgl);
        return $this->db->count_all_results();
    }

    public function jml_seluruh_pasien()
    {
        $this->db->from("pasien");
        return $this->db->count_all_results();
    }

    public function jml_seluruh_transaksi_obat()
    {
        $this->db->from("transaksi_obat");
        return $this->db->count_all_results();
    }

    public function jml_diagnosis()
    {
        $this->db->from("diagnosis");
        return $this->db->count_all_results();
    }

    public function grafik_pengunjung()
    {
        $tahun = date('Y');
        $bc = $this->db->query("
        SELECT
            ifnull((SELECT count(kd_kunjungan) FROM (kunjungan)WHERE((Month(tanggal)=1)AND (YEAR(tanggal)='$tahun'))),0) AS `Januari`,
            ifnull((SELECT count(kd_kunjungan) FROM (kunjungan)WHERE((Month(tanggal)=2)AND (YEAR(tanggal)='$tahun'))),0) AS `Februari`,
            ifnull((SELECT count(kd_kunjungan) FROM (kunjungan)WHERE((Month(tanggal)=3)AND (YEAR(tanggal)='$tahun'))),0) AS `Maret`,
            ifnull((SELECT count(kd_kunjungan) FROM (kunjungan)WHERE((Month(tanggal)=4)AND (YEAR(tanggal)='$tahun'))),0) AS `April`,
            ifnull((SELECT count(kd_kunjungan) FROM (kunjungan)WHERE((Month(tanggal)=5)AND (YEAR(tanggal)='$tahun'))),0) AS `Mei`,
            ifnull((SELECT count(kd_kunjungan) FROM (kunjungan)WHERE((Month(tanggal)=6)AND (YEAR(tanggal)='$tahun'))),0) AS `Juni`,
            ifnull((SELECT count(kd_kunjungan) FROM (kunjungan)WHERE((Month(tanggal)=7)AND (YEAR(tanggal)='$tahun'))),0) AS `Juli`,
            ifnull((SELECT count(kd_kunjungan) FROM (kunjungan)WHERE((Month(tanggal)=8)AND (YEAR(tanggal)='$tahun'))),0) AS `Agustus`,
            ifnull((SELECT count(kd_kunjungan) FROM (kunjungan)WHERE((Month(tanggal)=9)AND (YEAR(tanggal)='$tahun'))),0) AS `September`,
            ifnull((SELECT count(kd_kunjungan) FROM (kunjungan)WHERE((Month(tanggal)=10)AND (YEAR(tanggal)='$tahun'))),0) AS `Oktober`,
            ifnull((SELECT count(kd_kunjungan) FROM (kunjungan)WHERE((Month(tanggal)=11)AND (YEAR(tanggal)='$tahun'))),0) AS `November`,
            ifnull((SELECT count(kd_kunjungan) FROM (kunjungan)WHERE((Month(tanggal)=12)AND (YEAR(tanggal)='$tahun'))),0) AS `Desember`
            from kunjungan GROUP BY YEAR(tanggal) 
        ");
        return $bc;
    }

    public function filter_grafik_pengunjung()
    {
        $tahun = $this->input->get('tahun');
        $bc = $this->db->query("
        SELECT
            ifnull((SELECT count(kd_kunjungan) FROM (kunjungan)WHERE((Month(tanggal)=1)AND (YEAR(tanggal)='$tahun'))),0) AS `Januari`,
            ifnull((SELECT count(kd_kunjungan) FROM (kunjungan)WHERE((Month(tanggal)=2)AND (YEAR(tanggal)='$tahun'))),0) AS `Februari`,
            ifnull((SELECT count(kd_kunjungan) FROM (kunjungan)WHERE((Month(tanggal)=3)AND (YEAR(tanggal)='$tahun'))),0) AS `Maret`,
            ifnull((SELECT count(kd_kunjungan) FROM (kunjungan)WHERE((Month(tanggal)=4)AND (YEAR(tanggal)='$tahun'))),0) AS `April`,
            ifnull((SELECT count(kd_kunjungan) FROM (kunjungan)WHERE((Month(tanggal)=5)AND (YEAR(tanggal)='$tahun'))),0) AS `Mei`,
            ifnull((SELECT count(kd_kunjungan) FROM (kunjungan)WHERE((Month(tanggal)=6)AND (YEAR(tanggal)='$tahun'))),0) AS `Juni`,
            ifnull((SELECT count(kd_kunjungan) FROM (kunjungan)WHERE((Month(tanggal)=7)AND (YEAR(tanggal)='$tahun'))),0) AS `Juli`,
            ifnull((SELECT count(kd_kunjungan) FROM (kunjungan)WHERE((Month(tanggal)=8)AND (YEAR(tanggal)='$tahun'))),0) AS `Agustus`,
            ifnull((SELECT count(kd_kunjungan) FROM (kunjungan)WHERE((Month(tanggal)=9)AND (YEAR(tanggal)='$tahun'))),0) AS `September`,
            ifnull((SELECT count(kd_kunjungan) FROM (kunjungan)WHERE((Month(tanggal)=10)AND (YEAR(tanggal)='$tahun'))),0) AS `Oktober`,
            ifnull((SELECT count(kd_kunjungan) FROM (kunjungan)WHERE((Month(tanggal)=11)AND (YEAR(tanggal)='$tahun'))),0) AS `November`,
            ifnull((SELECT count(kd_kunjungan) FROM (kunjungan)WHERE((Month(tanggal)=12)AND (YEAR(tanggal)='$tahun'))),0) AS `Desember`
            from kunjungan GROUP BY YEAR(tanggal) 
        ");
        return $bc;
    }

    public function detail_rekmed($id)
    {
        $this->db->select('kunjungan.*,
                            pasien.nama_lengkap,
                            pasien.alamat,
                            pasien.no_telp,
                            pasien.nik,
                            pasien.tgl_lahir,
                            pasien.jenis_kelamin,
                            users.nama_lengkap as nama_dokter,
                            ');
        $this->db->from('kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->join('users', 'kunjungan.dokter = users.id');
        $this->db->where('no_rm', $id);
        $this->db->order_by('kunjungan.kd_kunjungan', 'desc');
        return $this->db->get()->result();
    }

    public function detail_rekmed2($id)
    {
        $this->db->select('kunjungan.*,
        diagnosis.nama_diagnosis,
        diagnosis.diagnosis_icd_10,
        diagnosis.kode_diagnosis_icd_10
        ');
        $this->db->from('kunjungan');
        $this->db->join('diagnosis', 'kunjungan.kd_diagnosa = diagnosis.id');
        $this->db->where('kd_kunjungan', $id);
        return $this->db->get()->row();
    }

    public function get_diagnosis_1()
    {
        $this->db->select('kunjungan.*,
        diagnosis.nama_diagnosis,
        diagnosis.diagnosis_icd_10,
        diagnosis.kode_diagnosis_icd_10
        ');
        $this->db->from('kunjungan');
        $this->db->join('diagnosis', 'kunjungan.kd_diagnosa = diagnosis.id');
        return $this->db->get()->result();
    }

    public function get_diagnosis_2()
    {
        $this->db->select('kunjungan.*,
        diagnosis.nama_diagnosis,
        diagnosis.diagnosis_icd_10,
        diagnosis.kode_diagnosis_icd_10
        ');
        $this->db->from('kunjungan');
        $this->db->join('diagnosis', 'kunjungan.kd_diagnosa2 = diagnosis.id');
        return $this->db->get()->result();
    }

    public function get_tindakan_rekmed()
    {
        $this->db->select('dkt.kode_tindakan, tindakan.*');
        $this->db->from('det_kunjungan_tindakan dkt');
        $this->db->join('tindakan', 'dkt.kode_tindakan = tindakan.id');
        return $this->db->get()->result();
    }

    public function jumlah_obat()
    {
        $this->db->from("obat");
        return $this->db->count_all_results();
    }

    public function jml_pembayaran()
    {
        $this->db->from("payment");
        return $this->db->count_all_results();
    }

    public function alert_stok()
    {
        $this->db->select('*')
            ->from('obat')
            ->where('stok <', 5);
        return $this->db->get()->result();
    }

    public function alert_pembayaran()
    {
        $this->db->select('*')
            ->from('kunjungan')
            ->where('status', 3);
        return $this->db->get()->result();
    }

    public function laporan_10_besar()
    {
        $query = $this->db->query("SELECT kunjungan.*, diagnosis.diagnosis_icd_10, diagnosis.kode_diagnosis_icd_10, count(cast(kd_diagnosa as unsigned)) as jml_gejala FROM kunjungan JOIN diagnosis ON kunjungan.kd_diagnosa = diagnosis.id WHERE kd_diagnosa !=4 GROUP BY kd_diagnosa ORDER BY jml_gejala DESC limit 10")->result();
        foreach ($query as $gjl) {
            $count[] = $gjl;
        }
        
        foreach($count as $key => $value) {
            if($value == NULL) {
                unset($count[$key]);
            }
        }
        
        $query_obat = $this->db->query("SELECT detail_transaksi_obat.*, obat.nama_obat, obat.jenis_obat, count(cast(id_obat as unsigned)) as jml_obat FROM detail_transaksi_obat JOIN obat ON detail_transaksi_obat.id_obat = obat.id GROUP BY id_obat ORDER BY jml_obat DESC limit 10")->result();
        foreach ($query_obat as $obat) {
            $count2[] = $obat;
        }
        
        $data = [
            '10_penyakit' => $count,
            '10_obat' => $count2
        ];

        return $data;
    }

}
