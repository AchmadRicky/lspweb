<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grafika Cafe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <form action="../proses/submit_tambah_menu.php" method="post" name="input" enctype="multipart/form-data">
        <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">

                    <h3 class="mb-5">Tambah Menu</h3>

                    <div class="form-outline mb-4">
                    <input required type="text"class="form-control form-control-lg" placeholder="Nama Menu" name="nama_menu"/>
                    <label class="form-label">Nama Menu</label>
                    </div>

                    <div class="form-outline mb-4">
                    <input required type="text"class="form-control form-control-lg" placeholder="Harga" name="harga"/>
                    <label class="form-label">Harga</label>
                    </div>

                    <div class="form-outline mb-4">
                    <input required type="text"class="form-control form-control-lg" placeholder="Stock" name="stock"/>
                    <label class="form-label">Stock</label>
                    </div>
                    <hr class="">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Foto Menu</label>
                        <input required type="file" class="form-control-file mt-1" id="exampleFormControlFile1" name="gambar">
                    </div>
                    <hr class="">
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="tambah">Tambah</button>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>