<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Paket_model extends CI_Model {
    public function create()
    {
        $data = array (
            'paket_nama' => $this->input->post('paket_nama'),
            'paket_jeniskendaraan' => $this->input->post('paket_jeniskendaraan'),
            'paket_harga' => $this->input->post('paket_harga')
        );
        $this->db->insert('tbl_paket',$data);
    }
    
    public function read()
    {
        $query=$this->db->get('tbl_paket');
        return $query->result();
    }

    public function read_by($id)
    {
        $this->db->where('paket_id',$id);
        $query=$this->db->get('tbl_paket');
        return $query->row();
    }



    public function update($id)
    {
        $data = array (
            'paket_nama' => $this->input->post('paket_nama'),
            'paket_jeniskendaraan' => $this->input->post('paket_jeniskendaraan'),
            'paket_harga' => $this->input->post('paket_harga')
        );
        $this->db->where('paket_id',$id);
        $this->db->update('tbl_paket',$data);
    }

    public function delete($id)
    {
        $this->db->where('paket_id',$id);
        $this->db->delete('tbl_paket');
    }
}
