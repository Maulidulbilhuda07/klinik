<?php
$ambil = mysqli_query($koneksi, "DELETE from pegawai where id_pegawai='$_GET[id]'");
echo "<script> alert('Data Telah  Terhapus');</script>";
echo "<script> location='index.php?halaman=pengguna';</script>";
