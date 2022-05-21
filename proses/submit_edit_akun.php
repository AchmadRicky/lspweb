<?php 
$id_akun = $_GET['id_akun'];
$username = $_POST['username'];
$pass = $_POST['pass'];
$level = $_POST['level'];

    include "koneksi.php";
	$query = sprintf("UPDATE akun SET username='$username',password='$pass',level='$level' WHERE id_akun='$id_akun';");
	$hasil = mysqli_query($db_koneksi,$query) OR die ("EROR UPDATE DATA");
	if ($hasil){
        echo "<script>location='../page/data_user.php';</script>";
    }

?>