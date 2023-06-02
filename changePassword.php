<?php
session_start();
include 'server/connection.php';
$id = $_SESSION['id'];
$q = "SELECT * FROM akun WHERE id = $id";
$result = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($result);
$title = '| Change Password!';
include('layouts/header.php');
?>
<section class="changePassword pt-5 pb-2">
    <div class="container mt-2">
        <div class="d-flex row justify-content-evenly p-5 rounded-3 shadow-lg">
            <h1 class="fs-2 mb-5 text-center">Change Password</h1>
            <div class="content col-md-4 mt-2 mb-3">
                <img class="d-absolute rounded-circle m-20 py-4" src="images/profile/<?= $row['photo'] ?>" alt="<?= $row['name'] ?>.jpg" style="width: 300px;">
            </div>
            <div class="content col-md-6 fs-5">
                <form method="post" action="controller/changePassword.php?id=<?= $row['id'] ?>">
                    <div>
                        <p>Email:</p>
                        <input type="text" name="email" class="form-control my-3" value="<?= $row['email'] ?>" required readonly>
                    </div>
                    <div>
                        <p>Old Password:</p>
                        <input type="password" name="oldPW" class="form-control my-3" placeholder="Input Old Password" required>
                    </div>
                    <div>
                        <p>New Password:</p>
                        <input type="password" name="newPW1" class="form-control my-3" placeholder="Input New Password" required>
                    </div>
                    <div>
                        <p>Confirm New Password:</p>
                        <input type="password" name="newPW2" class="form-control my-3" placeholder="Confirm New Password" required>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary btn-success mt-3" name="up" value="Update Password">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
include('layouts/footer.php');
?>