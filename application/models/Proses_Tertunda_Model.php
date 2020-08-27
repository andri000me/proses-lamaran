<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proses_Tertunda_Model extends CI_Model
{
    public function tampil()
    {
        $query = $this->db->query("SELECT * FROM data_proses_tertunda");
        return $query->result();
    }

    function total_lamaran(){
        $query = $this->db->query(" SELECT COUNT(id_data_proses_tertunda) as total FROM data_proses_tertunda");
        return $query->row_array();
    }

    public function tambah_proses($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function ubah($id_data_proses_tertunda, $data_proses_tertunda)
    {
        $this->db->where('id_data_proses_tertunda', $id_data_proses_tertunda);
        $this->db->update('data_proses_tertunda', $data_proses_tertunda);
    }

    public function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}