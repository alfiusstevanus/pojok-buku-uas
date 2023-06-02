<?php
session_start();
include('server/connection.php');
if (isset($_SESSION['logged_in'])) {
    if ($_SESSION['status'] == 'Admin') {
        header('location: admin/index.php');
        exit;
    } else if ($_SESSION['status'] == 'User') {
        header('location: index.php');
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/fontawesome/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,700;1,900&display=swap" rel="stylesheet">
    <link rel="icon" href="./images/logo books corner 2.png">
    <title>Books Corner | Register</title>
</head>

<body>
    <!-- untuk Login -->
    <div class="container d-flex justify-content-center align-items-center vh-100  ">
        <div class="card shadow-lg card-register">
            <div class="row g-3 ">
                <div class="col-md-3">
                    <div>
                        <form method="post" enctype="multipart/form-data" action="controller/register.php">
                            <div class="p-3 ">
                                <label class="c-10" for="fullmane">Fullname</label>
                                <input id="fullname" type="text" class="form-control" name="name" autocomplete="off" required>
                            </div>
                            <div class="p-3 ">
                                <label class="c-10" for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" autocomplete="off" required>
                            </div>
                            <div class="p-3 ">
                                <label class="c-10" for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                            <div class="p-3 ">
                                <label class="c-10" for="photo">User Photo</label>
                                <input id="photo" type="file" class="form-control" name="photo" autocomplete="off">
                            </div>
                    </div>
                </div>

                <div class="col-md-3">

                    <div class="p-3 ">
                        <label class="c-10" for="telephone">Telephone</label>
                        <input id="telephone" class="form-control" name="telephone" autocomplete="off" required>
                    </div>
                    <div class="p-2 ms-2 ">
                        <label class="c-10">Gender</label>
                        <div class="form-check">
                            <input name="kelamin" value="Laki - laki" class="form-check-input" type="radio" name="flexRadioDefault" id="man" required>
                            <label class="form-check-label" for="man">
                                Man
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="kelamin" value="Perempuan" class="form-check-input" type="radio" name="flexRadioDefault" id="woman" required>
                            <label class="form-check-label" for="woman">
                                Woman
                            </label>
                        </div>
                    </div>
                    <div class="p-3 ">
                        <label class="c-10" for="Age">Age</label>
                        <input id="umur" type="number" class="form-control" name="umur" autocomplete="off">
                    </div>
                    <div class="p-3 ">
                        <label class="c-10" for="alamat">Alamat</label>
                        <input id="alamat" type="text" class="form-control" name="alamat" autocomplete="off">
                    </div>
                    <div class="p-2 m-3  text-center">
                        <button name="register">
                            register
                        </button>
                    </div>
                    <div class="text-center justify-content-center d-flex flex-row">
                        <p class="me-1">have account?</p>
                        <a class="c-10" href="login.php">Login</a>
                    </div>
                    </form>
                </div>

                <div class="col-md-6">
                    <div class="overlaytext-register text-center">
                        <h2 class="fw-bold">Register</h2>
                        <p>To Get Your Account</p>
                    </div>
                    <img src="images/register.jpeg" class="object-cover-fit " width="100%" height="450px" alt="">
                </div>
            </div>
            <div>
                <?php
                if (isset($_GET["registered"]) && $_GET["registered"] == false) {
                ?>
                    <div id="alert" class="text-center alert alert-danger alert-dismissible fade show rounded-25 mt-2 shadow-lg " role="alert">
                        Akun gagal dibuat !
                    </div>
                <?php }  ?>
            </div>

        </div>
    </div>
</body>
<script src="/js/bootstrap.js"></script>
<script>
    // Menghilangkan alert setelah beberapa detik
    setTimeout(function() {
        document.getElementById('alert').style.display = 'none';
    }, 1500); // ganti 5000 dengan jumlah milidetik yang diinginkan
</script>

</html>