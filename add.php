<?php if (isset($_POST['simpan'])) {
    $ambil = mysqli_query($koneksi, "INSERT INTO tmp SET id_obat='$_POST[id_obat]',id_pendaftaran='$_POST[id_pendaftaran]'");
    echo "<script>
    location = 'index.php?halaman=tindakan_obat&id=$_POST[getid]';
</script>";
}
