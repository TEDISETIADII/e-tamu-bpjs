    <!-- panggil file header -->
    <?php include "header.php"; ?>
    <?php if($_SESSION['role'] == "User") { ?>

        <p>Admin Khusus</p>

        <?php } ?>
        <!-- DataTales Example -->
        <div class="row mt-4"></div>
        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Data Pengunjung Hari Ini [<?=
                            date('d-m-Y')?>]</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                <a href="#statistik" class="btn btn-success nav-link"><i class='far fa-caret-square-down'></i> Statistik Pengunjung</a>
                                    
                                    
                                </div>
                            </div>


                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nama Pengunjung</th>
                                            <th>NIK</th>
                                            <th>No HP</th>
                                            <th>Keperluan</th>
                                            <th>Asal Instansi</th>
                                            <th>Bagian yang dituju</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nama Pengunjung</th>
                                            <th>NIK</th>
                                            <th>No HP</th>
                                            <th>Keperluan</th>
                                            <th>Asal Instansi</th>
                                            <th>Bagian yang dituju</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $tgl = date('Y-m-d'); //2024-03-21
                                            $tampil = mysqli_query($koneksi, "SELECT * FROM tamu where tanggal like '%$tgl%' order by id
                                            desc");
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
                                            <td><div class="text-center">
                                            <div class="dropdown">
                                                <button class="btn" type="button" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="edit.php?id=<?php echo $data['id']; ?>">
                                                        <i class="fa fa-pencil-square-o" style="font-size:24px"></i> Edit
                                                    </a>
                                                    <a class="dropdown-item" href="hapus.php?id=<?php echo $data['id']; ?>">
                                                        <i class="fa fa-trash-o" style="font-size:24px"></i> Hapus
                                                    </a>
                                                </div>
                                            </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    </div>
    <!-- end Container -->

    <!-- col-lg-9 -->
    <div class="ml-5 mr-5"></div>
    <div class="mx-auto" style="width: 1000px;">
                <!-- card -->
                <div class="card shadow">
                    <!-- card-body -->
                    <div class="card-body">
                        <div class="text-center">
                        <section class="hero" id="statistik"></section>
                                <h1 class="h4 text-gray-900 mb-4">Statistik Pengunjung</h1>
                        </div>
                        <?php
                            // deklarasi tanggal

                            //menampilkan tanggal sekarang
                            $tgl_sekarang = date('Y-m-d');

                            // menampilkan tanggal kemarin
                            $kemarin = date('Y-m-d' , strtotime('-1 day', strtotime(date('Y-m-d'))));

                            //mendapatkan 6 hari sebelum tanggal sekarang
                            $seminggu = date('Y-m-d h:i:s', strtotime('-1 week +1 day', strtotime
                            ($tgl_sekarang)));

                            $sekarang = date('Y-m-d h:i:s');

                            // persiapan query tampilkan jumlah data pengunjung
                            $tgl_sekarang = mysqli_fetch_array(mysqli_query(
                                $koneksi, 
                                "SELECT count(*) from tamu where tanggal like '%$tgl_sekarang%'"
                            ));

                            $kemarin = mysqli_fetch_array(mysqli_query(
                                $koneksi, 
                                "SELECT count(*) from tamu where tanggal like '%$kemarin%'"
                            ));

                            $seminggu = mysqli_fetch_array(mysqli_query(
                                $koneksi, 
                                "SELECT count(*) from tamu where tanggal BETWEEN '$seminggu' and '$sekarang'"
                            ));

                            $bulan_ini = date('m');

                            $sebulan = mysqli_fetch_array(mysqli_query(
                                $koneksi, 
                                "SELECT count(*) from tamu where month(tanggal) = '$bulan_ini'"
                            ));

                            $keseluruhan = mysqli_fetch_array(mysqli_query(
                                $koneksi, 
                                "SELECT count(*) from tamu"
                            ));

                        ?>
                        <table class="table table-bordered">
                            <tr>
                                <td> Hari Ini </td>
                                <td> : <?=$tgl_sekarang[0]?> </td>
                            </tr>
                            <tr>
                                <td> Kemarin </td>
                                <td> : <?=$kemarin[0]?> </td>
                            </tr>
                            <tr>
                                <td> Minggu Ini </td>
                                <td> : <?=$seminggu[0]?> </td>
                            </tr>
                            <tr>
                                <td> Bulan Ini </td>
                                <td> : <?=$sebulan[0]?> </td>
                            </tr>
                            <tr>
                                <td> Keseluruhan </td>
                                <td> : <?=$keseluruhan[0]?> </td>
                            </tr>
                        </table>
                    </div>
                    <!-- card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col-lg-5 -->

        </div>
        <!-- end row -->

    <!-- panggil file footer
    <?php include "footer.php"; ?> 
    -->
