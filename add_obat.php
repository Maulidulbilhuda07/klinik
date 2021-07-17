<?php
$id_obat = $_POST['id_obat'];
$count = count($id_obat);
for ($i = 0; $i < $count; $i++) {
    $ambil = mysqli_query($koneksi, "INSERT INTO solusi SET id_obat='$id_obat[$i]', id_user='$_POST[id_user]', id_pegawai='$_POST[id_pegawai]', id_tindakan='$_POST[id_tindakan]', id_pendaftaran='$_POST[id_pendaftaran]', solusi='$_POST[solusi]'");
    $ambil = mysqli_query($koneksi, "DELETE from tmp where id_pendaftaran='$_POST[id_pendaftaran]'");
    $ambil = mysqli_query($koneksi, "UPDATE pendaftaran set status_pendaftaran='Dalam Proses Pembayaran' where id_pendaftaran='$_POST[id_pendaftaran]'");
    echo "<script>
        alert('Data  Berhasil Disimpan');
    </script>";
    echo "<script>
        location = 'index.php?halaman=transaksi';
    </script>";
}
