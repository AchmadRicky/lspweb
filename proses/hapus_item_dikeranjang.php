<?php 
session_start();
$id_menu = $_GET['id_menu'];
unset($_SESSION['keranjangbelanja'][$id_menu]);

echo "<script>alert('Produk Dihapus Dari Kerajang');</script>";
echo "<script>location='../page/keranjang.php';</script>";
 ?>