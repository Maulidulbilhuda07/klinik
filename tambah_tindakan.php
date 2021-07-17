<div class="text-center mb-4">
    <h4>Form Tambah Data Pasien</h4>
</div>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form method="POST">
            <div class="form-group">
                <label for="tindakan">Tindakan</label>
                <input type="text" name="tindakan" class="form-control" id="tindakan">
            </div>
            <div class="form-group">
                <label for="biaya">Biaya</label>
                <input type="number" name="biaya" class="form-control" id="biaya">
            </div>
            <button type="submit" class="btn btn-primary" name="simpan"><i class="fas fa-save"></i> Simpan</button>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
<?php
if (isset($_POST['simpan'])) {
    $ambil = mysqli_query($koneksi, "INSERT INTO tindakan SET tindakan='$_POST[tindakan]',biaya='$_POST[biaya]'");
    echo "<script>
    alert('Data  Berhasil Disimpan');
</script>";
    echo "<script>
    location = 'index.php?halaman=tindakan';
</script>";
}

?>