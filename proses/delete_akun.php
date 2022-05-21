<?php 
include "koneksi2.php";
$id_akun = $_GET['id_akun'];

$query1 = "SELECT * FROM akun WHERE id_akun='$id_akun'";
$hasil1 = mysqli_query($koneksi,$query1);
$data = mysqli_fetch_array($hasil1);

$query = "DELETE FROM akun WHERE id_akun='$id_akun'";
$hasil = mysqli_query($koneksi,$query);

header("Location:..\page/data_user.php");
 ?>