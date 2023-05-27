<?php include("server/conn.php");

$id = $_SESSION['id'];

if (!isset($_SESSION['status'])) {
    header('location: login.php');
    exit;
}

$query = mysqli_query($conn, "SELECT password FROM akun WHERE id = $id");
$row = mysqli_fetch_row($query);
$old_pw = $row[0];

if (isset($_POST['btn_update'])) {
    if ($_POST['old_password'] == $old_pw) {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm-password'];
        $telephone = $_POST['telephone'];
        $status = $_POST['status'];
        $photo = $_POST['photo'];

        if ($password == $confirm_password) {
            if ($password == NULL) {
                $password = $old_pw;
            }

            $sql = "UPDATE akun SET email = '$email',
                                            name = '$name',
                                            password = '$password',
                                            telephone = '$telephone',
                                            status = 'User',
                                            photo = '$photo'
                                            WHERE id = '$id'";

            $query = mysqli_query($conn, $sql);
            if ($query) {
                echo "<script>alert('Profil Berhasil di Update')</script>";
                echo "<script>window.location.href='index.php'</script>";
            } else {
                echo "<script>alert('Update Gagal')</script>";
                echo "<script>window.location.href='index.php'</script>";
            }
        } else {
            echo "<script>alert('Password baru Tidak Sama')</script>";
        }
    } else {
        echo "<script>alert('Password lama tidak sesuai')</script>";
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


    <title>Update Profil</title>

</head>

<body>
    <script>
        function check() {
            if (document.getElementById('cb_pass').checked) {
                document.getElementById('pass').disabled = false;
                document.getElementById('confirm-pass').disabled = false;
            } else {
                document.getElementById('pass').disabled = true;
                document.getElementById('confirm-pass').disabled = true;
            }
        }
    </script>
    <div class="container">
        <center>
            <div class="update_register">
                <div class="top">
                    <h3>Update Profil</h3>
                </div>
                <div class="box">
                    <form method="POST" action="update-profil.php">
                        <div class="input">
                            <input type="text" class="Textbox" name="email" placeholder="Email" value="<?= $_SESSION['email']; ?>" required>
                        </div>
                        <div class="input">
                            <input type="text" class="Textbox" name="name" placeholder="Name" value="<?= $_SESSION['name']; ?>" required>
                        </div>
                        <div class="input">
                            <input type="password" class="Textbox" name="old_password" placeholder="Old Password" required>
                        </div>
                        <input type="checkbox" id="cb_pass" onclick="check();"><label for="cb_pass">Ubah Password</label>
                        <div class="input">
                            <input type="password" class="Textbox" name="password" id="pass" placeholder="New Password" disabled required>
                        </div>
                        <div class="input">
                            <input type="password" class="Textbox" name="confirm-password" id="confirm-pass" placeholder="Confirm New Password" disabled required>
                        </div>
                        <div class="input">
                            <input type="text" class="Textbox" name="telephone" placeholder="telephone" value="<?= $_SESSION['telephone']; ?>" required>
                        </div>
                        <div class="input">
                            <input type="file" class="Textbox" name="photo" placeholder="Photo" value="<?= $_SESSION['photo']; ?>" required>
                        </div>
                        <div class="input">
                            <input type="submit" class="btn btn-primary " name="btn_update" value="Update">
                            <input type="submit" class="btn btn-secondary" name="btn_update" onclick="location.href='index.php'" value="Kembali">
                        </div>
                    </form>
                </div>
            </div>
        </center>
    </div>
</body>

</html>