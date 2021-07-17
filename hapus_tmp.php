<?php
$ambil = mysqli_query($koneksi, "DELETE from tmp where id_tmp='$_POST[id_tmp]'");
echo "<script> alert('Data Telah  Terhapus');</script>";
echo "<script> location = 'index.php?halaman=tindakan_obat&id=$_POST[getid]';</script>";
