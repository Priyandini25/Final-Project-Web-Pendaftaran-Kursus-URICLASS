<?php  
include ('koneksi.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi, "SELECT *FROM pembayaran");
$html = '<center><h3>Daftar Nama Siswa</h3></center><br><br/><hr/><br>';
$html .= '<table border="1" width="100%">
<tr>
<th>No. </th>
<th>Id Angsuran</th>
<th>Tf dari Bank</th>
<th>Paket Kursus</th>
<th>Tf ke Bank</th>
<th>Jumlah Bayar</th>
<th>Tanggal Bayar</th>
<th>Status Pembayaran</th>
<th>No Peserta</th>
<th>Pendidikan</th>
</tr>';
$no = 1;
while ($row = mysqli_fetch_array($query)) 
{
$html .= "<tr>
<td>".$no."</td>
<td>".$row['id_angsuran']."</td>
<td>".$row['tf_dari_bank']."</td>
<td>".$row['paket_kursus']."</td>
<td>".$row['tf_ke_bank']."</td>
<td>".$row['jmlh_bayar']."</td>
<td>".$row['tgl_bayar']."</td>
<td>".$row['status_pembayaran']."</td>
<td>".$row['no_peserta']."</td>
</tr>";
$no++;
}
$html .= "<html>";
$dompdf->loadhtml($html);
// Menyetting ukuran dan orientasi kertas
$dompdf->setPaper('A1','potrait');
//Merendering dari HTML ke PDF
$dompdf->render();
// Melakukan output file PDF
$dompdf->stream('Laporan Pembayaran Siswa.pdf');
?>