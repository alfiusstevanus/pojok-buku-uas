<?php
include('server/conn.php');

if (isset($_SESSION['logged_in'])) {
    header('location:index.php');
    exit;
}
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM akun where email = ? AND password = ? LIMIT 1";
    $stmt_login = $conn->prepare($query);
    $stmt_login->bind_param('ss', $email, $password);

    if ($stmt_login->execute()) {
        $stmt_login->bind_result(
            $id,
            $email,
            $name,
            $password,
            $telephone,
            $status,
            $photo,
            $kelamin,
            $umur,
            $saldo,
        );

        $stmt_login->store_result();
        if ($stmt_login->num_rows() == 1) {
            $stmt_login->fetch();

            $_SESSION['id'] = $id;
            $_SESSION['email'] = $user_name;
            $_SESSION['name'] = $status;
            $_SESSION['password'] = $password;
            $_SESSION['telephone'] = $telephone;
            $_SESSION['status'] = $status;
            $_SESSION['photo'] = $photo;
            $_SESSION['kelamin'] = $kelamin;
            $_SESSION['umur'] = $umur;
            $_SESSION['saldo'] = $saldo;
            $_SESSION['logged_in'] = true;

            if ($_SESSION['status'] == "User") {
                header("location:index.php?login=1");
            } else if ($_SESSION['status'] == "Admin") {
                header("location:admin.php?login=1");
            } else {
                $succes = false;
                header("location:login.php?error=email atau password salah!?logined=$success");
            }
        } else {
            $success = false;
            header("location:login.php?logined=$success");
        }
    } else {
        $success = false;
        header("location:login.php?logined=$success");
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
    <title>Books Corner</title>
</head>

<body>
    <!-- untuk Login -->
    <div class="container d-flex justify-content-center align-items-center vh-100  ">
        <div class="card shadow-lg card-login">
            <div class="row g-1 ">
                <div class="col-md-5">
                    <div>
                        <form method="post">
                            <div class="p-4 ">
                                <label class="c-10" for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" autocomplete="off">
                            </div>
                            <div class="p-4 ">
                                <label class="c-10" for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password">
                            </div>
                            <div class="p-3 m-3 text-center">
                                <button name="login">
                                    Login
                                </button>
                            </div>
                        </form>
                        <div class="text-center justify-content-center d-flex flex-row">
                            <p class="me-1">dont have account?</p>
                            <a class="c-10" href="register.php">register</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="overlaytext text-center">
                        <h2 class="fw-bold">Login</h2>
                        <p>To Start Your Explore</p>
                    </div>
                    <img src="images/loginphotocover.jpg" class="object-cover-fit " width="100%" height="400px" alt="">
                </div>
            </div>
            <div>
                <?php
                if (isset($_GET["logined"]) && $_GET["logined"] == false) {
                ?>
                    <div id="alert" class="text-center alert alert-danger alert-dismissible fade show rounded-25 mt-2 shadow-lg " role="alert">
                        Email atau Password salah !
                    </div>
                <?php }  ?>
                <?php
                if (isset($_GET["registered"]) && $_GET["registered"] == true) {
                ?>
                    <div id="alert" class="text-center alert alert-success alert-dismissible fade show rounded-25 mt-2 shadow-lg " role="alert">
                        Akun Berhasil Dibuat ^_^
                    </div>
                <?php } ?>
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