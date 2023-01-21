<?php

class Peminjaman extends CI_Controller
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


        // mengambil data peminjaman alat dari db
        $data['judul'] = "Data Peminjaman Alat";
        $data['peminjaman'] = $this->db->query("SELECT * FROM peminjaman, alat, peminjam WHERE peminjaman.kode_alat=alat.kode_alat AND peminjam.kode_peminjam=peminjaman.kode_peminjam ORDER BY id_peminjaman ASC")->result_array();
        if ($this->input->post('keyword')) {
            $data['peminjaman'] = $this->m_data->cari_peminjaman();
        }

        $this->load->view('admin/v_header', $data);
        $this->load->view('admin/v_sidebar', $data_session);
        $this->load->view('admin/v_peminjaman', $data);
        $this->load->view('admin/v_footer');
    }

    public function tambah()
    {
        $data_session['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        $where = array('status' => 1);
        $data['judul'] = "Tambah Data Peminjaman | SIPPK - BPBD Karawang";
        $data['alat'] = $this->m_data->edit_data($where, 'alat')->result_array();
        $data['peminjam'] = $this->m_data->get_data('peminjam')->result_array();;
        $this->load->view('admin/v_header', $data);
        $this->load->view('admin/v_peminjaman_tambah', $data);
        $this->load->view('admin/v_sidebar', $data_session);
        $this->load->view('admin/v_footer');
    }

    public function tambah_aksi()
    {
        $kode_alat = $this->input->post('kode_alat');
        $nama_alat = $this->input->post('nama_alat');
        $kode_peminjam = $this->input->post('kode_peminjam');
        $jumlah_pinjam = $this->input->post('jumlah_pinjam');
        $tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_sampai = $this->input->post('tanggal_sampai');

        $data = array(
            'kode_alat' => $kode_alat,
            'peminjaman_alat' => $nama_alat,
            'kode_peminjam' => $kode_peminjam,
            'jumlah_pinjam' => $jumlah_pinjam,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_sampai' => $tanggal_sampai,
            'status_peminjaman' => 2
        );

        // Insert ke db
        $this->m_data->insert_data($data, 'peminjaman');

        // mengubah status alat menjadi dipinjam
        $w = array(
            'kode_alat' => $kode_alat
        );

        $d = array(
            'status' => 2
        );
        $this->m_data->update_data($w, $d, 'alat');
        // alihkan ke halaman peralatan
        redirect(base_url() . 'peminjaman');
    }

    public function peminjaman_aksi()
    {
        $kode_alat = $this->input->post('kode_alat');
        $kode_peminjam = $this->input->post('kode_peminjam');
        $peminjaman_alat = $this->input->post('nama_alat');
        $jumlah_pinjam = $this->input->post('jumlah_pinjam');
        $tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_sampai = $this->input->post('tanggal_sampai');

        $data = array(
            'kode_alat' => $kode_alat,
            'kode_peminjam' => $kode_peminjam,
            'peminjaman_alat' => $peminjaman_alat,
            'jumlah_pinjam' => $jumlah_pinjam,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_sampai' => $tanggal_sampai,
            'status_peminjaman' => 2
        );

        // insert ke db
        $this->m_data->insert_data($data, 'peminjaman');

        // ubah status alat menjadi dipinjam
        $w = array(
            'kode_alat' => $kode_alat
        );

        $d = array(
            'status' => 2
        );

        $this->m_data->update_data($w, $d, 'alat');

        // redirect ke halaman data peminjaman
        $this->session->set_flashdata('flash', ' ditambahkan.');
        redirect(base_url() . 'peminjaman');
    }

    public function peminjaman_batal($id)
    {
        $where = array(
            'id_peminjaman' => $id
        );

        // ambil data alat pada peminjaman ber id
        $data = $this->m_data->edit_data($where, 'peminjaman')->row();
        $alat = $data->kode_alat;

        // mengembalikan status alat kembali ke tersedia (1)
        $w = array(
            'kode_alat' => $alat
        );

        $d = array(
            'status' => 1
        );
        $this->m_data->update_data($w, $d, 'alat');

        // hapus data alat dari db sesuai id

        $this->m_data->delete_data($where, 'peminjaman');

        // redirect ke halaman data alat
        $this->session->set_flashdata('flash', ' dibatalkan.');
        redirect(base_url() . 'peminjaman');
    }

    public function peminjaman_selesai($id)
    {
        $where = array(
            'id_peminjaman' => $id
        );

        // ambil data alat pada peminjamam ber id
        $data = $this->m_data->edit_data($where, 'peminjaman')->row();
        $alat = $data->kode_alat;

        // mengembalikan status buku kembali tersedia (1)
        $w = array(
            'kode_alat' => $alat
        );

        $d = array(
            'status' => 1
        );
        $this->m_data->update_data($w, $d, 'alat');

        // mengubah status peminjaman menjadi selesai
        $this->m_data->update_data($where, array('status_peminjaman' => 1), 'peminjaman');

        redirect(base_url() . 'peminjaman');
    }

    public function peminjaman_laporan()
    {
        $data_session['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');

            // ambil data peminjaman berdasarkan tanggal mulai hingga tanggal sampai
            $data['peminjaman'] = $this->db->query("SELECT * FROM peminjaman, alat, peminjam WHERE peminjaman.kode_alat=alat.kode_alat AND peminjam.kode_peminjam=peminjaman.kode_peminjam AND date(tanggal_mulai) >= '$mulai' AND date(tanggal_mulai) <= '$sampai' ORDER BY id_peminjaman ASC")->result_array();
        } else {
            // ambil data peminjaman alat dari db dan diurutkan dari id peminjaman ke terkecil ke terbesar(asc )
            $data['peminjaman'] = $this->db->query("SELECT * FROM peminjaman, alat, peminjam WHERE peminjaman.kode_alat=alat.kode_alat AND peminjam.kode_peminjam=peminjaman.kode_peminjam ORDER BY id_peminjaman ASC")->result_array();
        }
        $data['judul'] = "Laporan Peminjaman Alat | SIPPK - Badan Penanggulangan Bencana Daerah Karawang";
        $this->load->view('admin/v_header', $data);
        $this->load->view('admin/v_peminjaman_laporan', $data);
        $this->load->view('admin/v_sidebar', $data_session);
        $this->load->view('admin/v_footer');
    }

    public function peminjaman_cetak()
    {

        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');
            // ambil data peminjaman berdasarkan tanggal mulai hingga tanggal sampai
            $data['judul'] = "Laporan Data Peminjaman Peralatan | BPBD - SIPPK";
            $data['peminjaman'] = $this->db->query("SELECT * FROM peminjaman, alat, peminjam WHERE peminjaman.kode_alat=alat.kode_alat AND peminjam.kode_peminjam=peminjaman.kode_peminjam AND date(tanggal_mulai) >= '$mulai' AND date(tanggal_mulai) <= '$sampai' ORDER BY id_peminjaman ASC")->result_array();

            $this->load->view('admin/v_peminjaman_cetak', $data);
        } else {
            redirect(base_url() . 'admin/peminjaman');
        }
    }
}
