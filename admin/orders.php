<?php
$namaFile = basename($_SERVER['PHP_SELF']);
include '../server/connection.php';
session_start();
if ($_SESSION['status'] == 'User') {
    header('location: ../index.php');
    exit;
}

$query = "SELECT COUNT(*) AS total_orders FROM transaksi";
$query2 = "SELECT sum(total) AS income FROM transaksi WHERE status = 'Success'";
$result = $conn->query($query);
$result2 = $conn->query($query2);
$row_orders = mysqli_fetch_assoc($result);
$row_income = mysqli_fetch_assoc($result2);
$total_orders = $row_orders['total_orders'];
$total_income = $row_income['income'];
?>
<!Doctype HTML>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="../style/fontawesome/css/all.min.css">
</head>


<body>
    <!-- start of sidebar -->
    <?php include 'layout/sidebar.php' ?>
    <!-- end of sidebar -->
    <div id="main">

        <div class="head">
            <div class="col-div-6">
                <span style="font-size:30px;cursor:pointer;" class="nav c-10">☰ Orders</span>
            </div>

            <div class="clearfix"></div>
        </div>

        <div class="clearfix"></div>
        <br />


        <div class="col-div-3">
            <div class="box">
                <p>Rp. <?= number_format($total_income) ?><br /><span>Total Income</span></p>
                <i class="fa fa-money-bill-trend-up box-income"></i>
            </div>
        </div>
        <div class="col-div-3">
            <div class="box">
                <p><?= $total_orders ?><br /><span>Orders</span></p>
                <i class="fa fa-shopping-bag box-icon"></i>
            </div>
        </div>
        <div class="clearfix"></div>
        <br /><br />
        <div class="col-div-8">
            <!-- main-content start-->
            <div class="box-8">
                <div class="content-box">

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