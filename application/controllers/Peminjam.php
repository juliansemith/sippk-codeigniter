<?php

class Peminjam extends CI_Controller
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

        $data['judul'] = "Data Peminjam - Sistem Informasi Pendataan Peralatan Kebencanaan | BPBD Karawang";
        $data['peminjam'] = $this->m_data->get_data('peminjam')->result_array();
        if ($this->input->post('keyword')) {
            $data['peminjam'] = $this->m_data->cari_peminjam();
        }

        $data['title'] = "Halaman Peralatan";
        $this->load->view('admin/v_header', $data);
        $this->load->view('admin/v_sidebar', $data_session);
        $this->load->view('admin/v_peminjam', $data);
        $this->load->view('admin/v_footer');
    }

    public function tambah_aksi()
    {
        $kode_peminjam = $this->input->post('kode_peminjam');
        $nama_peminjam = $this->input->post('nama_peminjam');
        $jabatan = $this->input->post('jabatan');
        $instansi = $this->input->post('instansi');

        $data = array(
            'kode_peminjam' => $kode_peminjam,
            'nama_peminjam' => $nama_peminjam,
            'jabatan' => $jabatan,
            'instansi' => $instansi,
        );

        // Insert ke db
        $this->m_data->insert_data($data, 'peminjam');

        // alihkan ke halaman peralatan
        redirect(base_url() . 'peminjam');
    }

    public function edit($id)
    {
        // mengambil session
        $data_session['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        $where = array('kode_peminjam' => $id);

        $data['judul'] = "Edit Data Peminjam | SIPPK - BPBD Karawang";
        // mengambil data dari db sesuai id
        $data['peminjam'] = $this->m_data->edit_data($where, 'peminjam')->result_array();
        $this->load->view('admin/v_header', $data);
        $this->load->view('admin/v_peminjam_edit', $data);
        $this->load->view('admin/v_sidebar', $data_session);
        $this->load->view('admin/v_footer');
    }

    public function update()
    {
        $kode_peminjam = $this->input->post('kode_peminjam');
        $nama_peminjam = $this->input->post('nama_peminjam');
        $jabatan = $this->input->post('jabatan');
        $instansi = $this->input->post('instansi');

        $where = array(
            'kode_peminjam' => $kode_peminjam
        );

        $data = array(
            'kode_peminjam' => $kode_peminjam,
            'nama_peminjam' => $nama_peminjam,
            'jabatan' => $jabatan,
            'instansi' => $instansi
        );

        // Insert ke db
        $this->m_data->update_data($where, $data, 'peminjam');

        // alihkan ke halaman peralatan
        redirect(base_url() . 'peminjam');
    }

    public function hapus($id)
    {
        $where = array(
            'kode_peminjam' => $id
        );

        // menghapus data admin dari database sesuai id
        $this->m_data->delete_data($where, 'peminjam');

        // mengalihkan ke halaman admin
        redirect(base_url() . 'peminjam');
    }
}
