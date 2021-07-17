<?php
$ambil = mysqli_query($koneksi, "DELETE from tindakan where id_tindakan='$_GET[id]'");
echo "<script> alert('Data Telah  Terhapus');</script>";
echo "<script> location='index.php?halaman=tindakan';</script>";
