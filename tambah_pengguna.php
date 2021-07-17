<div class="text-center mb-4">
    <h4>Form Tambah Data Pengguna</h4>
</div>
<form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nama">Nama</label>
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
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" name="foto" class="form-control" id="foto">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" class="form-control" name="status">
                    <option value="Dokter">Dokter</option>
                    <option value="Admin">Admin</option>
                    <option value="Kasir">Kasir</option>
                </select>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" class="form-control" id="password">
            </div>
            <button type="submit" class="btn btn-primary" name="simpan"><i class="fas fa-save"></i> Simpan</button>
        </div>
    </div>
</form>
<?php
if (isset($_POST['simpan'])) {
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasi, "foto/" . $nama);
    $tgl_lahir = date('Y', strtotime($_POST["tgl_lahir"]));
    $tgl_now = date('Y');
    $umur = $tgl_now - $tgl_lahir;
    $ambil = mysqli_query($koneksi, "INSERT INTO pegawai SET nama_pegawai='$_POST[nama]',tgl_lahir='$_POST[tgl_lahir]',umur='$umur',foto='$nama',nohp='$_POST[nohp]',alamat='$_POST[alamat]',jk='$_POST[jk]',status='$_POST[status]',username='$_POST[username]',password='$_POST[password]'");
    echo "<script>
    alert('Data  Berhasil Disimpan');
</script>";
    echo "<script>
    location = 'index.php?halaman=pengguna';
</script>";
}

?>