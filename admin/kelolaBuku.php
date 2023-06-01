<?php
$namaFile = 'book.php';
include '../server/connection.php';
session_start();
if ($_SESSION['status'] == 'User') {
    header('location: ../index.php');
    exit;
}

$query = "SELECT COUNT(*) AS total_buku FROM buku";
$result = $conn->query($query);
$row_buku = mysqli_fetch_assoc($result);
$total_buku = $row_buku['total_buku'];
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
                <span style="font-size:30px;cursor:pointer; " class="nav c-10">☰ Books</span>

            </div>

            <div class="clearfix"></div>
        </div>

        <div class="clearfix"></div>
        <br />


        <div class="col-div-3">
            <div class="box">
                <p><?= $total_buku ?><br /><span>Total Books</span></p>
                <i class="fa fa-book box-icon"></i>
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