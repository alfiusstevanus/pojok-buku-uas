<?php
session_start();
include 'server/connection.php';
$title = '| Transaction';
include('layouts/header.php');
$id = $_SESSION['id'];
$query = "SELECT buku.id_buku, id_transaksi, date, buku.judul_buku,
buku.harga, jumlah, total, status FROM transaksi JOIN buku ON
transaksi.id_buku = buku.id_buku WHERE transaksi.id = $id and (transaksi.status = 'In Progress' OR transaksi.status = 'Shipped' OR transaksi.status = 'Success')";
$result = mysqli_query($conn, $query);
$subtotal = 0;
?>
<section class="transaction mt-5 mb-2">
    <div class="container mt-2 ">
        <div class="div d-flex row justify-content-center p-5 rounded-3 shadow-lg">
            <table class="table" border="1">
                <tr>
                    <th class="col-1 text-center">ID Transaction</th>
                    <th class="text-center">Date</th>
                    <th class="col-2 text-center">Book</th>
                    <th class="text-center">Price</th>
                    <th class="col-1 text-center">Amount</th>
                    <th class="text-center">Total</th>
                    <th class="text-center">Status</th>
                    <th class="col-1 text-center">Action</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td> <input type="text" name="id_transaksi" class="form-control text-center my-3" value="<?= $row["id_transaksi"] ?>" readonly>
                        </td>
                        <td> <input type="text" name="date" class="form-control text-center my-3" value="<?= date("d F Y", strtotime($row['date'])); ?>" readonly>
                        </td>
                        <td> <input type="text" name="judul_buku" class="form-control text-center my-3" value="<?= $row["judul_buku"] ?>" readonly>
                        </td>
                        <td> <input type="text" name="harga" class="form-control text-center my-3" value="Rp. <?= number_format($row['harga']) ?>" readonly>
                        </td>
                        <td> <input type="text" name="jumlah" class="form-control text-center my-3" value="<?= $row["jumlah"] ?>" readonly>
                        </td>
                        <td> <input type="text" name="total" class="form-control text-center my-3" value="Rp. <?= number_format($row['total']) ?>" readonly>
                        </td>
                        <td> <input type="text" name="status" class="form-control text-center my-3" value="<?= $row["status"] ?>" readonly>
                        </td>
                        <td>
                            <?php if ($row['status'] == 'Success') { ?>
                                <a class="btn btn-primary my-3" href="detil-buku.php?id=<?= $row["id_buku"] ?>" role="button">Re-purchase</a>
                            <?php } else if ($row['status'] == 'Shipped') { ?>
                                <a class="btn btn-success my-3 text-center" data-bs-toggle="modal" data-bs-target="#transaksiSelesai<?= $row['id_transaksi'] ?>" role=" button">Done</a>
                            <?php } else if ($row['status'] == 'In Progress') { ?>
                                <p class="text-center mt-4 c-10">On going!</p>
                            <?php } ?>
                        </td>
                    </tr>
                    <div class="modal fade" id="transaksiSelesai<?= $row['id_transaksi'] ?>" tabindex="-1" aria-labelledby="transaksiSelesaiLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="transaksiSelesaiLabel">ID Transaction: <?= $row['id_transaksi'] ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="controller/updateStatus.php?id=<?= $row['id_transaksi'] ?>">
                                        <div class="container">
                                            <div>
                                                <h5>Status:</h5>
                                                <select class="mb-3 text-center bg-60 py-1" name="newStatus" required>
                                                    <option value="">Change to Received</option>
                                                    <option value="Success">Received</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger mt-3" data-bs-dismiss="modal">Cancel</button>
                                                <input type="submit" class="btn btn-success mt-3" value="Done">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php $subtotal += $row['total'];
                endwhile ?>
                <th colspan="5"></th>
                <th colspan="3">
                    <p class="fs-4">My Spending: <span class="c-10">Rp. <?= number_format($subtotal) ?></span></p>
                </th>
                <th></th>
                <th>&nbsp;</th>
            </table>
        </div>
    </div>
</section>
<?php
include('layouts/footer.php');
?>