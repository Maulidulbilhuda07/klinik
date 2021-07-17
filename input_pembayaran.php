 <?php $ambil = mysqli_query($koneksi, "SELECT *FROM solusi join obat on solusi.id_obat=obat.id_obat  join user on solusi.id_user=user.id_user join pegawai on solusi.id_pegawai=pegawai.id_pegawai join tindakan on solusi.id_tindakan=tindakan.id_tindakan join pendaftaran on solusi.id_pendaftaran=pendaftaran.id_pendaftaran WHERE pendaftaran.id_pendaftaran ='$_GET[id]' ");
    $pecah = mysqli_fetch_array($ambil) ?>
 <div class="d-flex justify-content-center mb-4">
     <h4>Data Pembayaran <span class="text-danger"><?= $pecah['nama'] ?></span></h4>
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
     <table id="example" class="display table table-striped table-bordered" style="width:100%">
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
     <form method="POST" class="mt-4">
         <input type="hidden" value="<?= $pecah['biaya'] + $tot ?>" name="total_bayar" class="form-control" id="total_bayar">
         <div class="row">
             <div class="col-md-4">
                 <div class="form-group">
                     <label for="bayar">Bayar</label>
                     <input type="number" name="bayar" class="form-control" id="bayar">
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="form-group">
                     <label for="kembali">Kembali</label>
                     <input type="text" name="kembali" class="form-control" id="kembali" readonly>
                 </div>
             </div>
             <div class="col-md-4">
                 <button type="submit" name="simpan" class="btn btn-info mt-4"><i class="fas fa-save"></i> Simpan</button>
             </div>
         </div>
     </form>
 </div>
 <script>
     $(document).ready(function() {
         $('#bayar').keyup('input', function() {
             var total_bayar = parseInt($('#total_bayar').val());
             var bayar = parseInt($('#bayar').val());
             $('#kembali').val(parseInt(bayar) - parseInt(total_bayar))
         })
     })
 </script>
 <?php
    if (isset($_POST['simpan'])) {
        $id_tindakan = $pecah['id_tindakan'];
        $id_user = $pecah['id_tindakan'];
        $id_pegawai = $pecah['id_pegawai'];
        $id_pendaftaran = $pecah['id_pendaftaran'];
        $ambil = mysqli_query($koneksi, "INSERT INTO pembayaran SET id_tindakan='$id_tindakan',id_user='$id_user',id_pegawai='$id_pegawai',id_pendaftaran='$id_pendaftaran',total_bayar='$_POST[total_bayar]'");
        $ambil = mysqli_query($koneksi, "UPDATE pendaftaran set status_pendaftaran='Transaksi Selesai' where id_pendaftaran='$id_pendaftaran'");
        echo "<script>
        alert('Pembayaran Berhasil ');
    </script>";
        echo "<script>
        location = 'print_invoice.php?id=$id_pendaftaran';
    </script>";
    }
