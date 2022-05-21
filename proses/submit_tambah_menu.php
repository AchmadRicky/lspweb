<?php 
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

if (isset($_POST['tambah'])){
	include "koneksi.php";
	if(in_array($ektensi, $valid_ektensi)){
		if(!$ukuran < 10000000){
			move_uploaded_file($tmp_dir, $direktori.$gambar);
	$query = sprintf("INSERT INTO menu VALUES(NULL,'$nama_menu','$gambar','$harga','$stock')",'$gambar');
	$hasil = mysqli_query($db_koneksi,$query);
	if ($hasil){
		echo "<script>alert('Barang Berhasil Di tambahkan');</script>";
		echo "<script>location='../page/data_menu.php';</script>";
		}else{ 
		echo "<script>alert('Barang Sudah Ada');</script>";
		echo "<script>location='../page.tamba_menu.php';</script>";
	}
}
}
else echo "<script>alert('Ada Yang Salah Saat Menginput');</script>";
}
?>