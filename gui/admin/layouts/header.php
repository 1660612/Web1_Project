<div id="admin_header">
    <a href="./index.php" class="text_none lh-70 text-dark text-center" style="font-size: 25px; font-weight:bold; width:225px; display: inline-block">ABC Shop</a>
    <div class="dropdown float-right">
        <button class="float-right text-white dropbtn">
            <?php
                extract($check);
                echo $TenHienThi;
            ?>
        </button>
        <div class="dropdown-content">
            <a href="#">Profile</a>
            <a href="../logout.php">Logout</a>
        </div>
    </div>
</div>