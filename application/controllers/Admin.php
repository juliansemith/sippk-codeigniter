<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek session login, jika session status tidak sama dengan session admin_login, maka halaman akan redirect ke halaman login
        if ($this->session->userdata('status') != "admin_login") {
            redirect(base_url() . 'login?alert=belum_login');
        }
    }

    public function index()
    {
        $data_session['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        $data['judul'] = "Dashboard - Sistem Informasi Pendataan Peralatan Kebencanaan | BPBD Karawang";
        $data['title'] = "Dashboard";
        $this->load->view('admin/v_header', $data);
        $this->load->view('admin/v_sidebar', $data_session);
        $this->load->view('admin/index');
        $this->load->view('admin/v_footer');
    }

    public function data_admin()
    {
        $data_session['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        // mengambil data dari database
        $data['judul'] = "Data Admin | SIPPK - BPBD Karawang";
        $data['admin'] = $this->m_data->get_data('admin')->result_array();
        if ($this->input->post('keyword')) {
            $data['admin'] = $this->m_data->cari_admin();
        }
        $this->load->view('admin/v_header', $data);
        $this->load->view('admin/v_sidebar', $data_session);
        $this->load->view('admin/v_data_admin', $data);
        $this->load->view('admin/v_footer');
    }

    public function admin_edit($id)
    {
        // mengambil session
        $data_session['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        $where = array('kode_admin' => $id);

        $data['judul'] = "Edit Data Admin | SIPPK - BPBD Karawang";
        // mengambil data dari db sesuai id
        $data['admin'] = $this->m_data->edit_data($where, 'admin')->result_array();
        $this->load->view('admin/v_header', $data);
        $this->load->view('admin/admin_edit', $data);
        $this->load->view('admin/v_sidebar', $data_session);
        $this->load->view('admin/v_footer');
    }


    public function admin_tambah_aksi()
    {
        $kode_admin = $this->input->post('kode_admin');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
            'kode_admin' => $kode_admin,
            'nama' => $nama,
            'username' => $username,
            'password' => sha1($password)
        );

        // Insert datanya ke database
        $this->m_data->insert_data($data, 'admin');
        // lalu redirect
        $this->session->set_flashdata('flash', ' ditambahkan.');
        redirect(base_url() . 'admin/data_admin');
    }

    public function admin_update()
    {
        $kode_admin = $this->input->post('kode_admin');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $where = array(
            'kode_admin' => $kode_admin
        );

        // cek form password diisi atau tidak
        if ($password == "") {
            $data = array(
                'nama' => $nama,
                'username' => $username
            );

            // lalu update ke db
            $this->m_data->update_data($where, $data, 'admin');
        } else {
            $data = array(
                'nama' => $nama,
                'username' => $username,
                'password' => sha1($password)
            );

            // lalu update ke db
            $this->m_data->update_data($where, $data, 'admin');
        }

        // dan terakhir jika berhasil redirect ke halaman data admin
        $this->session->set_flashdata('flash', ' diupdate.');
        redirect(base_url() . 'admin/data_admin');
    }

    public function admin_hapus($id)
    {
        $where = array(
            'kode_admin' => $id
        );

        // menghapus data admin dari database sesuai id
        $this->m_data->delete_data($where, 'admin');

        // mengalihkan ke halaman admin
        $this->session->set_flashdata('flash', ' dihapus.');
        redirect(base_url() . 'admin/data_admin');
    }

    public function data_user()
    {
        $data_session['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        // mengambil data dari database
        $data['judul'] = "Data User | SIPPK - BPBD Karawang";
        $data['user'] = $this->m_data->get_data('user')->result_array();
        if ($this->input->post('keyword')) {
            $data['user'] = $this->m_data->cari_user();
        }
        $this->load->view('admin/v_header', $data);
        $this->load->view('admin/v_sidebar', $data_session);
        $this->load->view('admin/v_data_user', $data);
        $this->load->view('admin/v_footer');
    }

    public function user_tambah_aksi()
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
            'nama' => $nama,
            'username' => $username,
            'password' => sha1($password)
        );

        // Insert datanya ke database
        $this->m_data->insert_data($data, 'user');
        // lalu redirect
        $this->session->set_flashdata('flash', ' ditambahkan.');
        redirect(base_url() . 'admin/data_user');
    }

    public function user_edit($id)
    {
        // mengambil session
        $data_session['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        $where = array('kode_user' => $id);

        $data['judul'] = "Edit Data User | SIPPK - BPBD Karawang";
        // mengambil data dari db sesuai id
        $data['user'] = $this->m_data->edit_data($where, 'user')->result_array();
        $this->load->view('admin/v_header', $data);
        $this->load->view('admin/user_edit', $data);
        $this->load->view('admin/v_sidebar', $data_session);
        $this->load->view('admin/v_footer');
    }

    public function user_update()
    {
        $kode_user = $this->input->post('kode_user');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $where = array(
            'kode_user' => $kode_user
        );

        // cek form password diisi atau tidak
        if ($password == "") {
            $data = array(
                'nama' => $nama,
                'username' => $username
            );

            // lalu update ke db
            $this->m_data->update_data($where, $data, 'user');
        } else {
            $data = array(
                'nama' => $nama,
                'username' => $username,
                'password' => sha1($password)
            );

            // lalu update ke db
            $this->m_data->update_data($where, $data, 'user');
        }

        // dan terakhir jika berhasil redirect ke halaman data user
        $this->session->set_flashdata('flash', ' diupdate.');
        redirect(base_url() . 'admin/data_user');
    }

    public function user_hapus($id)
    {
        $where = array(
            'kode_user' => $id
        );

        // menghapus data user dari database sesuai id
        $this->m_data->delete_data($where, 'user');

        // mengalihkan ke halaman user
        $this->session->set_flashdata('flash', ' dihapus.');
        redirect(base_url() . 'admin/data_user');
    }

    public function tentang()
    {
        $data_session['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        $data['judul'] = "Tentang Kami | Badan Penanggulangan Bencana Daerah Karawang";
        $this->load->view('admin/v_tentang', $data);
    }

    public function ganti_password()
    {
        $data_session['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        $data['judul'] = "Ganti Password - Sistem Informasi Pendataan Peralatan Kebencanaan | BPBD Karawang";
        $this->load->view('admin/v_header', $data);
        $this->load->view('admin/v_ganti_password');
        $this->load->view('admin/v_sidebar', $data_session);
        $this->load->view('admin/v_footer');
    }

    public function ganti_password_aksi()
    {
        $baru = $this->input->post('password_baru');
        $ulang = $this->input->post('password_ulang');

        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|matches[password_ulang]');
        $this->form_validation->set_rules('password_ulang', 'Ulangi Password', 'required');

        if ($this->form_validation->run() != false) {
            $id = $this->session->userdata('kode_admin');

            $where = array('kode_admin' => $id);

            $data = array('password' => sha1($baru));

            $this->m_data->update_data($where, $data, 'admin');
            redirect(base_url() . 'admin/ganti_password/?alert=sukses');
        } else {
            $this->load->view('admin/v_header');
            $this->load->view('admin/v_ganti_password');
            $this->load->view('admin/v_footer');
        }
    }

    public function cari()
    {
        $keyword = $this->input->post('keyword');
        $data['admin'] = $this->m_data->cariData($keyword);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'login?alert=logout');
    }
}
