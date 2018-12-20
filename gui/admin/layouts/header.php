<div id="admin_header">
    <a href="./index.php" class="text_none lh-70 text-success text-center" style="font-size: 25px; font-weight:bold; width:225px; display: inline-block">ABC Shop</a>
    <div class="dropdown float-right">
        <button class="float-right text-white dropbtn">
            <?php
                $current_user = (new UserBUS())->GetByID($_SESSION["current_user_id"]);
                echo "<img id='avatar_header' src='../img/admin.png' type='image/png'>"."<div id='header_admin_name'>$current_user->full_name</div>";
            ?>
        </button>
        <div class="dropdown-content">
            <a href="#">Profile</a>
            <a href="../logout.php">Logout</a>
        </div>
    </div>
</div>