<?php
$namaFile = 'orders.php';
include '../server/connection.php';
session_start();
if ($_SESSION['status'] == 'User') {
    header('location: ../index.php');
    exit;
}
$query1 = "SELECT sum(total) AS income FROM transaksi WHERE status = 'Success'";
$query2 = "SELECT COUNT(*) AS total_orders FROM transaksi";
$result1 = $conn->query($query1);
$result2 = $conn->query($query2);
$row_income = mysqli_fetch_assoc($result1);
$row_orders = mysqli_fetch_assoc($result2);
$total_income = $row_income['income'];
$total_orders = $row_orders['total_orders'];
$query3 = "SELECT id_transaksi, a.name, total, date, t.status FROM transaksi t
JOIN akun a ON a.id = t.id WHERE t.status = 'Success' ORDER BY date DESC";
$result3 = mysqli_query($conn, $query3);
?>
<!Doctype HTML>
<html>

<head>
    <title>Admin | Income</title>
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
                <span style="font-size:30px;cursor:pointer;" class="nav c-10">☰ Income</span>
            </div>

            <div class="clearfix"></div>
        </div>

        <div class="clearfix"></div>
        <br />


        <div class="col-div-3">
            <a href="">
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
        <div class="col-div-8 bg-30">
            <!-- main-content start-->
            <div class="scrollable-content overflow-auto ms-2" style="height: 400px;">
                <table class="table py-0" border="0">
                    <tr class="sticky sticky-top">
                        <th class="col-2 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-4">ID Transaction</div>
                        </th>
                        <th class="col-4 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-4">Customer Name</div>
                        </th>
                        <th class="col-2 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-4">Income</div>
                        </th>
                        <th class="col-2 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-4">Date Transaction</div>
                        </th>
                        <th class="col-2 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-4">Status</div>
                        </th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($result3)) : ?>
                        <tr>
                            <td> <input type="text" class="form-control text-center my-3" value="<?= $row["id_transaksi"] ?>" readonly>
                            </td>
                            <td> <input type="text" class="form-control text-center my-3" value="<?= $row["name"] ?>" readonly>
                            </td>
                            <td> <input type="text" class="form-control text-center my-3" value="<?= number_format($row["total"]) ?> IDR" readonly>
                            </td>
                            <td> <input type="date" class="form-control text-center my-3" value="<?= $row['date'] ?>" readonly>
                            </td>
                            <td> <input type="text" class="form-control text-center my-3" value="<?= $row['status'] ?>" readonly>
                            </td>
                        </tr>
                    <?php endwhile ?>
                </table>
            </div>
            <!-- main-content end-->
        </div>


        <div class="clearfix"></div>
    </div>





</body>

<script src="js/bootstrap.bundle.js"></script>
<script src="../js/bootstrap.js"></script>

</html>