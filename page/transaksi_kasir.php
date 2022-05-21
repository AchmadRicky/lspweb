<?php 
session_start();
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="..\font-awesome/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>History Belanja</title>
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
      <form method="post" >
       <h3><i class="fas fa-history mr-2"></i>Data Transaksi</h3><hr>
       <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">ID Transaksi</th>
            <th scope="col">ID Kasir</th>
            <th scope="col">Nama Kasir</th>
            <th scope="col">Total Pembelian</th>
            <th scope="col">Meja</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Detail</th>
          </tr>
        </thead>
        <tbody>
      <?php 
        include "../proses/koneksi2.php";
        $query = "SELECT * FROM transaksi WHERE id_kasir = '$_SESSION[id_akun]' ORDER BY id_transaksi DESC";
        $hasil = mysqli_query($koneksi,$query);
        $no = 1;
        $jum = mysqli_num_rows($hasil);
        echo "Banyak Data : ".$jum."<br>";
        while ($data = mysqli_fetch_array($hasil)) {
      ?> 
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['id_transaksi']; ?></td>
            <td><?php echo $data['id_kasir']; ?></td>
            <td><?php echo $data['nama_kasir']; ?></td>
            <td>Rp.<?php echo number_format($data['total_pembelian']); ?></td>
            <td><?php echo $data['meja']; ?></td>
            <td><?php echo $data['waktu']; ?></td>
            <td><a href="detail_transaksi.php?id_transaksi=<?php echo $data['id_transaksi'];?> ">Detail</a></td>
          </tr>
          <?php 
        }
           ?>
        </tbody>
      </form>
      </table>
     </div>
   </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript" src="admin.js"></script>
  </body>
</html>