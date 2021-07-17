<?php
$ambil = mysqli_query($koneksi, "DELETE from pendaftaran where id_pendaftaran='$_GET[id]'");
echo "<script> alert('Data Telah  Terhapus');</script>";
echo "<script> location='index.php?halaman=pasien_terdaftar';</script>";
