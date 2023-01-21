<?php 

class Dashboard extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        // cek session login, jika session status tidak sama dengan session admin_login, maka halaman akan redirect ke halaman login
        if ($this->session->userdata('status') != "admin_login") {
            redirect(base_url() . 'login?alert=belum_login');
        }
    }

    public function index(){
        $data_session['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        $data['judul'] = "Dashboard | SIPPK - Badan Penanggulangan Bencana Daerah";
        $data['title'] = "Dashboard";
        $this->load->view('admin/v_header', $data);
        $this->load->view('admin/v_sidebar', $data_session);
        $this->load->view('admin/v_dashboard', $data);
        $this->load->view('admin/v_footer');
    }
}

?>