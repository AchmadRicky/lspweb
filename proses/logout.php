<?php 
session_start();
unset($_SESSION['username']);
unset($_SESSION['level']);
unset($_SESSION['id_akun']);
session_destroy();
echo "<script>alert('Berhasil Logout');</script>";
echo "<script>location='../index.php';</script>";
?>