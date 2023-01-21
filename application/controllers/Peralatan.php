<?php

class Peralatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek session login, jika session status tidak sama dengan session admin_login, maka halaman akan redirect ke halaman login
        if ($this->session->userdata('status') != "admin_login" && $this->session->userdata('status') != "user_login") {
            redirect(base_url() . 'login?alert=belum_login');
        }
    }

    public function index()
    {
        $data_session['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        $data['judul'] = "Data Peralatan - Sistem Informasi Pendataan Peralatan Kebencanaan | BPBD Karawang";
        $data['alat'] = $this->m_data->get_data('alat')->result_array();
        if ($this->input->post('keyword')) {
            $data['alat'] = $this->m_data->cari_alat();
        }

        $data['title'] = "Halaman Peralatan";
        $this->load->view('admin/v_header', $data);
        $this->load->view('admin/v_sidebar', $data_session);
        $this->load->view('admin/v_peralatan', $data);
        $this->load->view('admin/v_footer');
    }

    public function tambah_aksi()
    {
        $kode_alat = $this->input->post('kode_alat');
        $nama_alat = $this->input->post('nama_alat');
        $merk = $this->input->post('merk');
        $spek = $this->input->post('spek');
        $jumlah = $this->input->post('jumlah');
        $kondisi_baik = $this->input->post('kondisi_baik');
        $kondisi_rusak = $this->input->post('kondisi_rusak');
        $sumber = $this->input->post('sumber');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'kode_alat' => $kode_alat,
            'nama_alat' => $nama_alat,
            'merk' => $merk,
            'spek' => $spek,
            'jumlah' => $jumlah,
            'kondisi_baik' => $kondisi_baik,
            'kondisi_rusak' => $kondisi_rusak,
            'sumber' => $sumber,
            'keterangan' => $keterangan,
            'status' => 1
        );

        // Insert ke db
        $this->m_data->insert_data($data, 'alat');

        // alihkan ke halaman peralatan
        redirect(base_url() . 'peralatan');
    }

    public function edit($id)
    {
        // mengambil session
        $data_session['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        $where = array('kode_alat' => $id);

        $data['judul'] = "Edit Data Peralatan | SIPPK - BPBD Karawang";
        // mengambil data dari db sesuai id
        $data['alat'] = $this->m_data->edit_data($where, 'alat')->result_array();
        $this->load->view('admin/v_header', $data);
        $this->load->view('admin/v_peralatan_edit', $data);
        $this->load->view('admin/v_sidebar', $data_session);
        $this->load->view('admin/v_footer');
    }

    public function update()
    {
        $kode_alat = $this->input->post('kode_alat');
        $nama_alat = $this->input->post('nama_alat');
        $merk = $this->input->post('merk');
        $spek = $this->input->post('spek');
        $jumlah = $this->input->post('jumlah');
        $kondisi_baik = $this->input->post('kondisi_baik');
        $kondisi_rusak = $this->input->post('kondisi_rusak');
        $sumber = $this->input->post('sumber');
        $keterangan = $this->input->post('keterangan');
        $status = $this->input->post('status');

        $where = array(
            'kode_alat' => $kode_alat
        );

        $data = array(
            'kode_alat' => $kode_alat,
            'nama_alat' => $nama_alat,
            'merk' => $merk,
            'spek' => $spek,
            'jumlah' => $jumlah,
            'kondisi_baik' => $kondisi_baik,
            'kondisi_rusak' => $kondisi_rusak,
            'sumber' => $sumber,
            'keterangan' => $keterangan,
            'status' => $status
        );

        // Insert ke db
        $this->m_data->update_data($where, $data, 'alat');

        // alihkan ke halaman peralatan
        redirect(base_url() . 'peralatan');
    }

    public function hapus($id)
    {
        $where = array(
            'kode_alat' => $id
        );

        // menghapus data admin dari database sesuai id
        $this->m_data->delete_data($where, 'alat');

        // mengalihkan ke halaman admin
        redirect(base_url() . 'peralatan');
    }

    public function cetak()
    {
        if (isset($_POST['print1'])) {
            $data_session['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        } else if (isset($_POST['print2'])) {
            $data_session['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        }


        $data['judul'] = "Laporan Peralatan Kebencanaan | Badan Penanggulangan Bencana Daerah";
        $data['alat'] = $this->db->get('alat')->result_array();

        $this->load->view('user/v_peralatan_cetak', $data);
    }
}
