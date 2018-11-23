<div id="admin_header">
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