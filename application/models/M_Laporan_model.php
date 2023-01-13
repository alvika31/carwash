<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Laporan_model extends CI_Model
{

    public function read()
    {
        $this->db->select('*');
        $this->db->from('tbl_cucimobil');
        $this->db->join('tbl_paket', 'tbl_paket.paket_id = tbl_cucimobil.paket_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function read_by($id)
    {
        $this->db->where('cucimobil_id', $id);
        $query = $this->db->get('tbl_cucimobil');
        return $query->row();
    }

    public function readJB()
    {
        $this->db->select(' tbl_cucimobil.cucimobil_id,
        tbl_cucimobil.cucimobil_idtransaksi,
        tbl_cucimobil.cucimobil_tanggal,
        tbl_cucimobil.cucimobil_nama,
        tbl_cucimobil.cucimobil_tipe,
        tbl_cucimobil.cucimobil_plat,
        tbl_cucimobil.cucimobil_harga,

                            tbl_paket.paket_nama,');
        $this->db->from('tbl_cucimobil');
        $this->db->join('tbl_paket', 'tbl_cucimobil.cucimobil_harga = tbl_paket.paket_nama');
        $query = $this->db->get();
        return $query->result();
    }

    function jumlahHarga()
    {
        $this->db->select('tbl_paket.paket_id');
        $this->db->from('tbl_cucimobil');
        $this->db->join('tbl_paket', 'tbl_paket.paket_id = tbl_cucimobil.paket_id');
        $this->db->select_sum('tbl_paket.paket_harga');
        $query = $this->db->get();
        return $query->result();
    }

    function jumlahHargaFilter($tanggal, $vbulan)
    {
        $this->db->select('tbl_paket.paket_id');
        $this->db->from('tbl_cucimobil');
        $this->db->join('tbl_paket', 'tbl_paket.paket_id = tbl_cucimobil.paket_id');
        $this->db->where('month(tbl_cucimobil.cucimobil_tanggal)', $vbulan);
        $this->db->where('year(tbl_cucimobil.cucimobil_tanggal)', $tanggal);
        $this->db->select_sum('tbl_paket.paket_harga');
        $query = $this->db->get();
        return $query->result();
    }

    function filterLaporan($tanggal, $vbulan)
    {
        $this->db->select('*');
        $this->db->from('tbl_cucimobil');
        $this->db->join('tbl_paket', 'tbl_paket.paket_id = tbl_cucimobil.paket_id');
        $this->db->where('month(tbl_cucimobil.cucimobil_tanggal)', $vbulan);
        $this->db->where('year(tbl_cucimobil.cucimobil_tanggal)', $tanggal);
        $result = $this->db->get();
        return $result;
    }
}
