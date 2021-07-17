<div class="text-center mb-4">
    <h4>Form Tambah Data Pasien</h4>
</div>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form method="POST">
            <div class="form-group">
                <label for="nama">Nama Pasien</label>
                <input type="text" name="nama" class="form-control" id="nama">
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir">
            </div>
            <div class="form-group">
                <label for="nohp">Nohp</label>
                <input type="text" name="nohp" class="form-control" id="nohp">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat">
            </div>
            <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                <select id="jk" class="form-control" name="jk">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="simpan"><i class="fas fa-save"></i> Simpan</button>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
<?php
if (isset($_POST['simpan'])) {
    $tgl_lahir = date('Y', strtotime($_POST["tgl_lahir"]));
    $tgl_now = date('Y');
    $umur = $tgl_now - $tgl_lahir;
    $ambil = mysqli_query($koneksi, "INSERT INTO user SET nama='$_POST[nama]',tgl_lahir='$_POST[tgl_lahir]',umur='$umur',nohp='$_POST[nohp]',alamat='$_POST[alamat]',jk='$_POST[jk]'");
    echo "<script>
    alert('Data  Berhasil Disimpan');
</script>";
    echo "<script>
    location = 'index.php?halaman=pasien';
</script>";
}

?>