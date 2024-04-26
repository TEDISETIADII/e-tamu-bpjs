<?php include "header.php"; ?>
<?php
require('koneksi.php');
$id=$_REQUEST['id'];
$query = "SELECT * from tamu where id='".$id."'"; 
$result = mysqli_query($koneksi, $query) or die ( mysqli_error($koneksi));
$row = mysqli_fetch_assoc($result);

$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
$id=$_REQUEST['id'];

$tanggal = $_REQUEST['tanggal'];
$nama = $_REQUEST['nama'];
$nik = $_REQUEST['nik'];
$nope =$_REQUEST['nope'];
$keperluan =$_REQUEST['keperluan'];
$asalinstansi =$_REQUEST['asalinstansi'];
$dituju =$_REQUEST['dituju'];

$update="update tamu set tanggal='".$tanggal."',
nama='".$nama."', nik='".$nik."',
nope='".$nope."', keperluan='".$keperluan."', asalinstansi='".$asalinstansi."', dituju='".$dituju."' where id='".$id."'";
mysqli_query($koneksi, $update) or die(mysqli_error($koneksi));
$status = "Record Updated Successfully. </br></br>
<a href='admin.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>

                <div class="card shadow bg-gradient-light">
                    <div class="card-body">
                    <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Edit Data Pengunjung</h1>
                            </div>
                            <form name="form" class="user" method="post" action="">
                                <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama Pengunjung" required value="<?php echo $row['nama'];?>">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="nik" placeholder="NIK" required value="<?php echo $row['nik'];?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="nope" placeholder="No. HP" required value="<?php echo $row['nope'];?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="keperluan" placeholder="Keperluan" required value="<?php echo $row['keperluan'];?>">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="asalinstansi" placeholder="Asal Instansi" required value="<?php echo $row['asalinstansi'];?>">
                                    </div>
                                    <div class="col-sm-6" data-tooltip="Pilih Bagian yang dituju dengan tepat">
                                    <input type="text"  class="form-control form-control-user" name="dituju" placeholder="Bagian yang Dituju" required value="<?php echo $row['dituju'];?>" />
                                        
                                    </div>
                                    
                                </div>
                                
                                <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">Update</button>
                                
                            </form>

   
</div>
</div>
</div>
</div>
</div>
//
    
<?php } ?>