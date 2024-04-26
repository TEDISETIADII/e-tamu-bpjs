<?php
require('koneksi.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM tamu WHERE id=$id"; 
$result = mysqli_query($koneksi,$query) or die ( mysqli_error($koneksi));
header("Location: admin.php"); 
exit();
?>
