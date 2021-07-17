<?php
$ambil = mysqli_query($koneksi, "DELETE from obat where id_obat='$_GET[id]'");
echo "<script> alert('Data Telah  Terhapus');</script>";
echo "<script> location='index.php?halaman=obat';</script>";
