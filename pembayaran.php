<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>profil</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bethany - v2.2.1
  * Template URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
   <div class="container">
      <div class="header-container d-flex align-items-center">
        <div class="logo mr-auto">
          <h1 class="text-light"><a href="uriclass.html"><span>Uriclass</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>
        <nav class="nav-menu d-none d-lg-block">
           <ul>
            <li class="active"><a href="profil.php"> PROFIL </a></li>
            <li><a href="pendaftaran.php"> PENDAFTARAN </a></li>
            <li><a href="jadwalkursus.php"> JADWAL </a></li>
            <li><a href="pengajar.php"> PENGAJAR </a></li>
            <li><a href="pembayaran.php"> PEMBAYARAN </a></li>
              </ul>
        </nav><!-- .nav-menu -->
      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->
    <main id="main">
    <section id="about" class="about">
      <div class="container">
        <?php  
// Deklarasi Variabel
$error_id_angsuran = "";
$error_tf_dari_bank = "";
$error_paket_kursus = "";
$error_tf_ke_bank = "";
$error_jmlh_bayar = "";
$error_tgl_bayar = "";
$error_status_pembayaran = "";
$error_no_peserta = "";

$id_angsuran = "";
$tf_dari_bank = "";
$paket_kursus = "";
$tf_ke_bank = "";
$jmlh_bayar = "";
$tgl_bayar = "";
$status_pembayaran = "";
$no_peserta = "";


$pesan_sukses="";

    //Id Angsuran
    if(empty($_POST["id_angsuran"])){
        $error_id_angsuran= "Id Angsuran Tidak Boleh Kosong";
    }
    else{
        $no_peserta = cek_input($_POST["id_angsuran"]);
        if(!is_numeric($id_angsuran)){
            $error_id_angsuran  = 'Id Angsuran Hanya Boleh Angka';
        }
    }

    //Tf Dari Bank
    if(empty($_POST["tf_dari_bank"])){
        $error_tf_dari_bank="Form tidak boleh kosong";
    }
    else{
        $tf_dari_bank=cek_input($_POST["tf_dari_bank"]);
        if(!preg_match("/^[a-zA-z ]*$/", $tf_dari_bank)){
            $error_tf_dari_bank=" Form Berupa Huruf";
        }
    }

    //Paket Kursus
    if(empty($_POST["paket_kursus"])){
        $error_paket_kursus="Paket tidak boleh kosong";
    }
    else{
        $paket_kursus=cek_input($_POST["paket_kursus"]);
        if(!preg_match("/^[a-zA-z ]*$/", $paket_kursus)){
            $error_paket_kursus=" Paket Hanya Boleh Huruf";
        }
    }

    //Tf Ke Bank
    if(empty($_POST["tf_ke_bank"])){
        $error_tf_ke_bank="Form tidak boleh kosong";
    }
    else{
        $tf_ke_bank=cek_input($_POST["tf_dari_bank"]);
        if(!preg_match("/^[a-zA-z ]*$/", $tf_ke_bank)){
            $error_tf_ke_bank=" Form Berupa Huruf";
        }
    }

    //Jumlah Bayar
    if(empty($_POST["jmlh_bayar"])){
        $error_jmlh_bayar=" Form tidak boleh kosong";
    }
    else{
        $jmlh_bayar=cek_input($_POST["jmlh_bayar"]);
        if(!is_numeric($jmlh_bayar)){
            $error_jmlh_bayar=" Form hanya boleh angka";
        }
    }

    // Tanggal Bayar
    if(empty($_POST["tgl_bayar"])){
        $error_tgl_bayar = "Tanggal Tidak Boleh Kosong";
    }
    else{
        $tgl_bayar = cek_input($_POST["tgl_bayar"]);
        $tgl_bayar = date('Y-m-d',strtotime($tgl_bayar));
    }

    //Status Pembayaran
    if(empty($_POST["status_pembayaran"])){
        $error_status_pembayaran="Form tidak boleh kosong";
    }
    else{
        $status_pembayaran=cek_input($_POST["status_pembayaran"]);
        if(!preg_match("/^[a-zA-z ]*$/", $status_pembayaran)){
            $error_status_pembayaran=" Form Berupa Huruf";
        }
    }

   //No peserta
    if(empty($_POST["no_peserta"])){
        $error_no_peserta= "No Peserta Tidak Boleh Kosong";
    }
    else{
        $no_peserta = cek_input($_POST["no_peserta"]);
        if(!is_numeric($no_peserta)){
            $error_no_peserta   = 'No Peserta Hanya Boleh Angka';
        }
    }


    // Menampilkan kondisi apabila tidak error maka data akan tersimpan
    if ($error_id_angsuran ==""&& $error_tf_dari_bank=="" && $error_paket_kursus =="" && $error_tf_ke_bank =="" && $error_jmlh_bayar=="" && $error_tgl_bayar=="" && $error_status_pembayaran=="" && $error_no_peserta=="") {
    
        include 'koneksi.php';

        // Memasukkan data ke tabel data_diri
        $query="INSERT INTO pendaftaran VALUES ('$id_angsuran', '$error_tf_dari_bank', '$error_paket_kursus', '$error_tf_ke_bank', '$error_jmlh_bayar', '$error_tgl_bayar', '$error_status_pembayaran', '$error_no_peserta')";
        mysqli_query($koneksi, $query);
        
        $pesan_sukses="Data Berhasil Disimpan";
    }
    else{
        $pesan_sukses="Data Gagal Disimpan";
    }


