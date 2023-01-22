<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_loket extends CI_Model
{
    private $pasien = 'pasien';
    private $kunjungan = 'kunjungan';

    public function get_pasien()
    {
        $this->db->select('pasien.*, reg.name nama_kota, dis.name nama_kecamatan, vil.name nama_desa');
        $this->db->from('pasien');
        $this->db->join('regencies reg', 'pasien.kota = reg.id');
        $this->db->join('districts dis', 'pasien.kecamatan = dis.id');
        $this->db->join('villages vil', 'pasien.desa = vil.id');
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }

    public function detail_pasien($id)
    {
        $this->db->select('pasien.*, reg.name nama_kota, dis.name nama_kecamatan, vil.name nama_desa');
        $this->db->from('pasien');
        $this->db->join('regencies reg', 'pasien.kota = reg.id');
        $this->db->join('districts dis', 'pasien.kecamatan = dis.id');
        $this->db->join('villages vil', 'pasien.desa = vil.id');
        $this->db->where('pasien.id', $id);
        return $this->db->get()->row();
    }

    public function max_norm()
    {
        return $this->db->query('SELECT MAX(no_rm) as maxs from pasien')->row();
    }

    public function max_kode_kunjungan()
    {
        $hasil = $this->db->query('SELECT MAX(kd_kunjungan) as kode from kunjungan')->row();
        return $hasil->kode;
    }

    public function max_no_antri()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');
        return $this->db->query("SELECT max(no_antrian) as maxs FROM kunjungan WHERE tanggal = '$date' order by no_antrian desc limit 1")->row();
    }

    public function save_pasien()
    {
        $post = $this->input->post();
        if ($this->input->post('tgl') <= 9) {
            $tgl_lahir = $this->input->post('thn') . '-' . $this->input->post('bln') . '-' . '0' . $this->input->post('tgl');
        } else {
            $tgl_lahir = $this->input->post('thn') . '-' . $this->input->post('bln') . '-' . $this->input->post('tgl');
        }
        $this->no_rm = $post['no_rm'];
        $this->nik = $post['nik'];
        $this->no_bpjs = $post['no_bpjs'];
        $this->nama_lengkap = $post['nama_lengkap'];
        $this->jenis_kelamin = $post['jenis_kelamin'];
        $this->jenis_pasien = $post['jenis_pasien'];
        $this->tgl_lahir = $tgl_lahir;
        $this->tempat_lahir = $post['tempat_lahir'];
        $this->alamat = $post['alamat'];
        $this->kota = $post['kota'];
        $this->kecamatan = $post['kecamatan'];
        $this->desa = $post['desa'];
        $this->no_telp = $post['no_telp'];
        $this->pekerjaan = $post['pekerjaan'];
        $this->pendidikan_terakhir = $post['pendidikan_terakhir'];
        $this->nama_wali = $post['nama_wali'];
        $this->hubungan = $post['hubungan'];
        $this->password = password_hash($post['no_rm'], PASSWORD_BCRYPT);
        $this->password_view = $post['no_rm'];
        // var_dump($this);
        $this->db->insert($this->pasien, $this);
    }

    public function update_pasien()
    {
        $post = $this->input->post();
        if ($this->input->post('tgl') <= 9) {
            $tgl_lahir = $this->input->post('thn') . '-' . $this->input->post('bln') . '-' . '0' . $this->input->post('tgl');
        } else {
            $tgl_lahir = $this->input->post('thn') . '-' . $this->input->post('bln') . '-' . $this->input->post('tgl');
        }
        $this->nik = $post['nik'];
        $this->no_bpjs = $post['no_bpjs'];
        $this->nama_lengkap = $post['nama_lengkap'];
        $this->jenis_kelamin = $post['jenis_kelamin'];
        $this->jenis_pasien = $post['jenis_pasien'];
        $this->tgl_lahir = $tgl_lahir;
        $this->tempat_lahir = $post['tempat_lahir'];
        $this->alamat = $post['alamat'];
        $this->kota = $post['kota'];
        if (!empty($post['kecamatan'])) {
            $this->kecamatan = $post['kecamatan'];
        } else {
            $this->kecamatan = $post['old_kecamatan'];
        }
        if (!empty($post['desa'])) {
            $this->desa = $post['desa'];
        } else {
            $this->desa = $post['old_desa'];
        }
        $this->no_telp = $post['no_telp'];
        $this->pekerjaan = $post['pekerjaan'];
        $this->pendidikan_terakhir = $post['pendidikan_terakhir'];
        $this->nama_wali = $post['nama_wali'];
        $this->hubungan = $post['hubungan'];
        // var_dump($this);
        $this->db->update($this->pasien, $this, ['id' => $post['id']]);
    }

    public function get_pendaftaran()
    {
        $this->db->select('kunjungan.*, 
                            pasien.no_rm, 
                            pasien.nama_lengkap, 
                            users.nama_lengkap AS nama_dokter
                            ');
        $this->db->from('kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->join('users', 'kunjungan.dokter = users.id');
        $this->db->where('kunjungan.status', 0);
        $this->db->order_by('kunjungan.kd_kunjungan', 'asc');
        return $this->db->get()->result();
    }

    public function get_kunjungan()
    {
        $this->db->select('kunjungan.*, 
                            pasien.no_rm, 
                            pasien.nama_lengkap, 
                            users.nama_lengkap AS nama_dokter
                            ');
        $this->db->from('kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->join('users', 'kunjungan.dokter = users.id');
        $this->db->where('kunjungan.status >', 0);
        $this->db->order_by('kunjungan.kd_kunjungan', 'asc');
        return $this->db->get()->result();
    }

    public function detail_kunjungan($id)
    {
        $this->db->select('kunjungan.*,
                            pasien.nama_lengkap,
                            pasien.alamat,
                            pasien.no_telp,
                            users.nama_lengkap as nama_dokter
                            ');
        $this->db->from('kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->join('users', 'kunjungan.dokter = users.id');
        $this->db->where('kd_kunjungan', $id);
        return $this->db->get()->row();
    }

    public function save_pendaftaran()
    {
        $post = $this->input->post();
        $this->kd_kunjungan = $post['kd_kunjungan'];
        $this->no_rekmed = $post['no_rekmed'];
        // $this->pasien = $post['pasien'];
        $this->dokter = $post['dokter'];
        $this->tanggal = $post['tanggal'];
        $this->no_antrian = $post['no_antrian'];
        $this->tinggi_badan = $post['tinggi_badan'];
        $this->berat_badan = $post['berat_badan'];
        $this->suhu = $post['suhu'];
        $this->tekanan_darah_sistole = $post['tekanan_darah_sistole'];
        $this->tekanan_darah_diastole = $post['tekanan_darah_diastole'];
        $this->nadi = $post['nadi'];
        $this->gejala = $post['gejala'];
        $this->alergi = $post['alergi'];
        $this->petugas_loket = $post['petugas_loket'];
        $this->status = 0;
        $this->db->insert($this->kunjungan, $this);
    }

    public function update_pendaftaran()
    {
        $post = $this->input->post();
        $this->no_rekmed = $post['no_rekmed'];
        $this->dokter = $post['dokter'];
        $this->tinggi_badan = $post['tinggi_badan'];
        $this->berat_badan = $post['berat_badan'];
        $this->suhu = $post['suhu'];
        $this->tekanan_darah_sistole = $post['tekanan_darah_sistole'];
        $this->tekanan_darah_diastole = $post['tekanan_darah_diastole'];
        $this->nadi = $post['nadi'];
        $this->gejala = $post['gejala'];
        $this->alergi = $post['alergi'];
        $this->db->update($this->kunjungan, $this, ['kd_kunjungan' => $post['kd_kunjungan']]);
    }

    public function get_pembayaran()
    {
        $this->db->select('trans.*,
                            kunjungan.kd_kunjungan,
                            kunjungan.no_rekmed,
                            kunjungan.dokter,
                            kunjungan.status,
                            pasien.nama_lengkap as nama_pasien,
                            users.nama_lengkap as nama_petugas,
                            ');
        $this->db->from('transaksi_obat trans');
        $this->db->join('kunjungan', 'trans.kode_kunjungan = kunjungan.kd_kunjungan');
        $this->db->join('users', 'trans.petugas_obat = users.id');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->where('kunjungan.status', 3);
        $this->db->order_by('trans.id', 'asc');
        return $this->db->get()->result();
    }

    public function get_transaksi($id)
    {
        $this->db->select('trans.*,
                            kunjungan.kd_kunjungan,
                            kunjungan.no_rekmed,
                            kunjungan.tindak_lanjut,
                            kunjungan.terapi_obat,
                            kunjungan.tanggal,
                            kunjungan.petugas_loket,
                            pasien.nama_lengkap as nama_pasien,
                            pasien.jenis_pasien,
                            users.nama_lengkap as nama_petugas
                            ');
        $this->db->from('transaksi_obat trans');
        $this->db->join('kunjungan', 'trans.kode_kunjungan = kunjungan.kd_kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->join('users', 'kunjungan.petugas_loket = users.id');
        $this->db->where('trans.id', $id);
        return $this->db->get()->row();
    }

    public function get_tindakan($id)
    {
        $this->db->select('dkt.*, tindakan.tindakan');
        $this->db->from('det_kunjungan_tindakan dkt');
        $this->db->join('tindakan', 'dkt.kode_tindakan = tindakan.id');
        $this->db->where('kode_kunjungan', $id);
        return $this->db->get()->result();
    }

    public function last_idpayment()
    {
        $sql = $this->db->select('id');
        $sql = $this->db->from('payment');
        $sql = $this->db->order_by('id', 'desc');
        $sql = $this->db->limit(1);
        $sql = $this->db->get();

        return $sql->result();
    }

    public function riwayat_pembayaran()
    {
        $this->db->select('payment.*,
                            trans.kode_kunjungan,
                            kunjungan.no_rekmed,
                            kunjungan.petugas_loket,
                            pasien.nama_lengkap as nama_pasien,
                            users.nama_lengkap as nama_petugas');
        $this->db->from('payment');
        $this->db->join('transaksi_obat trans', 'payment.id_trans = trans.id');
        $this->db->join('kunjungan', 'trans.kode_kunjungan = kunjungan.kd_kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->join('users', 'kunjungan.petugas_loket = users.id');
        $this->db->where('kunjungan.status', 4);
        $this->db->order_by('trans.id', 'desc');
        return $this->db->get()->result();
    }

    public function get_detail_pembayaran($id)
    {
        $this->db->select('payment.*,
                            trans.kode_kunjungan,
                            kunjungan.no_rekmed,
                            kunjungan.petugas_loket,
                            pasien.nama_lengkap as nama_pasien,
                            users.nama_lengkap as nama_petugas');
        $this->db->from('payment');
        $this->db->join('transaksi_obat trans', 'payment.id_trans = trans.id');
        $this->db->join('kunjungan', 'trans.kode_kunjungan = kunjungan.kd_kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->join('users', 'kunjungan.petugas_loket = users.id');
        $this->db->where('payment.id', $id);
        return $this->db->get()->row();
    }

    public function get_detail_pembayaran2($id)
    {
        $this->db->select('payment.*,
        trans.kode_kunjungan,
        kunjungan.no_rekmed,
        kunjungan.petugas_loket,
        pasien.nama_lengkap as nama_pasien,
        users.nama_lengkap as nama_dokter');
        $this->db->from('payment');
        $this->db->join('transaksi_obat trans', 'payment.id_trans = trans.id');
        $this->db->join('kunjungan', 'trans.kode_kunjungan = kunjungan.kd_kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->join('users', 'kunjungan.dokter = users.id');
        $this->db->where('payment.id', $id);
        return $this->db->get()->row();
    }

   
}
