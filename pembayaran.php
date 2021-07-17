<div class="d-flex justify-content-center mb-4">
    <h4>Data Transaksi Pembayaran Obat</h4>

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
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $ambil = mysqli_query($koneksi, "SELECT *FROM solusi join user on solusi.id_user=user.id_user join pegawai on solusi.id_pegawai=pegawai.id_pegawai  join tindakan on solusi.id_tindakan=tindakan.id_tindakan join pendaftaran on solusi.id_pendaftaran=pendaftaran.id_pendaftaran WHERE pendaftaran.status_pendaftaran !='Pending' GROUP BY pendaftaran.id_pendaftaran ");
            while ($pecah = mysqli_fetch_array($ambil)) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $pecah["nama"] ?></td>
                    <td><?= $pecah["tindakan"] ?></td>
                    <td><?= $pecah["tgl_pendaftaran"] ?></td>
                    <td><?= $pecah["nama_pegawai"] ?></td>
                    <td><?= $pecah["status_pendaftaran"] ?></td>
                    <td>
                        <?php
                        if ($pecah['status_pendaftaran'] == 'Dalam Proses Pembayaran') { ?>
                            <a href="index.php?halaman=input_pembayaran&id=<?php echo $pecah['id_pendaftaran']; ?>" class="btn-info btn"><i class="fas fa-file"></i></a>
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