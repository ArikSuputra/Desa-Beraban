<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'config/autoload.php'; // Perhatikan penyesuaian jalur jika menggunakan struktur direktori standar CodeIgniter

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Fpdf\Fpdf;

class Claporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mlaporan');
    }

    private function generatePDF($title, $data)
    {
        $pdf = new Fpdf();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(40, 10, $title);

        $pdf->SetFont('Arial', '', 12);
        foreach ($data as $row) {
            $pdf->Ln();
            foreach ($row as $column) {
                $pdf->Cell(40, 10, $column);
            }
        }
        $pdf->Output('D', $title . '.pdf');
    }

    private function generateExcel($title, $data)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle($title);

        $rowNumber = 1;
        foreach ($data as $row) {
            $columnNumber = 1;
            foreach ($row as $column) {
                $sheet->setCellValueByColumnAndRow($columnNumber++, $rowNumber, $column);
            }
            $rowNumber++;
        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $title . '.xlsx"');
        $writer->save('php://output');
    }

    public function informasiumum()
    {
        $data = $this->Mlaporan->getInformasiUmum();
        $this->load->view('Admin/laporan', ['data' => $data, 'title' => 'Laporan Informasi Umum']);
    }

    public function objekwisata()
    {
        $data = $this->Mlaporan->getObjekWisata();
        $this->load->view('Admin/laporan', ['data' => $data, 'title' => 'Laporan Objek Wisata']);
    }

    public function penginapan()
    {
        $data = $this->Mlaporan->getPenginapan();
        $this->load->view('Admin/laporan', ['data' => $data, 'title' => 'Laporan Penginapan']);
    }

    public function pengguna()
    {
        $data = $this->Mlaporan->getPengguna();
        $this->load->view('Admin/laporan', ['data' => $data, 'title' => 'Laporan Pengguna']);
    }

    public function transaksi()
    {
        $data = $this->Mlaporan->getTransaksi();
        $this->load->view('Admin/laporan', ['data' => $data, 'title' => 'Laporan Transaksi']);
    }

    public function hargatiket()
    {
        $data = $this->Mlaporan->getHargaTiket();
        $this->load->view('Admin/laporan', ['data' => $data, 'title' => 'Laporan Harga Tiket']);
    }

    public function tiket()
    {
        $data = $this->Mlaporan->getTiket();
        $this->load->view('Admin/laporan', ['data' => $data, 'title' => 'Laporan Tiket']);
    }

    public function pdf($type)
    {
        $data = $this->Mlaporan->{"get" . ucfirst($type)}();
        $this->generatePDF('Laporan ' . ucfirst($type), $data);
    }

    public function excel($type)
    {
        $data = $this->Mlaporan->{"get" . ucfirst($type)}();
        $this->generateExcel('Laporan ' . ucfirst($type), $data);
    }
}
