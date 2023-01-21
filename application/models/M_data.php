<?php

class M_data extends CI_Model
{
    public function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    // Fungsi CRUD
    // Mengambil data di database
    public function get_data($table)
    {
        return $this->db->get($table);
    }

    // fungsi menginput data ke database
    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    // fungsi untuk mengedit data
    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    // fungsi untuk mengupdate datanya
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    //fungsi menghapus data
    public function delete_data($where, $table)
    {
        $this->db->delete($table, $where);
    }

    public function cari_admin()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('username', $keyword);
        return $this->db->get('admin')->result_array();
    }

    public function cari_user()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('username', $keyword);
        return $this->db->get('user')->result_array();
    }

    public function cari_alat()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('kode_alat', $keyword);
        $this->db->or_like('nama_alat', $keyword);
        $this->db->or_like('merk', $keyword);
        $this->db->or_like('spek', $keyword);
        $this->db->or_like('sumber', $keyword);
        return $this->db->get('alat')->result_array();
    }

    public function cari_peminjam()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('kode_peminjam', $keyword);
        $this->db->or_like('nama_peminjam', $keyword);
        $this->db->or_like('jabatan', $keyword);
        $this->db->or_like('instansi', $keyword);
        return $this->db->get('peminjam')->result_array();
    }

    public function cari_peminjaman()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('kode_alat', $keyword);
        $this->db->or_like('nama_alat', $keyword);
        $this->db->or_like('merk', $keyword);
        $this->db->or_like('spek', $keyword);
        $this->db->or_like('sumber', $keyword);
        return $this->db->get('peminjaman')->result_array();
    }
}
