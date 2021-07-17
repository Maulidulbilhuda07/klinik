<div class="text-center mb-4">
    <h4>Form Tambah Data Obat</h4>
</div>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_obat">Nama Obat</label>
                <input type="text" name="nama_obat" class="form-control" id="nama_obat">
            </div>
            <div class="form-group">
                <label for="jenis">Jenis Obat</label>
                <input type="text" name="jenis" class="form-control" id="jenis">
            </div>
            <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" name="satuan" class="form-control" id="satuan">
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" name="harga" class="form-control" id="harga">
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" name="stok" class="form-control" id="stok">
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" class="form-control" id="gambar">
            </div>
            <button type="submit" class="btn btn-primary" name="simpan"><i class="fas fa-save"></i> Simpan</button>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
<?php
if (isset($_POST['simpan'])) {
    $nama = $_FILES['gambar']['name'];
    $lokasi = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($lokasi, "foto_obat/" . $nama);
    $ambil = mysqli_query($koneksi, "INSERT INTO obat SET nama_obat='$_POST[nama_obat]',jenis='$_POST[jenis]',satuan='$_POST[satuan]',harga='$_POST[harga]',stok='$_POST[stok]',gambar='$nama'");
    echo "<script>
    alert('Data  Berhasil Disimpan');
</script>";
    echo "<script>
    location = 'index.php?halaman=obat';
</script>";
}

?>