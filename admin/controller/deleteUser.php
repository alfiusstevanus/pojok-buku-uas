<?php
include "../../server/connection.php";
$id = $_GET['id'];

$query = "DELETE FROM akun WHERE id = $id";
mysqli_query($conn, $query);
header("location: ../customer.php");
