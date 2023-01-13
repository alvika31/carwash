<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Cucimobil_model');
        $this->load->model('M_Laporan_model');
        $this->load->model('M_Paket_model');
        $this->load->library('Pdf');
        if (!$this->session->userdata('user_username')) redirect('C_login');
    }

    public function index()
    {
        $data = [
            'cucimobil' => $this->M_Cucimobil_model->read(),
            'total' => $this->M_Cucimobil_model->jumlahHarga(),
        ];

        $this->load->view('template/header');
        $this->load->view('laporan/V_listlaporan', $data);
        $this->load->view('template/footer');
    }


    function do_export()
    {
        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $pdf = new FPDF('L', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 7, 'LAPORAN TRANSAKSI CUCI MOBIL', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 6, 'No', 1, 0, 'C');
        $pdf->Cell(40, 6, 'ID Transaksi', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Tanggal', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Nama Pelanggan', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Jenis Kendaraan', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Nomor Plat', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Jenis Paket', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Harga', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);



        $no = 0;

        $this->db->select('*');
        $this->db->from('tbl_cucimobil');
        $this->db->join('tbl_paket', 'tbl_paket.paket_id = tbl_cucimobil.paket_id');

        $trans = $this->db->get()->result();

        foreach ($trans as $data) {
            $no++;
            $pdf->Cell(10, 6, $no, 1, 0, 'C');
            $pdf->Cell(40, 6, $data->cucimobil_idtransaksi, 1, 0);
            $pdf->Cell(40, 6, $data->cucimobil_tanggal, 1, 0);
            $pdf->Cell(40, 6, $data->cucimobil_nama, 1, 0);
            $pdf->Cell(40, 6, $data->cucimobil_tipe, 1, 0);
            $pdf->Cell(40, 6, $data->cucimobil_plat, 1, 0);
            $pdf->Cell(40, 6, $data->paket_nama, 1, 0);
            $pdf->Cell(40, 6, $data->paket_harga, 1, 1);
        }

        $pdf->SetFont('Arial', 'B', 12);

        $this->db->select('tbl_paket.paket_id');
        $this->db->from('tbl_cucimobil');
        $this->db->join('tbl_paket', 'tbl_paket.paket_id = tbl_cucimobil.paket_id');
        $this->db->select_sum('tbl_paket.paket_harga');
        $total = $this->db->get()->result();

        foreach ($total as $total) {

            $pdf->Cell(0, 7, 'Total Pendapatan:', 0, 1, 'C');
            $pdf->Cell(0, 7,  $total->paket_harga,  0, 1, 'C');
        }
        $pdf->Output();
    }

    function filter()
    {
        if (!$this->session->userdata('user_username')) redirect('C_login');
        $tanggal = $this->input->post('cucimobil_tanggal');
        $vbulan = date("m", strtotime($tanggal));

        $data = [
            'laporan' => $this->M_Laporan_model->filterLaporan($tanggal, $vbulan)->result(),
            'total' => $this->M_Laporan_model->jumlahHargaFilter($tanggal, $vbulan),
            'tanggal_filter' => $this->input->post('cucimobil_tanggal'),
        ];


        $this->load->view('template/header');
        $this->load->view('laporan/V_filter', $data);
        $this->load->view('template/footer');
    }
}
