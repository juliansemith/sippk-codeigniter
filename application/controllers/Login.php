<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    // menampilkan halaman login
    public function index()
    {
        $data['judul'] = "Login | SIPPK - Badan Penanggulangan Bencana Daerah";
        $this->load->view('templates/login_header', $data);
        $this->load->view('v_login', $data);
        $this->load->view('templates/login_footer');
    }

    // validasi login
    public function login_aksi()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $sebagai = $this->input->post('sebagai');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() != false) {
            $where = array(
                'username' => $username,
                'password' => sha1($password)
            );

            if ($sebagai == "admin") {
                $cek = $this->m_data->cek_login('admin', $where)->num_rows();
                $data = $this->m_data->cek_login('admin', $where)->row();

                if ($cek > 0) {
                    $data_session = array(
                        'id_admin' => $data->id_admin,
                        'username' => $data->username,
                        'status' => 'admin_login'
                    );

                    $this->session->set_userdata($data_session);

                    redirect(base_url() . 'admin');
                } else {
                    redirect(base_url() . 'login?alert=gagal');
                }
            } else if ($sebagai == "user") {
                $cek = $this->m_data->cek_login('user', $where)->num_rows();
                $data = $this->m_data->cek_login('user', $where)->row();

                if ($cek > 0) {
                    $data_session = array(
                        'id_user' => $data->id_pakar,
                        'nama' => $data->nama,
                        'username' => $data->username,
                        'status' => 'user_login'
                    );

                    $this->session->set_userdata($data_session);
                    redirect(base_url() . 'user');
                } else {
                    redirect(base_url() . 'login?alert=gagal');
                }
            }
        } else {
            $this->load->view('v_login');
        }
    }
}
