<?php  
include ('koneksi.php');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet -> getActiveSheet();
$sheet -> setCellValue('A1','No.');
$sheet -> setCellValue('B1','Id Angsuran');
$sheet -> setCellValue('C1','Tf dari Bank');
$sheet -> setCellValue('D1','Paket Kursus');
$sheet -> setCellValue('E1','Tf ke Bank');
$sheet -> setCellValue('F1','Jumlah Bayar');
$sheet -> setCellValue('G1','Tanggal Bayar');
$sheet -> setCellValue('H1','Status Pembayaran');
$sheet -> setCellValue('I1','No Peserta');

$query = mysqli_query($koneksi, "SELECT *FROM pembayaran");
$i = 2;
$no = 1;
while ($row = mysqli_fetch_array($query)) {
$sheet -> setCellValue('A'.$i, $no++);
$sheet -> setCellValue('B'.$i, $row['id_angsuran']);
$sheet -> setCellValue('C'.$i, $row['tf_dari_bank']);
$sheet -> setCellValue('D'.$i, $row['paket_kursus']);
$sheet -> setCellValue('E'.$i, $row['tf_ke_bank']);
$sheet -> setCellValue('F'.$i, $row['jmlh_bayar']);
$sheet -> setCellValue('G'.$i, $row['tgl_bayar']);
$sheet -> setCellValue('H'.$i, $row['status_pembayaran']);
$sheet -> setCellValue('I'.$i, $row['no_peserta']);
$i++;
}

$styleArray = [
			'borders' => [
				'allBorders'=>[
					'borderStyle'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],

		];
$i =$i -1;
$sheet->getStyle('A1:D'.$i)->applyFromArray($styleArray);

$writer = new Xlsx($spreadsheet);
$writer->save('Report Data Pembayaran Siswa.xlsx');
?>