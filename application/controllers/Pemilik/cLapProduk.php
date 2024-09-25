<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLapProduk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mTransaksi');
	}
	public function index()
	{
		$data = array(
			'transaksi' => $this->mTransaksi->transaksi()
		);
		$this->load->view('Pemilik/Layouts/head');
		$this->load->view('Pemilik/Layouts/navbar');
		$this->load->view('Pemilik/Layouts/aside');
		$this->load->view('Pemilik/vLapProduk', $data);
		$this->load->view('Pemilik/Layouts/footer');
	}
	public function cetak()
	{
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();


		$pdf->SetFont('Times', 'B', 14);
		// $pdf->Image('asset/logosmp.png', 3, 3, 40);
		$pdf->Cell(200, 5, 'KERIPIK PEDAS HIKMAH', 0, 1, 'C');
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(200, 20, 'Jln. Lingkungan Kamukten, Desa Cigugur Kecamatan Cigugu - Kuningan', 0, 0, 'C');

		$pdf->SetLineWidth(1);
		$pdf->Line(10, 43, 200, 43);
		$pdf->SetLineWidth(0);
		$pdf->Line(10, 42, 200, 42);
		$pdf->Cell(10, 30, '', 0, 1);

		$pdf->SetFont('Times', 'B', 14);
		$pdf->Cell(190, 10, 'LAPORAN TRANSAKSI PRODUK', 0, 1, 'C');


		$pdf->Cell(10, 15, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'No', 1, 0, 'C');
		$pdf->Cell(45, 7, 'Tanggal', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Nama Reseller', 1, 0, 'C');
		$pdf->Cell(80, 7, 'Total Pembayaran', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);
		$no = 1;
		$tot = 0;
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$dt = $this->db->query("SELECT * FROM `transaksi_bj` JOIN reseller ON transaksi_bj.id_reseller=reseller.id_reseller WHERE status='3' AND MONTH(tgl_transaksi) = '" . $bulan . "' AND YEAR(tgl_transaksi)='" . $tahun . "'")->result();
		foreach ($dt as $key => $value) {
			$tot += $value->total_pembayaran;
			$pdf->Cell(10, 7, $no++, 1, 0, 'C');
			$pdf->Cell(45, 7, $value->tgl_transaksi, 1, 0, 'C');
			$pdf->Cell(50, 7, $value->nama_reseller, 1, 0, 'C');
			$pdf->Cell(80, 7, 'Rp.' . number_format($value->total_pembayaran), 1, 1, 'R');
		}


		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(185, 7, 'Jumlah: Rp.' . number_format($tot), 1, 1, 'R');

		$pdf->SetFont('Times', '', 9);
		$pdf->Cell(40, 7, '', 0, 1, 'C');
		$pdf->Cell(40, 7, '', 0, 1, 'C');



		$pdf->Cell(95, 7, 'Kuningan, ' . date('j F Y'), 0, 1, 'C');

		$pdf->Cell(95, 7, 'Pemilik Keripik Pedas Hikmah', 0, 1, 'C');
		$pdf->Cell(95, 10, '', 0, 1, 'C');

		$pdf->SetFont('Times', 'B', 9);

		$pdf->Cell(95, 7, '(....................)', 0, 0, 'C');

		$pdf->Output();
	}
}

/* End of file cLapProduk.php */
