<?php 
session_start();
$koneksi = new mysqli("localhost","root","","grafikacafe");
if (isset($_SESSION['level']) && isset($_SESSION['username']) && isset($_SESSION['id_akun'])){
  if($_SESSION['level'] == "admin"){
    header('location:admin.php');
  }
  else if ($_SESSION['level'] == "manajer") {
    header('location:manajer.php');
  }
  else if ($_SESSION['level'] == "kasir") {
  }
}
if (!isset($_SESSION['level'])) {
  echo "Anda Tidak Boleh Mengakses Tanpa";
  echo "<a href='login.php'>Login</a><br>";

  echo "<script>alert('Anda Tidak Boleh Mengakses Tanpa Login');</script>";
	echo "<script>location='../index.php';</script>";
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
        <form class="d-flex" role="search">
        <h4><a href="keranjang.php" style="color: #212529;"><i class="fas fa-cart-plus mx-4 mt-2"></i></a></h4>
      </form>
      <form action="../proses/logout.php" class="d-flex" role="search"><button class="btn btn-outline-success" type="submit">Logout</button>
        </div>
    </div>
    </nav>
    <div class="container fluid">
    <div class="row">
    <?php 
        include "../proses/koneksi.php";
        $query = "SELECT * FROM menu ORDER BY nama_menu ASC";
        $hasil = mysqli_query($koneksi,$query);
        while ($data = mysqli_fetch_array($hasil)) {
        ?>
    <div class="card mt-4 ms-4" style="width: 18rem;">
    <img src="..\img/<?php echo $data['gambar'];?>" class="card-img-top mt-3" alt="...">
    <div class="card-body ">
        <h5 class="card-title"><?php echo $data['nama_menu']; ?></h5>
        <p class="card-text">Rp.<?php echo number_format($data['harga']); ?></p>
        <p class="card-text">Stok : <?php echo $data['stok']; ?></p>
        <a href="../proses/tambahke_keranjang.php?id_menu=<?php echo $data['id_menu']; ?>" class="btn btn-primary">Tambah</a>
    </div>
    </div>
    <?php } ?>
    </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>