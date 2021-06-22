<?php  
include ('koneksi.php');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet -> getActiveSheet();
$sheet -> setCellValue('A1','No');
$sheet -> setCellValue('B1','No Peserta');
$sheet -> setCellValue('C1','NIK');
$sheet -> setCellValue('D1','Nama Lengkap');
$sheet -> setCellValue('E1','Jenis Kelamin');
$sheet -> setCellValue('F1','Tempat Lahir');
$sheet -> setCellValue('G1','Tanggal Lahir');
$sheet -> setCellValue('H1','Alamat');
$sheet -> setCellValue('I1','Telp. ');
$sheet -> setCellValue('J1','Email');
$sheet -> setCellValue('K1','Pendidikan');

$query = mysqli_query($koneksi, "SELECT *FROM peserta");
$i = 2;
$no = 1;
while ($row = mysqli_fetch_array($query)) {
$sheet -> setCellValue('A'.$i, $no++);
$sheet -> setCellValue('B'.$i, $row['no_peserta']);
$sheet -> setCellValue('C'.$i, $row['nik']);
$sheet -> setCellValue('D'.$i, $row['nama_peserta']);
$sheet -> setCellValue('E'.$i, $row['jk']);
$sheet -> setCellValue('F'.$i, $row['tempat_lahir']);
$sheet -> setCellValue('G'.$i, $row['tgl_lahir']);
$sheet -> setCellValue('H'.$i, $row['alamat']);
$sheet -> setCellValue('I'.$i, $row['telepon']);
$sheet -> setCellValue('J'.$i, $row['email']);
$sheet -> setCellValue('K'.$i, $row['pendidikan']);
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
$writer->save('Report Data Siswa.xlsx');
?>