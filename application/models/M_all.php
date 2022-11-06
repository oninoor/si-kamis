<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_all extends CI_Model
{
    private $pasien = 'pasien';
    private $kunjungan = 'kunjungan';
    private $diagnosis = 'diagnosis';

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
        $this->db->where('kunjungan.status', 1);
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
                            users.nama_lengkap as nama_dokter
                            ');
        $this->db->from('kunjungan');
        $this->db->join('pasien', 'kunjungan.no_rekmed = pasien.no_rm');
        $this->db->join('users', 'kunjungan.dokter = users.id');
        $this->db->where('kd_kunjungan', $id);
        return $this->db->get()->row();
    }

    public function get_diagnosis()
    {
        return $this->db->get($this->diagnosis)->result();
    }
}
