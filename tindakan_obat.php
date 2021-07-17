   <?php
    $no = 1;
    $ambil = mysqli_query($koneksi, "SELECT *FROM pendaftaran join user on pendaftaran.id_user=user.id_user join pegawai on pendaftaran.id_pegawai=pegawai.id_pegawai  join tindakan on pendaftaran.id_tindakan=tindakan.id_tindakan where pendaftaran.id_pendaftaran='$_GET[id]' order by pendaftaran.tgl_pendaftaran ASC");
    $pecah = mysqli_fetch_array($ambil);
    ?>
   <div class="d-flex justify-content-center mb-4">
       <h4>Data Obat dan Tindakan Untuk Pasien</h4>
   </div>
   <table class="table">
       <tr>
           <th>Nama</th>
           <th>:</th>
           <td><?= $pecah['nama'] ?></td>
       </tr>
       <tr>
           <th>Periksaan</th>
           <th>:</th>
           <td><?= $pecah['tindakan'] ?></td>
       </tr>
   </table>
   <label for="">Pilih Obat</label>
   <div class="input-group mb-3">
       <input type="text" class="form-control" id="nama_obat" name="nama_obat" placeholder="Nama obat" aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
       <input type="hidden" class="form-control" id="id_obat" name="id_obat" placeholder="Nama Pasien" aria-label="Recipient's username" aria-describedby="basic-addon2">
       <div class="input-group-append">
           <button class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#exampleModalLong"><i class="fas fa-search"></i>Search</button>
       </div>
   </div>
   <div class="table-responsive mt-5 mb-5">
       <table class="display" style="width:100%">
           <thead>
               <tr>
                   <th>No</th>
                   <th>Nama</th>
                   <th>Action</th>
               </tr>
           </thead>
           <tbody>
               <?php $no = 1; ?>
               <?php $ambil = mysqli_query($koneksi, "SELECT * FROM tmp  join obat on tmp.id_obat=obat.id_obat");
                while ($pe = mysqli_fetch_array($ambil)) { ?>
                   <tr>
                       <td><?= $no++ ?></td>
                       <td><?= $pe["nama_obat"] ?></td>
                       <td>
                           <form method="POST" action="index.php?halaman=hapus_tmp">
                               <div class="form-group">
                                   <input type="hidden" value="<?= $_GET['id'] ?>" name="getid" class="form-control">
                                   <input type="hidden" value="<?= $pe['id_tmp'] ?>" name="id_tmp" class="form-control">
                                   <button type="submit" class="btn btn-danger" name="simpan"><i class="fas fa-trash"></i></button>
                               </div>
                           </form>
                       </td>
                   </tr>
               <?php } ?>
               </body>
       </table>
       <form method="POST" action="index.php?halaman=add_obat">
           <div class="form-group">
               <label for="solusi">Solusi </label>
               <textarea type="text" name="solusi" class="form-control" id="solusi"></textarea>
           </div>
           <?php $ambil = mysqli_query($koneksi, "SELECT * FROM tmp  join obat on tmp.id_obat=obat.id_obat");
            while ($tmp = mysqli_fetch_array($ambil)) { ?>
               <input type="hidden" value="<?= $tmp['id_obat'] ?>" name="id_obat[]" class="form-control" id="id_obat">
               <input type="hidden" value="<?= $pecah['id_user'] ?>" name="id_user" class="form-control" id="id_user">
               <input type="hidden" value="<?= $pecah['id_pegawai'] ?>" name="id_pegawai" class="form-control" id="id_pegawai">
               <input type="hidden" value="<?= $pecah['id_tindakan'] ?>" name="id_tindakan" class="form-control" id="id_tindakan">
               <input type="hidden" value="<?= $pecah['id_pendaftaran'] ?>" name="id_pendaftaran" class="form-control" id="id_pendaftaran">
           <?php } ?>
           <button class="btn btn-primary" type="submit">Simpan</button>
       </form>
   </div>
   <script>
       CKEDITOR.replace('solusi');
   </script>
   <!-- Modal -->
   <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLongTitle">Data Obat</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <div class="table-responsive">
                       <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                           <thead>
                               <tr>
                                   <th>No</th>
                                   <th>Name</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               <?php $no = 1; ?>
                               <?php $ambil = mysqli_query($koneksi, "SELECT * FROM obat ");
                                while ($obat = mysqli_fetch_array($ambil)) { ?>
                                   <tr>
                                       <td><?= $no++ ?></td>
                                       <td><?= $obat['nama_obat'] ?></td>
                                       <td class="text-center">
                                           <form method="POST" action="index.php?halaman=add">
                                               <div class="form-group">
                                                   <input type="hidden" value="<?= $_GET['id'] ?>" name="getid" class="form-control" id="id_obat">
                                                   <input type="hidden" value="<?= $pecah['id_pendaftaran'] ?>" name="id_pendaftaran" class="form-control" id="id_obat">
                                                   <input type="hidden" value="<?= $obat['id_obat'] ?>" name="id_obat" class="form-control" id="id_obat">
                                                   <button type="submit" class="btn btn-success" name="simpan"><i class="fas fa-check"></i></button>
                                               </div>
                                           </form>
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
           $('#example').DataTable();

       })
   </script>