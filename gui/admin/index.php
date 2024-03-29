<?php
session_start();
$title = "Admin Page";
foreach(glob("../../DAO/*.php") as $filename)
{
    include $filename;
}
foreach(glob("../../DTO/*.php") as $filename)
{
    include $filename;
}
foreach(glob("../../BUS/*.php") as $filename)
{
    include $filename;
}

?>

<?php
    if(!isset($_SESSION["current_user_id"]) || (new UserBUS())->is_admin($_SESSION['current_user_id']) == false)
    {
        header("Refresh:0; url=../login.php");
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="../css/all.min.css" />
        <link rel="stylesheet" href="../css/style.css" />

        <script src="../js/chart.min.js"></script>
        <script src="../js/chart.bundle.min.js"></script>

        <!-- jQuery library -->
        <script src="../js/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="../js/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="../js/bootstrap.min.js"></script>
        <link rel="icon" type="image/png" href="../img/admin.png" />
        <script src="../js/javascript.js"></script>
    </head>
    <body onresize="ResizePage()">
            <?php
                include_once("./layouts/header.php");
            ?>

            <?php
                include_once("./layouts/menu.php");
            ?>
<!--            <div class="bg-danger d-block float-left w-75">das</div>-->
            <div class="d-block float-left" style="width: 85%;">
                <div id="admin_content" class="mx-auto" style="width: 95%;">
                <?php
                    include_once("./layouts/sub-header.php");
                ?>
                <br/>
                <?php
                    $a = 0;
                    if(isset($_GET['a']))
                    {
                        $a = $_GET['a'];
                    }
                    if($a == 0)
                    {
                        include_once("./pages/dashboard.php");
                    }
                    else if($a == 1)
                    {
                        include_once("./pages/products.php");
                    }
                    else if($a == 2)
                    {
                        include_once("./pages/users.php");
                    }
                    else if($a == 3)
                    {
                        include_once("./pages/invoices.php");
                    }
                    else if($a == 4)
                    {
                        include_once("./pages/product_types.php");
                    }
                    else if($a == 5)
                    {
                        if(isset($_GET['bus']))
                        {
                            include_once("./pages/".$_GET['bus']."/form.php");
                        }
                    }
                    else if($a == 6)
                    {
                        include_once("./pages/manufacturers.php");
                    }
                    else if($a == 7)
                    {
                        include_once("./pages/invoice_items.php");
                    }
                ?>
            </div>
            </div>
            <?php
                include_once("./layouts/footer.php");
            ?>
        <script>
            var height = $("#admin_content").height();
            if(height > $(window).height())
            {
                $("#admin_menu").css("height", height+200);
            }
            else
            {
                $("#admin_menu").css("height", $(window).height()+200);
            }
        </script>
    </body>
    </html>
