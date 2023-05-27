<?php include("server/conn.php");

if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM akun WHERE email = '$email' AND password = '$password'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);

    if ($row['email'] == $email && $row['password'] == $password) {
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row['name'];
        $_SESSION['telephone'] = $row['telephone'];
        $_SESSION['status'] = $row['status'];
        $_SESSION['photo'] = $row['photo'];
        $_SESSION['id'] = $row['id'];

        $_SESSION['status'] = TRUE;

        echo "<script>alert('Login Berhasil')</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Login Gagal')</script>";
        echo "<script>window.location.href='login.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html (lang="es" , dir="ltr" )>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css" />

    <title>Login</title>
</head>

<div class="logo">
    <img src="img/logo1.png">
</div>

<body>
    <div class="login">
        <div class="container">
            <div class="top">
                <h2>Login</h2>
            </div>
            <div class="box">
                <form method="POST" action="login.php">
                    <div class="input">
                        <input type="text" class="Textbox" name="email" placeholder="Email" required>
                    </div>
                    <div class="input">
                        <input type="password" class="Textbox" name="password" placeholder="Password" required>
                    </div>
                    <div class="Submit">
                        <input type="submit" class="btn btn-primary" name="login_btn" value="Login">
                    </div>
                    <h5>Belum Punya Akun? <a href="register.php">Daftar Disini</a></h5>
                </form>
            </div>
        </div>
    </div>
</body>
<style>
    body {
        background: url("img/609931bb5334c.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        background-color: #fff;

    }
</style>

</html>