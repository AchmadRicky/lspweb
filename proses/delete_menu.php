<?php 
include "koneksi2.php";
$id_menu=$_GET['id_menu'];

$query1 = "SELECT * FROM menu WHERE id_menu='$id_menu'";
$hasil1 = mysqli_query($koneksi,$query1);
$data = mysqli_fetch_array($hasil1);
unlink("..\img/$data[gambar]");

$query = "DELETE FROM menu WHERE id_menu='$id_menu'";
$hasil = mysqli_query($koneksi,$query);

header("Location:..\page/data_menu.php");
 ?>