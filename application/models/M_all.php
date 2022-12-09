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
}
