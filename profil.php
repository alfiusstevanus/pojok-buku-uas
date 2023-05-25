<?php
include 'server/connection.php';
$id;
// $q = "SELECT * FROM akun WHERE id = $id";
$q = "SELECT * FROM akun WHERE id = 122";
$result = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($result);
include('layouts/header.php');
?>
<section class="profil mt-5 mb-2">
    <div class="container mt-2">
        <div class="d-flex row justify-content-evenly bg-30 p-4 rounded-3 shadow-lg">
            <h1 class="fs-2 mb-5 text-center">User Akun</h1>
            <div class="content col-md-4 mt-2 mb-3">
                <img class="d-absolute rounded-circle m-20 py-4" src="images/users/justin.jpg" alt="<?= $row['name'] ?>.jpg" style="width: 250px;">
            </div>
            <div class="content col-md-4 mt-4">
                <h6>Nama:</h6>
                <p><?= $row['name'] ?></p>
                <h6>Umur:</h6>
                <p><?= $row['umur'] ?></p>
                <h6>No. Telp:</h6>
                <p><?= $row['telephone'] ?></p>
                <h6>Jenis kelamin:</h6>
                <p class=""><?= $row['kelamin'] ?></p>
                <a class="btn btn-sm btn-primary bg-success border-0 py-2 mb-4" href="editProfil.php?id=<?= $row['id'] ?>" role="button">
                    Edit Akun
                </a>
            </div>
        </div>
    </div>
</section>
<?php
include('layouts/footer.php');
?>