<?php
session_start();
$id = $_SESSION['id'];
include 'server/connection.php';
$q = "SELECT * FROM akun WHERE id = $id";
$result = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($result);
include('layouts/header.php');
?>
<section class="profil mt-5 mb-2">
    <div class="container mt-2">
        <div class="d-flex row justify-content-evenly bg-30 p-4 rounded-3 shadow-lg">
            <h1 class="fs-2 mb-5 text-center">Profil</h1>
            <div class="content col-md-4 mt-5 mb-3">
                <img class="d-absolute rounded-circle object-fit-cover ms-5" src="images/profile/<?= $row['photo'] ?>" alt="<?= $row['photo'] ?>" width="250px" height="250px">
            </div>
            <div class="content col-md-4 mt-5 profile-label">
                <h6 class="mb-2">Name:</h6>
                <p><?= $row['name'] ?></p>
                <h6 class="mb-2">Age:</h6>
                <p><?= $row['umur'] ?></p>
                <h6 class="mb-2">Telp:</h6>
                <p><?= $row['telephone'] ?></p>
                <h6>Alamat:</h6>
                <p><?= $row['alamat'] ?></p>
                <h6>Jenis kelamin:</h6>
                <p class=""><?= $row['kelamin'] ?></p>
                <a class="btn btn-sm btn-primary bg-success border-0 py-2 mb-4" href="editProfil.php?" role="button">
                    Edit Profile
                </a>
                <?php
                if (isset($_GET["changePW"]) && $_GET["changePW"] == true) {
                ?>
                    <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
                        Password berhasil diupdate!
                        <a href="profil.php" class="btn-close"></a>
                    </div>
                <?php } else if (isset($_GET["changePW"]) && $_GET["changePW"] == false) { ?>
                    <div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
                        Gagal update Password!
                        <a href="profil.php" class="btn-close"></a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php
include('layouts/footer.php');
?>