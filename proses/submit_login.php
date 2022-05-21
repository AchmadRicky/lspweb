<?php 
session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM akun WHERE username = '$username'";
$hasil = mysqli_query($db_koneksi,$query);
$data = mysqli_fetch_array($hasil);

$pass = $password;

if($pass == $data['password'])
{
    $_SESSION['id_akun'] = $data['id_akun'];
	$_SESSION['level'] = $data['level'];
	$_SESSION['username'] = $data['username'];

	echo "<script>alert('Berhasil Login');</script>";
	echo "<script>location='../page/admin.php';</script>";
}
else {
	echo "<script>alert('Login Gagal');</script>";
	echo "<script>location='../index.php';</script>";
}
 ?>