<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_loket extends CI_Model
{
    private $pasien = 'pasien';

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
        $hasil = $this->db->query('SELECT MAX(no_rm) as no_rm from pasien')->row();
        return $hasil->no_rm;
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
        $this->alergi_obat = $post['alergi_obat'];
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
        $this->alergi_obat = $post['alergi_obat'];
        $this->tgl_lahir = $tgl_lahir;
        $this->tempat_lahir = $post['tempat_lahir'];
        $this->alamat = $post['alamat'];
        $this->kota = $post['kota'];
        if(!empty($post['kecamatan'])) {
            $this->kecamatan = $post['kecamatan'];
        } else {
            $this->kecamatan = $post['old_kecamatan'];
        }
        if(!empty($post['desa'])) {
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
}