<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proses_Model extends CI_Model
{
    public function tampil()
    {
        $query = $this->db->query("SELECT * FROM data_proses");
        return $query->result();
    }

    public function tampil_diterima()
    {
        $query = $this->db->query("SELECT * FROM data_proses WHERE status_kepastian='Diterima'");
        return $query->result();
    }

    public function tampil_menunggu()
    {
        $query = $this->db->query("SELECT * FROM data_proses WHERE status_kepastian='Menunggu'");
        return $query->result();
    }

    public function tampil_ditolak()
    {
        $query = $this->db->query("SELECT * FROM data_proses WHERE status_kepastian='Ditolak'");
        return $query->result();
    }

    public function tampil_tidak_ada_respon()
    {
        $query = $this->db->query("SELECT * FROM data_proses WHERE status_kepastian='Tidak Ada Respon'");
        return $query->result();
    }

    public function total_semua_lamaran(){
        $query = $this->db->query("SELECT COUNT(id_data_proses) as total FROM data_proses");
        return $query->row_array();
    }

    public function total_semua_diterima(){
        $query = $this->db->query("SELECT COUNT(id_data_proses) as total FROM data_proses WHERE status_kepastian='Diterima'");
        return $query->row_array();
    }

    public function total_semua_menunggu(){
        $query = $this->db->query("SELECT COUNT(id_data_proses) as total FROM data_proses WHERE status_kepastian='Menunggu'");
        return $query->row_array();
    }

    public function total_lamaran_ditolak(){
        $query = $this->db->query("SELECT COUNT(id_data_proses) as total FROM data_proses WHERE status_kepastian='Ditolak'");
        return $query->row_array();
    }

    public function total_lamaran_tidak_ada_respon(){
        $query = $this->db->query("SELECT COUNT(id_data_proses) as total FROM data_proses WHERE status_kepastian='Tidak Ada Respon'");
        return $query->row_array();
    }

    public function tambah_proses($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function ubah($id_data_proses, $data_proses)
    {
        $this->db->where('id_data_proses', $id_data_proses);
        $this->db->update('data_proses', $data_proses);
    }

    public function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}