<?php
$ambil = mysqli_query($koneksi, "DELETE from user where id_user='$_GET[id]'");
echo "<script> alert('Data Telah  Terhapus');</script>";
echo "<script> location='index.php?halaman=pasien';</script>";
