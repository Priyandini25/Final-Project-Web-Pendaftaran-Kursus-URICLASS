<?php
include('koneksi.php'); // Koneksi ke database
$query = mysqli_query($koneksi,"select * from peserta"); // Mengambil data dari database
while($row = mysqli_fetch_array($query)){
	$no_peserta[] = $row['no_peserta'];
	$pendidikan[] = $row['pendidikan'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Grafik Bar URICLASS</title>
	<script type="text/javascript" src="Chart.js"></script> <!-- Deklarasi penggunaan Chartjs -->
</head>
<body>
	<div style="width: 800px;height: 800px">
		<canvas id="myChart"></canvas>
	</div>
 
 
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($pendidikan); ?>,
				datasets: [{
					label: 'Grafik Total Pendaftar URICLASS',
					data: <?php echo json_encode($no_peserta); ?>,
					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 2
					// Memberi warna chart
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>
 