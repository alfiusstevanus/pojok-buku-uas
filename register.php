<?php include("server/conn.php");

if (isset($_POST['btn_register'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $telephone = $_POST['telephone'];
    $status = $_POST['status'];
    $photo = $_POST['photo'];

    if ($password == $confirm_password) {
        $sql = "INSERT INTO akun (email, name, password, telephone, status, photo) VALUES ('$email', '$name', '$password', '$telephone', 'user', '$photo')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "<script>alert('Akun Berhasil dibuat')</script>";
            echo "<script>window.location.href='login.php'</script>";
        } else {
            echo "<script>alert('Register Gagal')</script>";
            echo "<script>window.location.href='register.php'</script>";
        }
    } else {
        echo "<script>alert('Password Tidak Sama')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Register</title>
</head>
<div class="logo">
    <img src="img/logo1.png">
</div>

<body>

    <center>
        <div class="register">
            <div class="container">
                <div class="top">
                    <h2>Register</h2>
                </div>
                <div class="box">
                    <form method="POST" action="register.php">
                        <div class="input">
                            <input type="text" class="Textbox" name="email" placeholder="Email" required>
                        </div>
                        <div class="input">
                            <input type="text" class="Textbox" name="name" placeholder="Name" required>
                        </div>
                        <div class="input">
                            <input type="password" class="Textbox" name="password" placeholder="Password" required>
                        </div>
                        <div class="input">
                            <input type="password" class="Textbox" name="confirm-password" placeholder="Confirm Password" required>
                        </div>
                        <div class="input">
                            <input type="text" class="Textbox" name="telephone" placeholder="telephone" required>
                        </div>
                        <div class="input">
                            <input type="file" class="Textbox" name="photo" placeholder="photo" required>
                        </div>
                        <div class="Submit">
                            <input type="submit" class="btn btn-primary" name="btn_register" value="Register">
                        </div>
                        <h5>Sudah Buat Akun? <a href="login.php">Login Disini</a></h5>
                    </form>
                </div>
            </div>
        </div>
    </center>
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