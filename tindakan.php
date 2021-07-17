<div class="d-flex justify-content-between mb-4">
    <h4>Data Tindakan </h4>
    <a href="index.php?halaman=tambah_tindakan" class="btn btn-primary">Tambah </a>
</div>
<div class="table-responsive">
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Tindakan</th>
                <th>Biaya</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php $ambil = mysqli_query($koneksi, "SELECT * FROM tindakan");
            while ($pecah = mysqli_fetch_array($ambil)) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $pecah["tindakan"] ?></td>
                    <td>Rp. <?= number_format($pecah["biaya"]) ?></td>
                    <td><a href="index.php?halaman=edit_tindakan&id=<?php echo $pecah['id_tindakan']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="index.php?halaman=hapus_tindakan&id=<?php echo $pecah['id_tindakan']; ?>" class="btn-danger btn"><i class="fas fa-trash-alt"></i></a>
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