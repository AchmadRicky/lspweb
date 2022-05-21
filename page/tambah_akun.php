<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grafika Cafe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <form action="../proses/submit_tambah_akun.php" method="post" name="input">
        <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">

                    <h3 class="mb-5">Tambah Akun</h3>

                    <div class="form-outline mb-4">
                    <input required type="text" id="typeEmailX-2" class="form-control form-control-lg" placeholder="Username" name="username"/>
                    <label class="form-label" for="typeEmailX-2">Username</label>
                    </div>

                    <div class="form-outline mb-4">
                    <input required type="password" id="typePasswordX-2" class="form-control form-control-lg" placeholder="Password" name="pass"/>
                    <label class="form-label" for="typePasswordX-2">Password</label>
                    </div>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Level</label>
                    </div>
                    <select required class="custom-select" id="inputGroupSelect01" name="level">
                        <option selected value="kasir">Kasir</option>
                        <option value="manajer">Manajer</option>
                        <option value="admin">admin</option>
                    </select>
                    </div>    
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Tambah</button>
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