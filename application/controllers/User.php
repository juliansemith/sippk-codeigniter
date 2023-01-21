<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek session login, jika session status tidak sama dengan session admin_login, maka halaman akan redirect ke halaman login
        if ($this->session->userdata('status') != "user_login") {
            redirect(base_url() . 'login?alert=belum_login');
        }
    }

    public function index()
    {
        $data_session['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['judul'] = "Dashboard - Sistem Informasi Pendataan Peralatan Kebencanaan | BPBD Karawang";
        $data['title'] = "Dashboard";
        $this->load->view('user/v_header', $data);
        $this->load->view('user/v_sidebar', $data_session);
        $this->load->view('user/index');
        $this->load->view('user/v_footer');
    }

    public function peralatan()
    {
        $data_session['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['alat'] = $this->m_data->get_data('alat')->result_array();
        if ($this->input->post('keyword')) {
            $data['alat'] = $this->m_data->cari_alat();
        }
        $data['judul'] = "Laporan Data Peralatan Kebencanaan";
        $data['title'] = "Laporan Peralatan Kebencanaan";
        $this->load->view('user/v_header', $data);
        $this->load->view('user/v_sidebar', $data_session);
        $this->load->view('user/v_peralatan', $data);
        $this->load->view('user/v_footer');
    }

    public function ganti_password()
    {
        $data_session['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['judul'] = "Ganti Password - Sistem Informasi Pendataan Peralatan Kebencanaan | BPBD Karawang";
        $this->load->view('user/v_header', $data);
        $this->load->view('user/v_ganti_password');
        $this->load->view('user/v_sidebar', $data_session);
        $this->load->view('user/v_footer');
    }

    public function ganti_password_aksi()
    {
        $baru = $this->input->post('password_baru');
        $ulang = $this->input->post('password_ulang');

        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|matches[password_ulang]');
        $this->form_validation->set_rules('password_ulang', 'Ulangi Password', 'required');

        if ($this->form_validation->run() != false) {
            $id = $this->session->userdata('id_user');

            $where = array('id_user' => $id);

            $data = array('password' => sha1($baru));

            $this->m_data->update_data($where, $data, 'user');
            redirect(base_url() . 'user/ganti_password/?alert=sukses');
        } else {
            $this->load->view('user/v_header');
            $this->load->view('user/v_ganti_password');
            $this->load->view('user/v_footer');
        }
    }

    public function cetak()
    {
        $data_session['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['judul'] = "Laporan Peralatan Kebencanaan | Badan Penanggulangan Bencana Daerah";
        $data['alat'] = $this->db->get('alat')->result_array();

        $this->load->view('user/v_peralatan_cetak', $data);
    }

    public function tentang()
    {
        $data_session['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['judul'] = "Tentang Kami | Badan Penanggulangan Bencana Daerah Karawang";
        $this->load->view('admin/v_tentang', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'login?alert=logout');
    }
}
