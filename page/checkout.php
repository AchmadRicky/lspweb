
<?php 
session_start();
$koneksi = new mysqli("localhost","root","","grafikacafe");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CheckOut</title>
    <link rel="stylesheet" href="..\font-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  </head>
  <body>
      <div class="col-md-12 p-5 pt-3">
          <h3><i class="fas fa-cart-plus mr-2"></i>CheckOut</h3><hr>
          <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Id Menu</th>
                <th scope="col">Nama Menu</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Sub Harga</th>
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
                <td><?php echo $jumlah; ?></td>
                <td>Rp.<?php echo number_format($subharga); ?></td>
            </tr>
            <?php $totalharga +=$subharga ?>
            <?php endforeach ?>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="5">Total Harga</th>
                <th colspan="2">Rp. <?php echo number_format($totalharga); ?></th>
            </tr>
            </tfoot>
        </table>
        <form method="post">
            <div class="row">
            <div class="col-md-2">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Meja</span>
                <select class="custom-select" name="meja">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>
            </div>
        </div>  
      <div class="lanjut me-auto mb-lg-0">
      <button class="btn btn-outline-primary" name="lanjut">Lanjut Pembayaran</button>
      </div>
      </form>

      <a href="keranjang.php?username=<?php echo $_SESSION['username']; ?>"><input type="submit" class="btn btn-primary mx-3" value="Kembali"></input></a>
      <?php 
        if(isset($_POST['lanjut'])){
          $id_akun = $_SESSION['id_akun'];
          $nama_kasir = $_SESSION['username'];
          $waktu = date("Y-m-d H:i:s");
          $meja = $_POST['meja'];

          $koneksi->query("INSERT INTO transaksi VALUES ('NULL','$id_akun','$nama_kasir','$totalharga','$meja','$waktu')");

          $id_transaksi = $koneksi->insert_id;

          foreach ($_SESSION['keranjangbelanja'] as $id_menu => $jumlah) {
          $query = "SELECT * FROM menu WHERE id_menu = '$id_menu'";
          $hasil = mysqli_query($koneksi,$query);
          $data = mysqli_fetch_array($hasil);
          $nama_menu = $data['nama_menu'];
          $harga_barang = $data['harga'];
          $total_harga = $harga_barang*$jumlah;
          $id_kasir = $_SESSION['id_akun'];
          $nama_kasir = $_SESSION['username'];
          $waktu = date("Y-m-d H:i:s");
          $keterangan = "Melakukan Transaksi Dengan id ".$id_transaksi;
            $koneksi->query("INSERT INTO detail_transaksi VALUES('NULL','$id_transaksi','$id_menu','$nama_menu','$harga_barang','$jumlah','$total_harga')");

            $koneksi->query("UPDATE menu SET stok=stok -$jumlah WHERE id_menu='$id_menu'");
            $koneksi->query("INSERT INTO log VALUES ('NULL','$id_kasir','$nama_kasir','$waktu','$keterangan')");
          }
          unset($_SESSION['keranjangbelanja']);

          echo "<script>alert('Pembelian Sukses')</script>";
          echo "<script>location='nota.php?id_transaksi=$id_transaksi';</script>";
        }
       ?>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
          </body>
        </html>