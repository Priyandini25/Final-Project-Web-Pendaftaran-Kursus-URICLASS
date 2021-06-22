<?php  
include ('koneksi.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi, "SELECT *FROM peserta");
$html = '<center><h3>Daftar Nama Siswa</h3></center><br><br/><hr/><br>';
$html .= '<table border="1" width="100%">
<tr>
<th>No. </th>
<th>No Peserta</th>
<th>NIK</th>
<th>Nama Peserta</th>
<th>Jenis Kelamin</th>
<th>Tempat Lahir</th>
<th>Tgl Lahir</th>
<th>Alamat</th>
<th>Telepon</th>
<th>Pendidikan</th>
</tr>';
$no = 1;
while ($row = mysqli_fetch_array($query)) 
{
$html .= "<tr>
<td>".$no."</td>
<td>".$row['no_peserta']."</td>
<td>".$row['nik']."</td>
<td>".$row['nama_peserta']."</td>
<td>".$row['jk']."</td>
<td>".$row['tempat_lahir']."</td>
<td>".$row['tgl_lahir']."</td>
<td>".$row['alamat']."</td>
<td>".$row['telepon']."</td>
<td>".$row['email']."</td>
<td>".$row['pendidikan']."</td>
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
$dompdf->stream('laporandata_siswa.pdf');
?>