<?php
$namaFile = basename($_SERVER['PHP_SELF']);
include '../server/connection.php';
session_start();
if ($_SESSION['status'] == 'User') {
    header('location: ../index.php');
    exit;
}

$query1 = "SELECT COUNT(*) AS total_user FROM akun WHERE status = 'User'";
$query2 = "SELECT COUNT(*) AS total_buku FROM buku";
$query3 = "SELECT COUNT(*) AS total_orders FROM transaksi";
$query4 = "SELECT sum(total) AS income FROM transaksi WHERE status = 'Success'";

$result1 = $conn->query($query1);
$result2 = $conn->query($query2);
$result3 = $conn->query($query3);
$result4 = $conn->query($query4);

$row_user = mysqli_fetch_assoc($result1);
$row_buku = mysqli_fetch_assoc($result2);
$row_orders = mysqli_fetch_assoc($result3);
$row_income = mysqli_fetch_assoc($result4);

$total_user = $row_user['total_user'];
$total_buku = $row_buku['total_buku'];
$total_orders = $row_orders['total_orders'];
$total_income = $row_income['income'];
$q = "SELECT * FROM akun WHERE id = 1";
$result = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($result);
?>
<!Doctype HTML>
<html>

<head>
    <title>Book Corner | Admin</title>
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="../style/fontawesome/css/all.min.css">
    <link rel="icon" href="../images/logo books corner 2.png">
</head>


<body>
    <!-- start of sidebar -->
    <?php include 'layout/sidebar.php' ?>
    <!-- end of sidebar -->
    <div id="main">

        <div class="head">
            <div class="col-div-6">
                <span style="font-size:30px;cursor:pointer;" class="nav c-10">☰ Dashboard</span>
            </div>

            <div class="clearfix"></div>
        </div>

        <div class="clearfix"></div>
        <br />

        <div class="col-div-3">
            <a href="customer.php">
                <div class="box">
                    <p><?= $total_user ?><br /><span>Customers</span></p>
                    <i class="fa fa-users box-icon"></i>
                </div>
            </a>
        </div>
        <div class="col-div-3">
            <a href="book.php">
                <div class="box">
                    <p><?= $total_buku ?><br /><span>Books</span></p>
                    <i class="fa fa-book box-icon"></i>
                </div>
            </a>
        </div>
        <div class="col-div-3">
            <a href="income.php">
                <div class="box">
                    <p><?= number_format($total_income) ?> IDR<br /><span>Total Income</span></p>
                    <i class="fa fa-money-bill-trend-up box-income"></i>
                </div>
            </a>
        </div>
        <div class="col-div-3">
            <a href="orders.php">
                <div class="box">
                    <p><?= $total_orders ?><br /><span>Orders</span></p>
                    <i class="fa fa-shopping-bag box-icon"></i>
                </div>
            </a>
        </div>
        <div class="clearfix"></div>
        <br /><br />
        <div class="col-div-8">
            <!-- main-content start-->
            <div class="box-8">
                <div class="container mt-2">
                    <div class="d-flex row justify-content-evenly bg-30 p-4 rounded-3 shadow-lg">
                        <h1 class="fs-2 mb-5 text-center">You are an <span class="c-10">Admin</span>!</h1>
                        <div class="content col-md-4 mt-5 mb-3">
                            <img class="d-absolute rounded-circle object-fit-cover ms-5" src="../images/profile/default.jpg" alt="admin.jpg" width="150px" height="150px">
                        </div>
                        <div class="content col-md-4 mt-5 profile-label">
                            <h6 class="mb-2">Name:</h6>
                            <p><?= $row['name'] ?></p>
                            <h6 class="mb-2">Age:</h6>
                            <p><?= $row['umur'] ?></p>
                            <h6>Address:</h6>
                            <p><?= $row['alamat'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main-content end-->
        </div>
        <div class="clearfix"></div>
    </div>




</body>
<script src="js/bootstrap.bundle.js"></script>
<script src="../js/bootstrap.js"></script>

</html>