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
$query3 = "SELECT id_transaksi, b.judul_buku, jumlah, t.total, t.status, t.alamat, date FROM transaksi t
JOIN buku b ON b.id_buku = t.id_buku ORDER BY date DESC";
$result3 = mysqli_query($conn, $query3);
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
            <a href="income.php">
                <div class="box">
                    <p>Rp. <?= number_format($total_income) ?><br /><span>Total Income</span></p>
                    <i class="fa fa-money-bill-trend-up box-income"></i>
                </div>
            </a>
        </div>
        <div class="col-div-3">
            <a href="">
                <div class="box">
                    <p><?= $total_orders ?><br /><span>Orders</span></p>
                    <i class="fa fa-shopping-bag box-icon"></i>
                </div>
            </a>
        </div>
        <div class="clearfix"></div>
        <br /><br />
        <div class="bg-30">
            <!-- main-content start-->
            <div class="scrollable-content overflow-auto" style="height: 400px;">
                <table class="table py-0" border="0">
                    <tr class="sticky sticky-top">
                        <th class="col-1 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-4">ID Transaksi</div>
                        </th>
                        <th class="col-2 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-4">Buku</div>
                        </th>
                        <th class="col-1 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-4">Jumlah</div>
                        </th>
                        <th class="col-2 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-4">Total Harga</div>
                        </th>
                        <th class="col-2 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-4">Alamat</div>
                        </th>
                        <th class="col-1 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-4">Waktu</div>
                        </th>
                        <th class="col-2 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-4">Status</div>
                        </th>
                        <th class="col-1 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-4"></div>
                        </th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($result3)) : ?>
                        <tr>
                            <td> <input type="text" class="form-control text-center my-3" value="<?= $row["id_transaksi"] ?>" readonly>
                            </td>
                            <td> <input type="text" class="form-control text-center my-3" value="<?= $row["judul_buku"] ?>" readonly>
                            </td>
                            <td> <input type="text" class="form-control text-center my-3" value="<?= $row["jumlah"] ?>" readonly>
                            </td>
                            <td> <input type="text" class="form-control text-center my-3" value="Rp. <?= number_format($row["total"]) ?>" readonly>
                            </td>
                            <td> <input type="text" class="form-control text-center my-3" value="<?= $row['alamat'] ?>" readonly>
                            </td>
                            <td> <input type="date" class="form-control text-center my-3" value="<?= $row['date'] ?>" readonly>
                            </td>
                            <td> <input type="text" class="form-control text-center my-3" value="<?= $row["status"] ?>" readonly>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-secondary my-3 text-center" role=" button">Proses</a>
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