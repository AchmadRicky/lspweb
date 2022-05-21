<?php 
session_start();
$koneksi = new mysqli("localhost","root","","grafikacafe");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Nota</title>
  </head>
  <body>
    <div class="p-5 pt-3">
       <h3>Nota Transaksi</h3><hr>
       <?php 
       $ambil = $koneksi->query("SELECT * FROM transaksi WHERE id_transaksi = '$_GET[id_transaksi]'");
       $detail = $ambil->fetch_assoc();
        ?>
        <div class="row">
      <div class="col-md-5">
        <h3>Transaksi</h3>
        <p>
          ID Transaksi : <?php echo $detail['id_transaksi']; ?><br>
          Total Pembelian : Rp.<?php echo number_format($detail['total_pembelian']); ?><br>
          Meja : <?php echo $detail['meja']; ?><br><br>
          <?php echo $detail['waktu']; ?>
        </p>
      </div>
       <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Barang</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Sub Harga</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1;$totalharga = 0; ?>
          <?php
          $id_transaksi = $koneksi->insert_id;
          $ambil = $koneksi->query("SELECT * FROM detail_transaksi WHERE id_transaksi = '$_GET[id_transaksi]'");?>
          <?php while ($pecah = $ambil->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $pecah['id_menu']; ?></td>
            <td><?php echo $pecah['nama_menu']; ?></td>
            <td>Rp.<?php echo number_format($pecah['harga']); ?></td>
            <td><?php echo $pecah['jumlah']; ?></td>
            <td>Rp.<?php echo number_format($pecah['total_harga']); ?></td>
          </tr>
          <?php $totalharga +=$pecah['total_harga']; ?>
        <?php } ?>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="5">Total Harga</th>
            <th>Rp. <?php echo number_format($totalharga); ?></th>
          </tr>
        </tfoot>
      </table>
      <div class="row">
        <div class="col-md-4"></div>
        <a href="transaksi_kasir.php?email=<?php echo $_SESSION['username']; ?>"><input type="submit" class="btn btn-primary mx-3" value="History"></input></a>
      </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>