<div class="d-flex justify-content-between mb-4">
    <h4>Data </h4>
    <a href="index.php?halaman=tambah_pasien" class="btn btn-primary">Tambah Pasien</a>
</div>
<div class="table-responsive">
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Nohp</th>
                <th>Status</th>
                <th>Jenis Kelamin</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php $ambil = mysqli_query($koneksi, "SELECT * FROM user where status ='Pasien'");
            while ($pecah = mysqli_fetch_array($ambil)) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $pecah["nama"] ?></td>
                    <td><?= $pecah["tgl_lahir"] ?></td>
                    <td><?= $pecah["umur"] ?></td>
                    <td><?= $pecah["alamat"] ?></td>
                    <td><?= $pecah["nohp"] ?></td>
                    <td><?= $pecah["status"] ?></td>
                    <td><?= $pecah["jk"] ?></td>
                    <td><a href="index.php?halaman=edit_pasien&id=<?php echo $pecah['id_user']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="index.php?halaman=hapus_pasien&id=<?php echo $pecah['id_user']; ?>" class="btn-danger btn"><i class="fas fa-trash-alt"></i></a>
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