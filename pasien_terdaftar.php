<div class="d-flex justify-content-between mb-4">
    <h4>Data Pendaftaran Pasien Tanggal <?= date('d-m-Y') ?></h4>
    <a href="index.php?halaman=pendaftaran" class="btn btn-primary">Pendaftaran</a>
</div>
<div class="table-responsive">
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Tindakan</th>
                <th>Tanggal Pendaftaran</th>
                <th>Dokter</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $ambil = mysqli_query($koneksi, 'SELECT *FROM pendaftaran join user on pendaftaran.id_user=user.id_user join pegawai on pendaftaran.id_pegawai=pegawai.id_pegawai  join tindakan on pendaftaran.id_tindakan=tindakan.id_tindakan order by pendaftaran.tgl_pendaftaran ASC');
            while ($pecah = mysqli_fetch_array($ambil)) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $pecah["nama"] ?></td>
                    <td><?= $pecah["tindakan"] ?></td>
                    <td><?= $pecah["tgl_pendaftaran"] ?></td>
                    <td><?= $pecah["nama_pegawai"] ?></td>
                    <td>
                        <?php
                        if ($pecah['status_pendaftaran'] == 'Pending') { ?>
                            <a href="index.php?halaman=hapus_pendaftaran&id=<?php echo $pecah['id_pendaftaran']; ?>" class="btn-danger btn"><i class="fas fa-trash-alt"></i></a>
                        <?php  } ?>

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