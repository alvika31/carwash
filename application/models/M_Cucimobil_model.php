<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Cucimobil_model extends CI_Model
{
    public function create()
    {
        $data = array(
            'cucimobil_idtransaksi' => $this->input->post('cucimobil_idtransaksi'),
            'cucimobil_tanggal' => $this->input->post('cucimobil_tanggal'),
            'cucimobil_nama' => $this->input->post('cucimobil_nama'),
            'cucimobil_tipe' => $this->input->post('cucimobil_tipe'),
            'cucimobil_plat' => $this->input->post('cucimobil_plat'),
            'paket_id' => $this->input->post('paket_id')
        );
        $this->db->insert('tbl_cucimobil', $data);
    }

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



    public function update($id)
    {
        $data = array(
            'cucimobil_idtransaksi' => $this->input->post('cucimobil_idtransaksi'),
            'cucimobil_tanggal' => $this->input->post('cucimobil_tanggal'),
            'cucimobil_nama' => $this->input->post('cucimobil_nama'),
            'cucimobil_tipe' => $this->input->post('cucimobil_tipe'),
            'cucimobil_plat' => $this->input->post('cucimobil_plat'),
            'cucimobil_harga' => $this->input->post('cucimobil_harga')
        );
        $this->db->where('cucimobil_id', $id);
        $this->db->update('tbl_cucimobil', $data);
    }

    public function delete($id)
    {
        $this->db->where('cucimobil_id', $id);
        $this->db->delete('tbl_cucimobil');
    }

    function do_update($data, $where)
    {
        $this->db->where($where);
        $this->db->update('tbl_cucimobil', $data);
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
}
