<div class="d-flex justify-content-between mb-4">
    <h4>Data Obat </h4>
    <a href="index.php?halaman=tambah_obat" class="btn btn-primary">Tambah Obat</a>
</div>
<div class="table-responsive">
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Jenis Obat</th>
                <th>Stok</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php $ambil = mysqli_query($koneksi, "SELECT * FROM obat");
            while ($pecah = mysqli_fetch_array($ambil)) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $pecah["nama_obat"] ?></td>
                    <td><?= $pecah["harga"] ?></td>
                    <td><?= $pecah["jenis"] ?></td>
                    <td><?= $pecah["stok"] ?></td>
                    <td><img src="foto_obat/<?php echo $pecah['gambar']; ?>" width="100"></td>
                    <td><a href="index.php?halaman=edit_obat&id=<?php echo $pecah['id_obat']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="index.php?halaman=hapus_obat&id=<?php echo $pecah['id_obat']; ?>" class="btn-danger btn"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php } ?>
            </body>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>