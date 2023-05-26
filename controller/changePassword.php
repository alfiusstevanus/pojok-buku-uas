<?php
include '../server/connection.php';
$id = $_GET['id'];
$q = "Select password from akun WHERE id = $id";
$r = mysqli_query($conn, $q);
if (!$r) {
    die(mysqli_error($conn));
} else {
    $row = mysqli_fetch_assoc($r);
}
$oldpW1 = $_POST['oldPW1'];
$oldpW2 = $_POST['oldPW2'];
$newpW = $_POST['newPw'];


if ($oldpW1 == $oldpW2 && $oldpW2 == $row['password']) {
    $query = "UPDATE akun SET password = '$newpW' WHERE id = $id";
    mysqli_query($conn, $query);
    $status = 1;
} else {
    $status = 0;
}


header("location:../profil.php?changePW=$status");
die();
