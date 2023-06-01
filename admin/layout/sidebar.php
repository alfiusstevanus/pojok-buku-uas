<div id="mySidenav" class="sidenav">
    <p class="logo c-10"><span><img src="../images/logo books corner 2.png" class="object-fit-cover" height="100px" alt=""></span> Admin</p>
    <a href="index.php" class="icon-a <?php if ($namaFile == 'index.php') echo 'click'; ?>"><i class="fa fa-dashboard icons"></i> Dashboard</a>
    <a href="customer.php" class="icon-a <?php if ($namaFile == 'customer.php') echo 'click'; ?>"><i class="fa fa-users icons"></i> Customers</a>
    <a href="book.php" class="icon-a <?php if ($namaFile == 'book.php') echo 'click'; ?>"><i class="fa-solid fa-book"></i> Books</a>
    <a href="orders.php" class="icon-a <?php if ($namaFile == 'orders.php') echo 'click'; ?>"><i class="fa fa-shopping-bag icons"></i> Orders</a>
    <a data-bs-toggle="modal" data-bs-target="#logout" class="icon-a text-danger pointer-cursor"><i class="fa fa-right-from-bracket icons"></i> Log out</a>
</div>
<!-- modal logout -->
<div class="modal fade z-index-9" id="logout" tabindex="-1" aria-labelledby="logoutLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>You will exit this session and login again, Are you sure you want to Log out? </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="../index.php?logout=1" type=" button" class="btn btn-danger">logout</a>
            </div>
        </div>
    </div>
</div>
<!-- akhir dari modal logout -->