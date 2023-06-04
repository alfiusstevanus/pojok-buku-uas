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
                    <?php if (empty($_SESSION['cart'])) { ?>
                        <h1 class="fs-4 py-4 text-danger text-center">You don't have anything in Cart!</h1>
                    <?php } else { ?>
                        <h1 class="fs-1 welcoming py-4">Cart</h1>
                </div>
            </div>
            <table class="table" border="1">
                <tr>
                    <th class="col-1 text-center">Book ID</th>
                    <th class="col-2 text-center">Title</th>
                    <th class="col-2 text-center">Publisher</th>
                    <th class="col-2 text-center">Author</th>
                    <th class="col-2 text-center">Price</th>
                    <th class="col-1 text-center" colspan="2">Action</th>
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
                        <td> <input type="text" class="form-control text-center my-3" value="<?= number_format($val['harga']) ?> IDR" readonly>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-success my-3 text-center" href="detil-buku.php?id=<?= $val["id_buku"] ?>" role="button">Beli</a>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-danger my-3 text-center" role="button" data-bs-toggle="modal" data-bs-target="#deleteCart<?= $val["id_buku"] ?>">Hapus</a>
                        </td>
                    </tr>
                    <div class="modal fade z-index-9" id="deleteCart<?= $val["id_buku"] ?>" tabindex="-1" aria-labelledby="deleteCartLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Cart</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Do you want to delete "<?= $val["judul"] ?>" from Cart?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <a href="controller/hapus-cart.php?id=<?= $cart ?>" type=" button" class="btn btn-danger pointer-cursor">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                            $grandtotal += $subtotal;
                        }
                ?>
                <th colspan="4"></th>
                <th>
                    <h5>Total: <span class="c-10"><?= number_format($grandtotal) ?> IDR</span></h5>
                </th>
                <th>&nbsp;</th>
            </table>
        </div>
    </div>
<?php } ?>
</section>
<?php
include('layouts/footer.php');
?>