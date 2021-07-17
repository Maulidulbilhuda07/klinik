  <?php
  $ambil = mysqli_query($koneksi, "SELECT *FROM tindakan where id_tindakan='$_GET[id]'");
  $pecah = mysqli_fetch_array($ambil)
  ?>
  <div class="text-center mb-4">
    <h4>Form Edit Data Tindakan</h4>
  </div>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <form method="POST">
        <div class="form-group">
          <label for="tindakan">Tindakan</label>
          <input type="text" value="<?= $pecah['tindakan'] ?>" name="tindakan" class="form-control" id="tindakan">
        </div>
        <div class="form-group">
          <label for="biaya">Biaya</label>
          <input type="number" value="<?= $pecah['biaya'] ?>" name="biaya" class="form-control" id="biaya">
        </div>
        <button type="submit" class="btn btn-primary" name="simpan"><i class="fas fa-save"></i> Simpan</button>
      </form>
    </div>
    <div class="col-md-3"></div>
  </div>
  <?php
  if (isset($_POST['simpan'])) {

    $ambil = mysqli_query($koneksi, "UPDATE tindakan SET tindakan='$_POST[tindakan]', biaya='$_POST[biaya]'WHERE id_tindakan='$_GET[id]'");
    echo "<script>
      alert('Data  Berhasil Disimpan');
  </script>";
    echo "<script>
      location = 'index.php?halaman=tindakan';
  </script>";
  }

  ?>