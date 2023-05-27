<?php
session_start();
include 'server/connection.php';
$id = $_SESSION['id'] = 122;
$query = "SELECT buku.id_buku, id_transaksi, date, buku.judul_buku,
buku.harga, jumlah, total, status FROM transaksi JOIN buku ON
transaksi.id_buku = buku.id_buku WHERE transaksi.id = $id";
$result = mysqli_query($conn, $query);
include('layouts/header.php');
$subtotal = 0;
?>
<section class="transaction mt-5 mb-2">
    <div class="container mt-2 ">
        <div class="div d-flex row justify-content-center p-5 rounded-3 shadow-lg">
            <table class="table" border="1">
                <tr>
                    <th class="col-1 text-center">ID Transaksi</th>
                    <th class="text-center">Tanggal</th>
                    <th class="col-2 text-center">Buku</th>
                    <th class="text-center">Harga</th>
                    <th class="col-1 text-center">Jumlah</th>
                    <th class="text-center">Total</th>
                    <th class="text-center">Status</th>
                    <th class="col-1 text-center"></th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td> <input type="text" name="id_transaksi" class="form-control text-center my-3" value="<?php echo $row["id_transaksi"] ?>" readonly>
                        </td>
                        <td> <input type="text" name="date" class="form-control text-center my-3" value="<?php echo date("d F Y", strtotime($row['date'])); ?>" readonly>
                        </td>
                        <td> <input type="text" name="judul_buku" class="form-control text-center my-3" value="<?php echo $row["judul_buku"] ?>" readonly>
                        </td>
                        <td> <input type="text" name="harga" class="form-control text-center my-3" value="Rp. <?= number_format($row['harga']) ?>" readonly>
                        </td>
                        <td> <input type="text" name="jumlah" class="form-control text-center my-3" value="<?php echo $row["jumlah"] ?>" readonly>
                        </td>
                        <td> <input type="text" name="total" class="form-control text-center my-3" value="Rp. <?= number_format($row['total']) ?>" readonly>
                        </td>
                        <td> <input type="text" name="status" class="form-control text-center my-3" value="<?php echo $row["status"] ?>" readonly>
                        </td>
                        <td>
                            <a class="btn btn-success my-3" href="detil-buku.php?id=<?= $row["id_buku"] ?>" role="button">Beli Lagi</a>
                        </td>
                    </tr>
                <?php $subtotal += $row['total'];
                endwhile ?>
                <th colspan="6"></th>
                <th>Total belanja saya:</th>
                <th>Rp. <?= number_format($subtotal) ?></th>
                <th>&nbsp;</th>
            </table>
        </div>
    </div>
</section>
<?php
include('layouts/footer.php');
?>