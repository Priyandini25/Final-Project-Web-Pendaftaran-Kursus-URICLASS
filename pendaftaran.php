<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pendaftaran</title>
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
<body>

<?php  
// Deklarasi Variabel
$error_no_peserta = "";
$error_nik = "";
$error_nama_peserta = "";
$error_jk = "";
$error_tempat_lahir = "";
$error_tgl_lahir = "";
$error_alamat = "";
$error_telepon = "";
$error_email = "";
$error_pendidikan ="";


$no_peserta = "";
$nik = "";
$nama_peserta = "";
$jk = "";
$tempat_lahir = "";
$tgl_lahir = "";
$alamat = "";
$telepon = "";
$email = "";
$pendidikan ="" ;


$pesan_sukses="";

  //No peserta
  if(empty($_POST["no_peserta"])){
    $error_no_peserta= "No Peserta Tidak Boleh Kosong";
  }
  else{
    $no_peserta = cek_input($_POST["no_peserta"]);
    if(!is_numeric($no_peserta)){
      $error_no_peserta = 'No Peserta Hanya Boleh Angka';
    }
  }

  //NIK
  if(empty($_POST["nik"])){
    $error_nik = "NIK Tidak Boleh Kosong";
  }
  else{
    $nik = cek_input($_POST["nik"]);
    if(!is_numeric($nik)){
      $error_nik = "NIK Ujian Hanya Boleh Angka";
    }
    elseif(strlen($nik) !=16){
      $error_nik="Nomer Peserta Ujian Hanya 16 digit";
    }
  }

  //Nama Lengkap
  if(empty($_POST["nama_peserta"])){
    $error_nama="Nama tidak boleh kosong";
  }
  else{
    $nama=cek_input($_POST["nama_peserta"]);
    if(!preg_match("/^[a-zA-z ]*$/", $nama_peserta)){
      $error_nama_peserta=" Inputan Hanya Boleh Huruf dan Spasi";
    }
  }

  // Jenis Kelamin
  if(empty($_POST["jk"])){
        $error_jk="Jenis Kelamin tidak boleh kosong";
    }
    else{
        $jk=cek_input($_POST["jk"]);
        if(!preg_match("/^[a-zA-z ]*$/", $jk)){
            $error_jk=" Inputan Hanya Boleh Huruf dan Spasi";
        }
    }

  // Tempat Lahir
  if(empty($_POST["tempat_lahir"])){
        $error_tempat_lahir="Tempat Lahir tidak boleh kosong";
    }
    else{
        $tempat_lahir=cek_input($_POST["jk"]);
        if(!preg_match("/^[a-zA-z ]*$/", $jk)){
            $error_tempat_lahir=" Inputan Hanya Boleh Huruf dan Spasi";
        }
    }

  // Tanggal Lahir
    if(empty($_POST["tgl_lahir"])){
        $error_tgl_lahir = "Tanggal Tidak Boleh Kosong";
    }
    else{
        $tgl_lahir = cek_input($_POST["tgl_lahir"]);
        $tgl_lahir = date('Y-m-d',strtotime($tgl_lahir));
    }

  // Alamat 
  if(empty($_POST["alamat"])){
    $error_alamat=" Alamat Jalan tidak boleh kosong";
  }
  else{
    $alamat=cek_input($_POST["alamat"]);
  }

  //Telp
  if(empty($_POST["telepon"])){
    $error_telepon=" Telp tidak boleh kosong";
  }
  else{
    $telepon=cek_input($_POST["telepon"]);
    if(!is_numeric($telepon)){
      $error_telepon=" Telp hanya boleh angka";
    }
  }

  //Email
  if(empty($_POST["email"])){
    $error_email=" Email tidak boleh kosong";
  }
  else{
    $email=cek_input($_POST["email"]);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $error_email=" Format Email Invalid";
    }
  }

  //Pendidikan
  if(empty($_POST["pendidikan"])){
        $error_pendidikan="Pendidikan tidak boleh kosong";
    }
    else{
        $pendidikan=cek_input($_POST["pendidikan"]);
        if(!preg_match("/^[a-zA-z ]*$/", $jk)){
            $error_pendidikan=" Inputan Hanya Boleh Huruf dan Spasi";
        }
    }



  // Menampilkan kondisi apabila tidak error maka data akan tersimpan
  if ($error_no_peserta =="" && $error_nik=="" && $error_nama_peserta =="" && $error_jk=="" && $error_tempat_lahir=="" && $error_tgl_lahir=="" && $error_alamat=="" && $error_telepon=="" && $error_email=="" && $error_pendidikan=="") {
  
    include 'koneksi.php';

    // Memasukkan data ke tabel data_diri
    $query="INSERT INTO pendaftaran VALUES ('$no_peserta', '$nik', '$nama_peserta', '$jk', '$tempat_lahir', '$tgl_lahir', '$alamat', '$telepon', '$email', '$pendidikan')";
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
        Form Data Pribadi
      </div>
            </center>
      <br>
      <div class="card-body">
        <!-- Mengarahkan action ke halaman sendiri -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="form-group row">
            <div class="form-group row">
            <label for="no_peserta" class="col-sm-3 col-form-label">No Peserta</label>
            <div class="col-sm-9">
              <input type="text" name="no_peserta" class="form-control <?php echo ($error_no_peserta !="" ? "is_invalid" : ""); ?>" id="no_peserta" placeholder="No Peserta " value="<?php echo $no_peserta; ?>"><span class="warning"><?php echo $error_no_peserta; ?></span>
            </div>
          </div>

          <div class="form-group row">
            <label for="nik" class="col-sm-3 col-form-label">NIK</label>
            <div class="col-sm-9">
              <input type="text" name="nik" class="form-control <?php echo ($error_nik !="" ? "is_invalid" : ""); ?>" id="nik" placeholder="NIK" value="<?php echo $nik; ?>"><span class="warning"><?php echo $error_nik; ?></span>
            </div>
          </div>

          <div class="form-group row">
            <label for="nama_peserta" class="col-sm-3 col-form-label">Nama Lengkap</label>
            <div class="col-sm-9">
              <input type="text" name="nama_peserta" class="form-control <?php echo ($error_nama_peserta !="" ? "is_invalid" : ""); ?>" id="nama_peserta" placeholder="Nama Lengkap" value="<?php echo $nama_peserta; ?>"><span class="warning"><?php echo $error_nama_peserta; ?></span>
            </div>
          </div>

                    <div class="form-group row">
                        <label for="jk" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            <input type="text" name="jk" class="form-control <?php echo ($error_jk !="" ? "is_invalid" : ""); ?>" id="jk" placeholder="Jenis Kelamin" value="<?php echo $jk; ?>"><span class="warning"><?php echo $error_jk; ?></span>
                        </div>
                    </div>

          <div class="form-group row">
            <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
            <div class="col-sm-9">
              <input type="text" name="tempat_lahir" class="form-control <?php echo ($error_tempat_lahir !="" ? "is_invalid" : ""); ?>" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>"><span class="warning"><?php echo $error_tempat_lahir; ?></span>
            </div>
          </div>

          <div class="form-group row">
            <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-9">
              <input type="text" name="tgl_lahir" class="form-control <?php echo ($error_tgl_lahir !="" ? "is_invalid" : ""); ?>" id="tgl_lahir" placeholder="Tanggal Lahir" value="<?php echo $tgl_lahir; ?>"><label>Contoh: 23-06-2001</label><span class="warning"><?php echo $error_tgl_lahir; ?></span>
            </div>
          </div>

          <div class="form-group row">
            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-9">
              <input type="text" name="alamat" class="form-control <?php echo ($error_alamat !="" ? "is_invalid" : ""); ?>" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>"><span class="warning"><?php echo $error_alamat; ?></span>
            </div>
          </div>

          <div class="form-group row">
            <label for="telepon" class="col-sm-3 col-form-label">Telp. </label>
            <div class="col-sm-9">
              <input type="text" name="telepon" class="form-control <?php echo ($error_telepon !="" ? "is_invalid" : ""); ?>" id="telepon" placeholder="Telp. " value="<?php echo $telepon; ?>"><span class="warning"><?php echo $error_telepon; ?></span>
            </div>
          </div>

          <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
              <input type="text" name="email" class="form-control <?php echo ($error_email !="" ? "is_invalid" : ""); ?>" id="email" placeholder="Email" value="<?php echo $email; ?>"><span class="warning"><?php echo $error_email; ?></span>
            </div>
          </div>

                     <div class="form-group row">
                        <label for="pendidikan" class="col-sm-3 col-form-label">Pendidikan</label>
                        <div class="col-sm-9">
                            <input type="text" name="pendidikan" class="form-control <?php echo ($error_pendidikan !="" ? "is_invalid" : ""); ?>" id="pendidikan" placeholder="Pendidikan" value="<?php echo $pendidikan; ?>"><span class="warning"><?php echo $error_pendidikan ?></span>
                        </div>
                    </div>

                    <br>
          <div class="form-group row">
            <div class="col-sm-9">
              <button type="submit" class="btn btn-primary">DAFTAR</button>
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

 <form method="POST" action="grafikchart.php">
    <button type="submit" name="lihat">Export To Grafik</button>
</form>
<br>

 <form method="POST" action="reportdataexcel.php">
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

