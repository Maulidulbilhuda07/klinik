<div class="text-center">
    Laporan Grafik Jumlah Pasien Berdasarkan Jenis Kelamin
</div>
<div style="width: 800px;margin: 0px auto;">
    <canvas id="myChart"></canvas>
</div>
<div class="text-center mt-5">
    Laporan Grafik Pendaftaran Pasien Perbulan
</div>
<div class="mb-5" style="margin: 0px auto;">
    <canvas id="cartpendapatan"></canvas>
</div>
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Laki-Laki", "Perempuan"],
            datasets: [{
                label: '',
                data: [
                    <?php
                    $jumlah_laki = mysqli_query($koneksi, "SELECT * from user where jk='Laki-laki'");
                    echo mysqli_num_rows($jumlah_laki);
                    ?>,
                    <?php
                    $jumlah_perempuan = mysqli_query($koneksi, "SELECT* from user where jk='Perempuan'");
                    echo mysqli_num_rows($jumlah_perempuan);
                    ?>,
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById("cartpendapatan").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Januari", "Februari", 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
                label: '',
                data: [
                    <?php
                    $jan = date("01");
                    $jumlah_jan = mysqli_query($koneksi, "SELECT * from pendaftaran where month(tgl_pendaftaran)='$jan'");
                    echo mysqli_num_rows($jumlah_jan);
                    ?>,
                    <?php
                    $feb = date("02");
                    $jumlah_feb = mysqli_query($koneksi, "SELECT * from pendaftaran where month(tgl_pendaftaran)='$feb'");
                    echo mysqli_num_rows($jumlah_feb);
                    ?>,
                    <?php
                    $mar = date("03");
                    $jumlah_mar = mysqli_query($koneksi, "SELECT * from pendaftaran where month(tgl_pendaftaran)='$mar'");
                    echo mysqli_num_rows($jumlah_mar);
                    ?>,
                    <?php
                    $april = date("04");
                    $jumlah_april = mysqli_query($koneksi, "SELECT * from pendaftaran where month(tgl_pendaftaran)='$april'");
                    echo mysqli_num_rows($jumlah_april);
                    ?>,
                    <?php
                    $mei = date("05");
                    $jumlah_mei = mysqli_query($koneksi, "SELECT * from pendaftaran where month(tgl_pendaftaran)='$mei'");
                    echo mysqli_num_rows($jumlah_mei);
                    ?>,
                    <?php
                    $juni = date("06");
                    $jumlah_juni = mysqli_query($koneksi, "SELECT * from pendaftaran where month(tgl_pendaftaran)='$juni'");
                    echo mysqli_num_rows($jumlah_juni);
                    ?>,
                    <?php
                    $juli = date("07");
                    $jumlah_juli = mysqli_query($koneksi, "SELECT * from pendaftaran where month(tgl_pendaftaran)='$juli'");
                    echo mysqli_num_rows($jumlah_juli);
                    ?>,
                    <?php
                    $agus = date("08");
                    $jumlah_agus = mysqli_query($koneksi, "SELECT * from pendaftaran where month(tgl_pendaftaran)='$agus'");
                    echo mysqli_num_rows($jumlah_agus);
                    ?>,

                    <?php
                    $sep = date("09");
                    $jumlah_sep = mysqli_query($koneksi, "SELECT * from pendaftaran where month(tgl_pendaftaran)='$sep'");
                    echo mysqli_num_rows($jumlah_sep);
                    ?>,
                    <?php
                    $ok = date("10");
                    $jumlah_ok = mysqli_query($koneksi, "SELECT * from pendaftaran where month(tgl_pendaftaran)='$ok'");
                    echo mysqli_num_rows($jumlah_ok);
                    ?>,
                    <?php
                    $nov = date("11");
                    $jumlah_nov = mysqli_query($koneksi, "SELECT * from pendaftaran where month(tgl_pendaftaran)='$nov'");
                    echo mysqli_num_rows($jumlah_nov);
                    ?>,
                    <?php
                    $des = date("12");
                    $jumlah_des = mysqli_query($koneksi, "SELECT * from pendaftaran where month(tgl_pendaftaran)='$des'");
                    echo mysqli_num_rows($jumlah_des);
                    ?>,
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>