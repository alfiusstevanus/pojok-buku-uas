<?php
session_start();
include 'server/connection.php';
$id = $_SESSION['id'];
$q = "SELECT * FROM akun WHERE id = $id";
$result = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($result);
$_SESSION['photo'] = $row['photo'];
$title = '| Edit profile';
include('layouts/header.php');
?>
<section class="editProfil mt-5 mb-2">
    <div class="container mt-2">
        <div class="d-flex row justify-content-evenly p-5 rounded-3 shadow-lg">
            <h1 class="fs-2 mb-5 text-center">User Akun</h1>
            <div class="content col-md-4 mt-5 mb-3">
                <img class="d-absolute rounded-circle object-fit-cover ms-5 mt-5" src="images/profile/<?= $row['photo'] ?>" alt="<?= $row['name'] ?>.jpg" width="250px" height="250px">
            </div>
            <div class="content col-md-6 fs-5">
                <form method="post" action="controller/updateUser.php?id=<?= $row['id'] ?>" enctype="multipart/form-data">
                    <div>
                        <p>Name:</p>
                        <input type="text" name="nama" class="form-control my-3" value="<?= $row['name'] ?>" required>
                    </div>
                    <div>
                        <p>Age:</p>
                        <input type="text" name="umur" class="form-control my-3" value="<?= $row['umur'] ?>" required>
                    </div>
                    <div>
                        <p>Telp:</p>
                        <input type="text" name="telp" class="form-control my-3" value="<?= $row['telephone'] ?>" required>
                    </div>
                    <div>
                        <p>Age:</p>
                        <label class="form-check-label form-control my-3">
                            <input type="radio" name="kelamin" value="Laki - laki" required <?php
                                                                                            if ($row['kelamin'] == 'Laki - laki') {
                                                                                                echo 'checked';
                                                                                            }
                                                                                            ?>> Man
                        </label>
                        <label class="form-check-label form-control my-3">
                            <input type="radio" name="kelamin" value="Perempuan" required <?php
                                                                                            if ($row['kelamin'] == 'Perempuan') {
                                                                                                echo 'checked';
                                                                                            }
                                                                                            ?>> Woman
                        </label>
                    </div>
                    <div>
                        <p>Alamat:</p>
                        <input type="text" name="alamat" class="form-control my-3" value="<?= $row['alamat'] ?>" required>
                    </div>
                    <div>
                        <p>Foto Profil:</p>
                        <input type="file" name="photo" class="form-control my-3">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary btn-success mt-3" name="up" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include('layouts/footer.php');
?>