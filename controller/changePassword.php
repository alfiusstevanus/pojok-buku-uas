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
$oldpW = $_POST['oldPW'];
$newpW1 = $_POST['newPW1'];
$newpW2 = $_POST['newPW2'];


if ($oldpW == $row['password'] && $newpW1 == $newpW2) {
    $query = "UPDATE akun SET password = '$newpW1' WHERE id = $id";
    mysqli_query($conn, $query);
    $status = 1;
} else {
    $status = 0;
}


header("location:../profil.php?changePW=$status");
die();
