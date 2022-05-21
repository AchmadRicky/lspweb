<?php 
$id_menu = $_GET['id_menu'];
$nama_menu = $_POST['nama_menu'];
$harga = $_POST['harga'];
$stock = $_POST['stock'];

$file = $_FILES['gambar']['name'];
$tmp_dir = $_FILES['gambar']['tmp_name'];
$ukuran = $_FILES['gambar']['size'];

$direktori='..\img/';
$ektensi = strtolower(pathinfo($file,PATHINFO_EXTENSION));
$valid_ektensi = array('jpeg','jpg','png');
$gambar = $file;

if (isset($_POST['update'])){
	include "koneksi.php";
			move_uploaded_file($tmp_dir, $direktori.$gambar);
	if(!empty($tmp_dir)){
	$query = sprintf("UPDATE menu SET id_menu = '$id_menu',nama_menu = '$nama_menu',gambar = '$gambar',harga = '$harga',stok = '$stock' WHERE id_menu='$id_menu';",'$gambar');
	$hasil = mysqli_query($db_koneksi,$query) OR die ("EROR UPDATE DATA");
	}
	else{
	$query = sprintf("UPDATE menu SET id_menu = '$id_menu',nama_menu = '$nama_menu',harga = '$harga',stok = '$stock' WHERE id_menu='$id_menu';");
	$hasil = mysqli_query($db_koneksi,$query) OR die ("EROR UPDATE DATA");
	}
	if ($hasil){
		header('Location:..\page/data_menu.php');
		}
}
?>