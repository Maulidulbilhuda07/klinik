<?php
session_start();
include 'koneksi.php';
?>
<?php
if (empty($_SESSION['pegawai'])) {
  echo "<script language='JavaScript'>
 confirm('Silahkan Login Dulu.');
 document.location='login.php';
 </script>";
}
?>
<?php
if (!empty($_SESSION['pegawai'])) {
  $ambil = mysqli_query($koneksi, "SELECT *FROM pegawai WHERE id_pegawai='$_SESSION[pegawai]'");
  $user = mysqli_fetch_assoc($ambil);
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
  <script src="assets/chart.min.js"></script>
  <title>Maulidul Bilhuda Klinik</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container">
      <a class="navbar-brand" href="index.php">Maulidul Klinik</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <?php if ($user['status'] == "Admin") { ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Data Master
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="index.php?halaman=pasien">Pasien</a>
                <a class="dropdown-item" href="index.php?halaman=pengguna">Pengguna</a>
                <a class="dropdown-item" href="index.php?halaman=tindakan">Tindakan</a>
                <a class="dropdown-item" href="index.php?halaman=obat">Obat</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?halaman=pasien_terdaftar">Pendaftaran</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?halaman=transaksi">Transaction</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?halaman=pembayaran">Pembayaran</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="index.php?halaman=user" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Laporan
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="index.php?halaman=lap_pasien">Pasien</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?halaman=logout">Logout</a>
            </li>
          </ul>
        </div>
      <?php } else if ($user['status'] == "Kasir") { ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?halaman=pasien_terdaftar">Pendaftaran</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?halaman=pembayaran">Pembayaran</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="index.php?halaman=user" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Laporan
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="index.php?halaman=lap_pasien">Pasien</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?halaman=logout">Logout</a>
            </li>
          </ul>
        </div>
      <?php } else { ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="index.php?halaman=transaksi">Transaction</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="index.php?halaman=user" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Laporan
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="index.php?halaman=lap_pasien">Pasien</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?halaman=logout">Logout</a>
            </li>
          </ul>
        </div>
      <?php } ?>

    </div>
  </nav>
  <div class="container mt-5">

    <?php
    if (isset($_GET['halaman'])) {
      if ($_GET['halaman'] == "pasien") {
        include 'pasien.php';
      } elseif ($_GET['halaman'] == "edit_pasien") {
        include 'edit_pasien.php';
      } elseif ($_GET['halaman'] == "hapus_pasien") {
        include 'hapus_pasien.php';
      } elseif ($_GET['halaman'] == "tambah_pasien") {
        include 'tambah_pasien.php';
      } elseif ($_GET['halaman'] == "pengguna") {
        include 'pengguna.php';
      } elseif ($_GET['halaman'] == "tambah_pengguna") {
        include 'tambah_pengguna.php';
      } elseif ($_GET['halaman'] == "hapus_pengguna") {
        include 'hapus_pengguna.php';
      } elseif ($_GET['halaman'] == "edit_pengguna") {
        include 'edit_pengguna.php';
      } elseif ($_GET['halaman'] == "tindakan") {
        include 'tindakan.php';
      } elseif ($_GET['halaman'] == "tambah_tindakan") {
        include 'tambah_tindakan.php';
      } elseif ($_GET['halaman'] == "hapus_tindakan") {
        include 'hapus_tindakan.php';
      } elseif ($_GET['halaman'] == "edit_tindakan") {
        include 'edit_tindakan.php';
      } elseif ($_GET['halaman'] == "obat") {
        include 'obat.php';
      } elseif ($_GET['halaman'] == "tambah_obat") {
        include 'tambah_obat.php';
      } elseif ($_GET['halaman'] == "hapus_obat") {
        include 'hapus_obat.php';
      } elseif ($_GET['halaman'] == "edit_obat") {
        include 'edit_obat.php';
      } elseif ($_GET['halaman'] == "pendaftaran") {
        include 'pendaftaran.php';
      } elseif ($_GET['halaman'] == "tambah_pendaftaran") {
        include 'tambah_pendaftaran.php';
      } elseif ($_GET['halaman'] == "hapus_pendaftaran") {
        include 'hapus_pendaftaran.php';
      } elseif ($_GET['halaman'] == "edit_pendaftaran") {
        include 'edit_pendaftaran.php';
      } elseif ($_GET['halaman'] == "pasien_terdaftar") {
        include 'pasien_terdaftar.php';
      } elseif ($_GET['halaman'] == "transaksi") {
        include 'transaksi.php';
      } elseif ($_GET['halaman'] == "tindakan_obat") {
        include 'tindakan_obat.php';
      } elseif ($_GET['halaman'] == "add") {
        include 'add.php';
      } elseif ($_GET['halaman'] == "hapus_tmp") {
        include 'hapus_tmp.php';
      } elseif ($_GET['halaman'] == "add_obat") {
        include 'add_obat.php';
      } elseif ($_GET['halaman'] == "pembayaran") {
        include 'pembayaran.php';
      } elseif ($_GET['halaman'] == "input_pembayaran") {
        include 'input_pembayaran.php';
      } elseif ($_GET['halaman'] == "lap_pasien") {
        include 'lap_pasien.php';
      } elseif ($_GET['halaman'] == "logout") {
        include 'logout.php';
      }
    } else {
      include 'home.php';
    }

    ?>
  </div>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</body>

</html>