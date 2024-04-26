<!-- panggil file header -->
<?php include "header2.php"; ?>

<?php

//uji jika tombol simpan diklik
if (isset($_POST['bsimpan'])) {
    $tgl = date('Y-m-d');

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
    if ($simpan) {
        echo "<script>alert('Simpan Data Sukses, Terima Kasih...');
                  document.location='index.php'</script>";
    } else {
        echo "<script>alert('Simpan Data GAGAL!!!);
              document.location='?'</script>";
    }
}

?>

<!-- Head -->
<div class="row mt-3"></div>
<div class="head text-center m">
    
    <!--<img src="assets/img/logo.png" alt="Image" height="100" width="100">-->
    <h2 class="text-white" height="100">Buku Tamu BPJS Kesehatan Kabupaten Ciamis</h2>
</div> <br>

<!-- awal row -->
<div class="row mb-2">
    <!-- col-lg-7 -->
    <div class="col-lg-12 ">
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
                        <div class="col-sm-6" data-tooltip="Pilih Bagian yang dituju dengan tepat">
                            <label for="validationCustom04" for="dituju">Pilih Bagian yang dituju </label>
                            <select class="custom-select" id="validationCustom04" name="dituju" id="dituju" required>
                                <option value="Kepala Kantor Bpjs Kesehatan">Kepala Kantor Bpjs Kesehatan </option>
                                <option value="Staf Penjamin Manfaat Pengelolaan Faskes">Staf Penjamin Manfaat Pengelolaan Faskes</option>
                                <option value="Staf Administrasi Kepesertaan">Staf Administrasi Kepesertaan</option>
                                <option value="Staf Mutu Layanan">Staf Mutu Layanan</option>
                            </select>
                            <!-- <input type="text" class="form-control form-control-user" name="dituju" placeholder="Bagian yang dituju" required> -->
                        </div>

                    </div>

                    <button type="submit" name="bsimpan" class="btn btn-success btn-user btn-block">Simpan Data</button>

                </form>
            </div>
            <!--end card-body-->
        </div>
    </div>
    <!-- end col-lg-7 -->

    <!-- panggil file footer
            <?php include "footer.php"; ?> 
           </ -->