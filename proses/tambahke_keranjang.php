<?php 
session_start();

$id_menu = $_GET['id_menu'];

if(isset($_SESSION['keranjangbelanja'][$id_menu])){
	$_SESSION['keranjangbelanja'][$id_menu]+=1;
}else{
	$_SESSION['keranjangbelanja'][$id_menu]=1;
}

echo "<script>alert('Produk Telah Masuk ke Keranjang')</script>";
echo "<script>location='../page/kasir.php';</script>"
 ?>