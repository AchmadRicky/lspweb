<?php 
session_start();
if (isset($_SESSION['level']) && isset($_SESSION['username'])){
  if($_SESSION['level'] == "admin"){
  }
  else if ($_SESSION['level'] == "manajer") {
    header('location:manajer.php');
  }
  else if ($_SESSION['level'] == "kasir") {
    header('location:kasir.php');
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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="..\font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <title>Dashboard Admin</title>
  </head>  <body>
    <nav class="navbar navbar-expand-lg navbar-warning bg-warning fixed-top">
      <h3><i class="fas fa-shopping-cart text-white mr-2"></i></h3>
    <a class="navbar-brand font-weight-bold text-white" href="#">Dashboard Admin</a>
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
        <a class="nav-link active" href="admin.php"><i class="fas fa-tachometer-alt mr-1"></i>Dashboard</a><hr>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="data_aktivitas.php"><i class="fas fa-store mr-1"></i>Data Aktivitas</a><hr>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="data_user.php"><i class="fas fa-user mr-1"></i>Data User</a><hr>
      </li>
    </ul>
    </div>

     <div class="col-md-10 p-5 pt-3">
       <h3><i class="fas fa-tachometer-alt mt-1 mr-2"></i>DASHBOARD</h3><hr>
       <div class="row text-white">
         <div class="card bg-primary ml-5" style="width: 18rem;">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-store"></i>
              </div>
              <h5 class="card-title">Data Aktivitas Kasir</h5>
              <?php 
              include "../proses/koneksi2.php";
              $query = "SELECT * FROM log";
              $hasil = mysqli_query($koneksi,$query);
              $jum = mysqli_num_rows($hasil);
               ?>
              <div class="display-4"><?php echo $jum; ?></div>
              <a href="data_aktivitas.php"><p class="card-text text-white">Lihat Detail <i class="fas fa-caret-right"></i><i class="fas fa-caret-right"></i></p></a>
            </div>
          </div>
          <div class="card bg-danger ml-5" style="width: 18rem;">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-user mr-2"></i>
              </div>
              <h5 class="card-title">Data Users</h5>
              <?php 
              include "../proses/koneksi2.php";
              $query = "SELECT * FROM akun";
              $hasil = mysqli_query($koneksi,$query);
              $jum = mysqli_num_rows($hasil);
               ?>
              <div class="display-4"><?php echo $jum; ?></div>
              <a href="data_user.php"><p class="card-text text-white">Lihat Detail <i class="fas fa-caret-right"></i><i class="fas fa-caret-right"></i></p></a>
            </div>
          </div>
       </div>
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