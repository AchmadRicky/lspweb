<?php 
$username = $_POST['username'];
$pass = $_POST['pass'];
$level = $_POST['level'];

if ($pass){
	include "koneksi.php";
	$query = sprintf("INSERT INTO akun VALUES('NULL','$username','$pass','$level')");
	$hasil = mysqli_query($db_koneksi,$query);
	if ($hasil){
		echo "<script>alert('User Sudah Berhasil Terdaftar');</script>";
		echo "<script>location='../page/data_user.php';</script>";
		}else{ 
		echo "<script>alert('User Sudah Ada Yang Memiliki');</script>";
		echo "<script>location='../page/data_user.php';</script>";
	}
}else echo "<script>alert('Ada Yang Salah Saat Menginput');</script>";
?>