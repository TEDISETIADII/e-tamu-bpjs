<!-- panggil file header -->
<?php include "header.php"; ?>

<?php
    
   //uji jika tombol simpan diklik
   if(isset($_POST['bsimpan'])){
    $tgl = date ('Y-m-d');

    //htmlspecialchars agar inputan lebih aman dari injection
    $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
    $nik = htmlspecialchars($_POST['nik'], ENT_QUOTES);
    $nope = htmlspecialchars($_POST['nope'], ENT_QUOTES);
    $keperluan = htmlspecialchars($_POST['keperluan'], ENT_QUOTES);
    $asalinstansi = htmlspecialchars($_POST['asalinstansi'], ENT_QUOTES);
    $dituju = htmlspecialchars($_POST['dituju'], ENT_QUOTES);

    //persiapan query simpan data 
    $simpan = mysqli_query($koneksi, "INSERT INTO tamu VALUES ('', '$tgl', '$nama', '$nik', '$nope', '$keperluan', '$asalinstansi', '$dituju')");
    
    //uji jika simpan data sukses
    if($simpan) {
        echo "<script>alert('Simpan Data Sukses, Terima Kasih...');
              document.location='?'</script>";
    }else{
        echo "<script>alert('Simpan Data GAGAL!!!);
              document.location='?'</script>";
    }
    }

    ?>

    <!-- Head -->
   
        <!-- end Head -->

        <!-- awal row -->
        <div class="row mt-2">
            <!-- col-lg-7 -->
            <div class="col-lg-12">
                <div class="card shadow bg-gradient-light">
                    <!-- card-body -->
                    <div class="card-body">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Data Pengunjung</h1>
                            </div>
                            <form class="user" method="POST" action="">
                                <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama Pengunjung" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="nik" placeholder="NIK" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="nope" placeholder="No. HP" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="keperluan" placeholder="Keperluan" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="asalinstansi" placeholder="Asal Instansi" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="dituju" placeholder="Bagian yang dituju" required>
                                    </div>
                                    
                                </div>
                                
                                <button type="submit" name="bsimpan" class="btn btn-primary btn-user btn-block">Simpan Data</button>
                                
                            </form>
                    </div>
                    <!--end card-body-->
                </div>
            </div>
            <!-- end col-lg-7 -->

            <!-- panggil file footer
            <?php include "footer.php"; ?> 
            -->