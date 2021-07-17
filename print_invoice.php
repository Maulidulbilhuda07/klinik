<?php
session_start();
include 'koneksi.php';
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <title>Maulidul Bilhuda Klinik</title>
</head>

<body>
    <div class="container mt-5">
        <div class="text-center mt-5">
            <h3>Klinik Maulidul Bilhuda</h3>
            <h5>Jl. Suka-Suka Saya NO. 45 Payakumbuh, Sumatera Barat</h5>
            <h6>Nohp 0822-8464-1733</h6>
            <hr>
            </hr>
        </div>
        <?php $ambil = mysqli_query($koneksi, "SELECT *FROM solusi join obat on solusi.id_obat=obat.id_obat  join user on solusi.id_user=user.id_user join pegawai on solusi.id_pegawai=pegawai.id_pegawai join tindakan on solusi.id_tindakan=tindakan.id_tindakan join pendaftaran on solusi.id_pendaftaran=pendaftaran.id_pendaftaran WHERE pendaftaran.id_pendaftaran ='$_GET[id]' ");
        $pecah = mysqli_fetch_array($ambil) ?>
        <div class="d-flex justify-content-center mb-4 mt-4">
            <h4>Invoice Pembayaran <span class="text-danger"><?= $pecah['nama'] ?></span></h4>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="text-center">
                    <h6>Data Pasien</h6>
                </div>
                <table class="table">
                    <tr>
                        <td>Nama </td>
                        <td>:</td>
                        <td><?= $pecah['nama'] ?></td>
                    </tr>
                    <tr>
                        <td>Tindakan / Pelayanan </td>
                        <td>:</td>
                        <td><?= $pecah['tindakan'] ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Berobat </td>
                        <td>:</td>
                        <td><?= $pecah['tgl_pendaftaran'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama Dokter </td>
                        <td>:</td>
                        <th><?= $pecah['nama_pegawai'] ?></th>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <div class="text-center">
                    <h6>Solusi Atau Tindakan Yang DIberikan</h6>
                </div>
                <?= $pecah['solusi'] ?>
            </div>
        </div>
        <div class="d-flex justify-content-center mb-4">
            <h4>Data Obat Yang Diberikan </h4>
        </div>
        <div class="table-responsive">
            <table class="display table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Obat</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $tot = 0;
                    $ambil = mysqli_query($koneksi, "SELECT *FROM solusi join user on solusi.id_user=user.id_user  join obat on solusi.id_obat=obat.id_obat join pegawai on solusi.id_pegawai=pegawai.id_pegawai  join tindakan on solusi.id_tindakan=tindakan.id_tindakan join pendaftaran on solusi.id_pendaftaran=pendaftaran.id_pendaftaran WHERE pendaftaran.id_pendaftaran ='$_GET[id]' ");
                    while ($buy = mysqli_fetch_array($ambil)) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $buy["nama_obat"] ?></td>
                            <td>Rp. <?= number_format($buy["harga"]) ?></td>
                        </tr>
                    <?php
                        $tot += $buy['harga'];
                    } ?>
                <tfoot>
                    <th colspan="2">Total bayar</th>
                    <div class="form-group">
                        <input type="hidden" value="<?= $pecah['biaya'] + $tot ?>" name="total_bayar" class="form-control" id="total_bayar">
                        <th>Rp.<?= number_format($pecah['biaya'] + $tot) ?></th>
                </tfoot>
                <tfoot>
                    <th colspan="2">Biaya Konsultasi</th>
                    <th>Rp.<?= number_format($pecah['biaya']) ?></th>
                </tfoot>
</body>
</table>
</div>
</div>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script>
    window.print()
</script>
</body>

</html>