function cek_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<div class="row">
    <div class="col-md-9">
        <div class="card">
            <center>
            <div class="card-header">
                Form Pembayaran
            </div>
            </center>
            <br>
            <div class="card-body">
                <!-- Mengarahkan action ke halaman sendiri -->
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="form-group row">
                        <div class="form-group row">
                        <label for="no_peserta" class="col-sm-3 col-form-label">ID Angsuran</label>
                        <div class="col-sm-9">
                            <input type="text" name="id_angsuran" class="form-control <?php echo ($error_id_angsuran !="" ? "is_invalid" : ""); ?>" id="id_angsuran" placeholder="ID Angsuran" value="<?php echo $id_angsuran; ?>"><span class="warning"><?php echo $error_id_angsuran; ?></span>
                        </div>
                    </div>

                     <div class="form-group row">
                        <label for="tf_dari_bank" class="col-sm-3 col-form-label">Tf dari Bank</label>
                        <div class="col-sm-9">
                            <input type="text" name="tf_dari_bank" class="form-control <?php echo ($error_tf_dari_bank !="" ? "is_invalid" : ""); ?>" id="tf_dari_bank" placeholder="Tf dari Bank" value="<?php echo $tf_dari_bank; ?>"><span class="warning"><?php echo $error_tf_dari_bank; ?></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="paket_kursus" class="col-sm-3 col-form-label">Paket Kursus</label>
                        <div class="col-sm-9">
                            <input type="text" name="paket_kursus" class="form-control <?php echo ($error_paket_kursus !="" ? "is_invalid" : ""); ?>" id="paket_kursus" placeholder="Paket Kursus" value="<?php echo $paket_kursus; ?>"><span class="warning"><?php echo $error_paket_kursus; ?></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tf_ke_bank" class="col-sm-3 col-form-label">Tf ke Bank</label>
                        <div class="col-sm-9">
                            <input type="text" name="tf_ke_bank" class="form-control <?php echo ($error_tf_ke_bank !="" ? "is_invalid" : ""); ?>" id="tf_ke_bank" placeholder="Tf ke Bank" value="<?php echo $tf_ke_bank; ?>"><span class="warning"><?php echo $error_tf_ke_bank; ?></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jmlh_bayar" class="col-sm-3 col-form-label">Jumlah Bayar</label>
                        <div class="col-sm-9">
                            <input type="text" name="jmlh_bayar" class="form-control <?php echo ($error_jmlh_bayar !="" ? "is_invalid" : ""); ?>" id="jmlh_bayar" placeholder="Jumlah Bayar" value="<?php echo $jmlh_bayar; ?>"><span class="warning"><?php echo $error_jmlh_bayar; ?></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tgl_bayar" class="col-sm-3 col-form-label">Tanggal Bayar</label>
                        <div class="col-sm-9">
                            <input type="text" name="tgl_bayar" class="form-control <?php echo ($error_tgl_bayar !="" ? "is_invalid" : ""); ?>" id="tgl_bayar" placeholder="Tanggal Bayar" value="<?php echo $tgl_bayar; ?>"><span class="warning"><?php echo $error_tgl_bayar; ?></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status_pembayaran" class="col-sm-3 col-form-label">Status Pembayaran</label>
                        <div class="col-sm-9">
                            <input type="text" name="alamat" class="form-control <?php echo ($error_status_pembayaran !="" ? "is_invalid" : ""); ?>" id="status_pembayaran" placeholder="Status Pembayaran" value="<?php echo $status_pembayaran; ?>"><span class="warning"><?php echo $error_status_pembayaran; ?></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="form-group row">
                        <label for="no_peserta" class="col-sm-3 col-form-label">No Peserta</label>
                        <div class="col-sm-9">
                            <input type="text" name="no_peserta" class="form-control <?php echo ($error_no_peserta !="" ? "is_invalid" : ""); ?>" id="no_peserta" placeholder="No Peserta " value="<?php echo $no_peserta; ?>"><span class="warning"><?php echo $error_no_peserta; ?></span>
                        </div>
                    </div>

    
                            <button type="submit" class="btn btn-primary"> DAFTAR </button>
                        </div>
                    </div>
                </form>
            </div>
</div>
</div>
</div>

<?php  
// Menampilkan pesan sukses jika sudah berhasil menyimpan data
echo $pesan_sukses;

?>
<br>
<form method="POST" action="reportpdfuri.php">
    <button type="submit" name="lihat">Export to PDF</button>
</form>
<br>

 <form method="POST" action="reportchart.php">
    <button type="submit" name="lihat">Export To Grafik</button>
</form>
<br>

 <form method="POST" action="reportexcel.php">
    <button type="submit" name="lihat">Export To Excel</button>
</form>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>