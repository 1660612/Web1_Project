<div id="admin_header" class="bg-dark">
    <div id="show_menu" class="float-left ml-3 h-100" style="display: none; line-height: 70px;">
        <button class="btn btn-default"><i class="fa fa-bars"></i></button>
    </div>
    <div class="d-inline-block h-100 ml-3">
        <a class="d-inline-block align-middle" href="./index.php" style="font-size: 25px; font-weight:bold;">
            ABC Shop
        </a>
        <div class="align-middle h-100"></div>
    </div>
    <div class="float-right h-100">
        <ul class="nav float-right d-inline-block" style="line-height: 60px;">
            <li class="dropdown">
                <a id="dropdown_info" href="#" class="dropdown-toggle mr-5 align-middle" data-toggle="dropdown">
                    <span class="fa fa-user-circle">
                        <?php
                            $current_user = (new UserBUS())->GetByID($_SESSION["current_user_id"]);
                            echo "<div class='m-r-1' style='display: inline-block;'>$current_user->full_name</div>";
                        ?>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#"><span class="fa fa-user pull-right"></span> Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="../logout.php"><span class="fa fa-sign-out-alt pull-right"></span> Sign Out</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>