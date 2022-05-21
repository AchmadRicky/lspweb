<?php 
$koneksi= new mysqli("localhost","root","","grafikacafe");
$semuadata=array();
$tanggalmulai="-";
$tanggalselesai="-";
if (isset($_POST['kirim'])) 
{
		$tanggalmulai = $_POST["tanggalmulai"];
		$tanggalselesai = $_POST["tanggalselesai"];
		$ambil = $koneksi->query("SELECT * FROM transaksi WHERE waktu BETWEEN '$tanggalmulai' AND '$tanggalselesai'");
	   while ($pecah = $ambil->fetch_assoc()){
	   
		   $semuadata[]=$pecah;
	   }
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
    <title>Pendapatan</title>
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
      <form action="filter_data_pendapatan.php" method="post" name="input">
       <h3><i class="fas fa-coins mr-2"></i>Data Pendapatan</h3><hr>
       <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">ID Transaksi</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Total Pembelian</th>
          </tr>
        </thead>
        <tbody>
        <?php $total=0; ?>
		<?php foreach ($semuadata as $key => $value): ?>
		
		<?php $mengambil = $koneksi->query("SELECT * FROM transaksi ");
		$pecahkan = $mengambil->fetch_assoc()
        ?>
		<?php $total+=$value["total_pembelian"];
        ?>	
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value["id_transaksi"]?></td>
			<td><?php echo $value["waktu"]?></td>
			<td>Rp.<?php echo number_format($value["total_pembelian"]) ?></td>
			
		</tr>
		
		<?php endforeach ?>
        <?php
        echo "Total Pendapatan : ";
        echo number_format($total)."<br>";
         ?>
      
        </tbody>
        <hr>
        <h3>Filter</h3>
        <div class="col-md-5">
		<div class="form-group">
			<label>Tanggal Mulai</label>
			<input type="date" name="tanggalmulai" class="form-control" value="<?php echo $tanggalmulai?>">
		</div>
	</div>
	<div class="col-md-5">
		<label>Tanggal Selesai</label>
		<input type="date" name="tanggalselesai" class="form-control" value="<?php echo $tanggalselesai?>">
	</div>
    <div class="col-md-2 mb-5">
		<label>&nbsp;</label><br>
		<button class="btn btn-primary" name="kirim">Lihat</button>
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