<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/27/2018
 * Time: 11:26 AM
 */
?>
<div id="Header" class="row">

    <h4 class="text-center col-sm-8" style="line-height: 60px;">Shop quần áo nam</h4>


    <div class="col-sm-3" style="margin-top: 11px;">
        <?php if(isset($_SESSION['current_user_id']) == false){
            echo "<a href='../login.php' class='btn btn-primary' style='height: 40px;'>Đăng nhập</a>";
        }
        elseif(isset($_SESSION['current_user_id']) == true)
        {
            echo "<a href='../logout.php' class=\"btn btn-dark text-white\" style=\"height: 40px;\">Đăng xuất</a>";
        }
        ?>
    </div>
    <?php
    if(isset($_SESSION['current_user_id']) == false)
    {
        echo "<div class='col-sm-1'></div>";
    }
    else
    {
        ?>
        <div class="col-sm-1">
            <div id="icon-card">
                <a href="#" >
                    <img src="../img/Slide/giohang.png" height="30px" width="30px" style="margin-top:4px"/>
                    <p>Giỏ Hàng</p>
                </a>
            </div>
        </div>
    <?php } ?>
</div>
