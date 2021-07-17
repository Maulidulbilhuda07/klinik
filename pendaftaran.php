<div class="d-flex justify-content-between mb-4">
    <div></div>
    <h4>Form Pendaftaran Pasien </h4>
    <a href="index.php?halaman=tambah_pasien" class="btn btn-primary">Tambah Pasien</a>
</div>
<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <form method="POST">
            <label for="">Nama Pasien</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pasien" aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
                <input type="hidden" class="form-control" id="id_user" name="id_user" placeholder="Nama Pasien" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#exampleModalLong"><i class="fas fa-search"></i>Search</button>
                </div>
            </div>
            <label for="">Nama Dokter</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Nama Dokter" aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
                <input type="hidden" class="form-control" id="id_pegawai" name="id_pegawai" placeholder="Nama Pasien" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#dokter"><i class="fas fa-search"></i>Search</button>
                </div>
            </div>
            <div class="form-group">
                <label for="tindakan">Tindakan </label>
                <select id="tindakan" class="form-control" name="id_tindakan">
                    <option>---Pilih---</option>
                    <?php $ambil = mysqli_query($koneksi, "SELECT * FROM tindakan");
                    while ($tindakan = mysqli_fetch_array($ambil)) { ?>
                        <option value="<?= $tindakan['id_tindakan'] ?>"><?= $tindakan['tindakan'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tgl_pendaftaran">Tanggal Pendaftaran</label>
                <input type="date" name="tgl_pendaftaran" class="form-control" id="tgl_pendaftaran">
            </div>
            <button name="simpan" class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Daftar</button>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Data Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php $ambil = mysqli_query($koneksi, "SELECT * FROM user where status ='Pasien'");
                            while ($pecah = mysqli_fetch_array($ambil)) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $pecah['nama'] ?></td>
                                    <td class="text-center">
                                        <button id="set_data" data-nama="<?= $pecah['nama'] ?>" data-id_user="<?= $pecah['id_user'] ?>" class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>
                                    </td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="dokter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Data Doter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php $ambil = mysqli_query($koneksi, "SELECT * FROM pegawai where status ='Dokter'");
                            while ($pecah = mysqli_fetch_array($ambil)) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $pecah['nama_pegawai'] ?></td>
                                    <td class="text-center">
                                        <button id="set_data2" data-nama_pegawai="<?= $pecah['nama_pegawai'] ?>" data-id_pegawai="<?= $pecah['id_pegawai'] ?>" class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>
                                    </td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(document).on('click', '#set_data', function() {
            var nama = $(this).data('nama')
            $('#nama').val(nama);
            var id_user = $(this).data('id_user')
            $('#id_user').val(id_user);
            $('#exampleModalLong').modal('hide');
        })
        $(document).on('click', '#set_data2', function() {
            var nama_pegawai = $(this).data('nama_pegawai')
            $('#nama_pegawai').val(nama_pegawai);
            var id_pegawai = $(this).data('id_pegawai')
            $('#id_pegawai').val(id_pegawai);
            $('#dokter').modal('hide');
        })
    })
</script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<?php
if (isset($_POST['simpan'])) {
    $ambil = mysqli_query($koneksi, "INSERT INTO pendaftaran SET id_user='$_POST[id_user]',id_pegawai='$_POST[id_pegawai]',id_tindakan='$_POST[id_tindakan]',tgl_pendaftaran='$_POST[tgl_pendaftaran]'");
    echo "<script>
    alert('Data  Berhasil Disimpan');
</script>";
    echo "<script>
    location = 'index.php?halaman=pasien_terdaftar';
</script>";
}

?>