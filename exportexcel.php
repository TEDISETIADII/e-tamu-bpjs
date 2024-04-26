<?php
include "koneksi.php";

// persiapan untuk excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Export Excel Data Pengunjung.xls");
header("Pragma: no-cache");
header("Expires:0");
?>

<table border="1">
    <thead>
        <tr>
            <th colspan="6"> Reapitulasi Data Pengunjung </th>
        </tr>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Pengunjung</th>
            <th>NIK</th>
            <th>No HP</th>
            <th>Keperluan</th>
            <th>Asal Instansi</th>
            <th>Bagian yang dituju</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $tgl1 = $_POST ['tanggala'];
            $tgl2 = $_POST ['tanggalb'];

            $tampil = mysqli_query($koneksi, "SELECT * FROM tamu where tanggal BETWEEN
            '$tgl1' and '$tgl2' order by tanggal asc");
            $no = 1;
            
            while($data = mysqli_fetch_array($tampil)) {
            ?> 
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['tanggal']?></td>
                    <td><?= $data['nama']?></td>
                    <td><?= $data['nik']?></td>
                    <td><?= $data['nope']?></td>
                    <td><?= $data['keperluan']?></td>
                    <td><?= $data['asalinstansi']?></td>
                    <td><?= $data['dituju']?></td>
                </tr>
        <?php } ?>
    </tbody>
</table>