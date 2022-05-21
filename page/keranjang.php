<?php 
session_start();
$koneksi = new mysqli("localhost","root","","grafikacafe");

if(empty($_SESSION['keranjangbelanja']) OR !isset($_SESSION['keranjangbelanja'])){
  echo "<script>alert('Keranjang Kosong Silahkan Belanja Dulu');</script>";
  echo "<script>location='kasir.php';</script>";
}
if(empty($_SESSION['username'])){
  echo "<script>alert('Anda Belum Login');</script>";
  echo "<script>location='index.php';</script>";
}
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kasir Grafika Cafe</title>
    <link rel="stylesheet" href="..\font-awesome/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-warning">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Kasir Grafika Cafe</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navbar-nav me-auto mb-2 mb-lg-0">
        </div>
        <form action="../proses/logout.php" class="d-flex" role="search"><button class="btn btn-outline-success" type="submit">Logout</button>
        </form>
        </div>
    </div>
    </nav>
    <div class="row no-gutters mt-5">
    <div class="col-md-2 mt-4 pt-3 bg-white">
    <ul class="nav flex-column ml-3">
        <li class="nav-item">
          <a class="nav-link" href="keranjang.php?username=<?php echo $_SESSION['username'];?>"><i class="fas fa-cart-plus mr-1"></i>Keranjang Belanja</a><hr>
        </li>
      <li class="nav-item">
        <a class="nav-link active" href="transaksi_kasir.php?username=<?php echo $_SESSION['username'];?>"><i class="fas fa-tachometer-alt mr-1"></i>Transaksi</a><hr>
      </li>
    </ul>
    </div>
    <div class="col-md-10 p-5 pt-3">
        <h3><i class="fas fa-cart-plus mr-2"></i>Keranjang Belanja</h3><hr>
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Id Menu</th>
                <th scope="col">Nama Menu</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Sub Harga</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php $no=1;$totalharga = 0; ?>
            <?php foreach ($_SESSION['keranjangbelanja'] as $id_menu => $jumlah):?>
            <?php
            $ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu = '$id_menu'");
            $pecah = $ambil->fetch_assoc();
            $subharga = $pecah['harga']*$jumlah;
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $pecah['id_menu']; ?></td>
                <td><?php echo $pecah['nama_menu']; ?></td>
                <td>Rp.<?php echo number_format($pecah['harga']);?></td>
                <td><a href="../proses/kurang_jumlah_barang.php?id_menu=<?php echo $pecah['id_menu']; ?>"><button type="button" class="btn btn-light mr-1">-</button></a><?php echo $jumlah; ?><a href="../proses/tambah_jumlah_barang.php?id_menu=<?php echo $pecah['id_menu']; ?>"><button type="button" class="btn btn-light ml-1">+</button></a></td>
                <td>Rp.<?php echo number_format($subharga); ?></td>
                <td>
                <a href="../proses/hapus_item_dikeranjang.php?id_menu=<?php echo $id_menu ?>" onclick="return confirm('apakah anda yakin?')">Hapus</a>
                </td>
            </tr>
            <?php $totalharga +=$subharga ?>
            <?php endforeach ?>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="6">Total Harga</th>
                <th colspan="2">Rp. <?php echo number_format($totalharga); ?></th>
            </tr>
            </tfoot>
        </table>
        <a href="kasir.php"><input type="submit" class="btn btn-primary" value="Kembali"></input></a>
        <a href="checkout.php?username=<?php echo $_SESSION['username'];?>"><input type="submit" class="btn btn-outline-primary ml-4" value="Checkout"></input></a>
        </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>