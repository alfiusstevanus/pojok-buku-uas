<?php
session_start();
$title = '| My Cart';
include('layouts/header.php');
?>
<section class="cart mt-5 mb-2">
    <div class="container mt-3 ">
        <div class="div d-flex row justify-content-center p-5 rounded-3 shadow-lg">
            <div class="d-flex row align-items-center">
                <div class="col-md-4 ">
                    <h1 class="fs-1 welcoming py-4">Cart</h1>
                </div>
            </div>
            <table class="table" border="1">
                <tr>
                    <th class="col-1 text-center">ID Buku</th>
                    <th class="col-2 text-center">Judul</th>
                    <th class="col-2 text-center">Penerbit</th>
                    <th class="col-2 text-center">Penulis</th>
                    <th class="col-2 text-center">Harga</th>
                    <th class="col-1 text-center"></th>
                    <th class="col-1 text-center"></th>
                </tr>
                <?php
                $grandtotal = 0;
                foreach ($_SESSION['cart'] as $cart => $val) {
                    $subtotal = $val["harga"] * 1;
                ?>
                    <tr>
                        <td> <input type="text" class="form-control text-center my-3" value="<?= $val["id_buku"] ?>" readonly>
                        </td>
                        <td> <input type="text" class="form-control text-center my-3" value="<?= $val["judul"] ?>" readonly>
                        </td>
                        <td> <input type="text" class="form-control text-center my-3" value="<?= $val["penerbit"] ?>" readonly>
                        </td>
                        <td> <input type="text" class="form-control text-center my-3" value="<?= $val["penulis"] ?>" readonly>
                        </td>
                        <td> <input type="text" class="form-control text-center my-3" value="Rp. <?= number_format($val['harga']) ?>" readonly>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-success my-3 text-center" href="detil-buku.php?id=<?= $val["id_buku"] ?>" role="button">Beli</a>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-danger my-3 text-center" href="controller/hapus-cart.php?id=<?= $cart ?>" role="button">Hapus</a>
                        </td>
                    </tr>
                <?php
                    $grandtotal += $subtotal;
                }
                ?>
                <th colspan="4"></th>
                <th>
                    <h5>Total: <span class="c-10">Rp. <?= number_format($grandtotal) ?></span></h5>
                </th>
                <th>&nbsp;</th>
            </table>
        </div>
    </div>
</section>
<?php
include('layouts/footer.php');
?>