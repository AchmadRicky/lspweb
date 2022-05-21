<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="..\font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <title>Transaksi</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-warning bg-warning fixed-top">
        <h3><i class="fas fa-shopping-cart text-white mr-2"></i></h3>
        <a class="navbar-brand font-weight-bold text-white" href="#">Dashboard Manajer</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto ml-4">
            <li class="nav-item">
            </li>
        </ul>
        <div class="icon mt-2 mr-3">
            <h5>
                <a href="../proses/logout.php" style="color : #212529;"><i class="fas fa-sign-out-alt ml-3" data-toogle="tooltip" title="Logout"></i></a>
            </h5>
        </div>  
        </div>
    </nav>
    <div class="row no-gutters mt-5">
        <div class="col-md-2 mt-4 pt-3 bg-white">
        <ul class="nav flex-column ml-3">
        <li class="nav-item">
            <a class="nav-link active" href="manajer.php"><i class="fas fa-tachometer-alt mr-1"></i>Dashboard</a><hr>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="data_menu.php"><i class="fas fa-store mr-1"></i>Data Menu</a><hr>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="data_aktivitas_manajer.php"><i class="fas fa-user mr-1"></i>Data Aktivitas</a><hr>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="data_transaksi.php"><i class="fas fa-shopping-basket mr-1"></i>Data Transaksi</a><hr>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="data_pendapatan.php"><i class="fas fa-coins mr-1"></i></i>Data Pendapatan</a><hr>
        </li>
        </ul>
        </div>

     <div class="col-md-10 p-5 pt-3">
      <form action="" method="post">
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
        if(isset($_POST['cari'])){
            $_SESSION['pencarian']=$_POST['kasir'];
            $keywoard = $_SESSION['pencarian'];
          }else{
            $keywoard = ['pencarian'];
          }
        $query = "SELECT * FROM transaksi WHERE nama_kasir = '$keywoard'";
        $hasil = mysqli_query($koneksi,$query);
        $no = 1;
        $jum = mysqli_num_rows($hasil);
        echo "Banyak Data : ".$jum."<br>";
        if(mysqli_num_rows($hasil)){
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
        }}else{
          echo "Tidak Ada Data";
        }
           ?>
        </tbody>
        <div class="row">
            <div class="col-md-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Kasir : </span>
                <select class="custom-select" name="kasir">
                <?php
                $query = "SELECT * FROM akun WHERE level = 'kasir'";
                $hasil = mysqli_query($koneksi,$query);
                while ($data = mysqli_fetch_array($hasil)) {
                ?>
                  <option value="<?php echo $data['username']?>"><?php echo $data['username']?></option>
                  <?php } ?>
                </select>
            </div>
              <button class="btn btn-outline-primary mt-3 mb-3" type="submit" name="cari">Cari</button>
        </div>
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