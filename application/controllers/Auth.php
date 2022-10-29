<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('auth/login');
    }

    public function login()
    {

        $username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

        //kondisi username 
        if (!empty($username)) {

            //kondisi password 
            if (!empty($password)) {
                $users = $this->db->get_where('users', ['username' => $username])->row();

                //Kondisi username
                if ($username == $users->username) {

                    //Kondisi Password
                    if (password_verify($password, $users->password)) {

                        //Kondisi Status User
                        if ($users->status == 1) {
                            //tambah data ke session 
                            $data = [
                                'id' => $users->id,
                                'username' => $users->username,
                                'nama_lengkap' => $users->nama_lengkap,
                                'role' => $users->role,
                            ];
                            $this->session->set_userdata($data);
                            //jika admin
                            if ($users->role == 0) {
                                $this->session->set_flashdata('berhasil_login', true);
                                redirect('Owner');
                            }
                            if ($users->role == 1) {
                                $this->session->set_flashdata('berhasil_login', true);
                                redirect('Admin');
                            }
                            //jika loket pendaftaran
                            else if ($users->role == 2) {
                                $this->session->set_flashdata('berhasil_login', true);
                                redirect('Loket');
                            }
                            //jika apoteker 
                            else if ($users->role == 3) {
                            }
                        }
                        //kondisi jika status 0
                        else {
                            $this->session->set_flashdata('akun_nonaktif', true);
                            redirect('Auth');
                        }
                    }
                    //kondisi jika username salah
                    else {
                        $this->session->set_flashdata('password_salah', true);
                        redirect('Auth');
                    }
                }
                //kondisi jika username salah
                else {
                    $this->session->set_flashdata('username_salah', true);
                    redirect('Auth');
                }
            }
            //jika password kosong
            else {
                $this->session->set_flashdata('password_kosong', true);
                redirect('Auth');
            }
        }
        //jika user kosong
        else {
            $this->session->set_flashdata('username_kosong', true);
            redirect('Auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama_lengkap');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('logout', true);
        redirect('Auth');
    }

    public function login_pasien()
    {
        $this->load->view('auth/login_pasien');
    }

    public function action_login_pasien()
    {
        $no_rm = htmlspecialchars($this->input->post('no_rm', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

        if (!empty($no_rm)) {

            //kondisi password 
            if (!empty($password)) {

                $pasien = $this->db->get_where('pasien', ['no_rm' => $no_rm])->row();

                //Kondisi username
                if ($no_rm == $pasien->no_rm) {

                    //Kondisi Password
                    if (password_verify($password, $pasien->password)) {

                            //tambah data ke session 
                            $data = [
                                'id' => $pasien->id,
                                'no_rm' => $pasien->no_rm,
                                'nama_lengkap' => $pasien->nama_lengkap,
                            ];
                            $this->session->set_userdata($data);
                            // $this->session->set_flashdata('berhasil_login', true);
                            // redirect('Owner');
                        }
                    //kondisi jika username salah
                    else {
                        $this->session->set_flashdata('password_salah', true);
                        redirect('Auth/login_pasien');
                    }
                }
                //kondisi jika username salah
                else {
                    $this->session->set_flashdata('no_rm_salah', true);
                    redirect('Auth/login_pasien');
                }
            }
            //jika password kosong
            else {
                $this->session->set_flashdata('password_kosong', true);
                redirect('Auth/login_pasien');
            }
        }
        //jika user kosong
        else {
            $this->session->set_flashdata('no_rm_kosong', true);
            redirect('Auth/login_pasien');
        }
    }

    public function logout_pasien()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('no_rm');
        $this->session->unset_userdata('nama_lengkap');
        $this->session->set_flashdata('logout', true);
        redirect('Auth/login_pasien');
    }
}
