<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/27/2018
 * Time: 11:20 AM
 */
session_start();
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
if(!isset($_SESSION['cart']))
{
    $_SESSION['cart'] = array();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop Quần Áo Nam</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/all.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <script src="../js/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="../js/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/javascript.js"></script>
    <link rel="icon" type="image/png" href="../img/shopping_bag.png" />
</head>
<body>
<!-- Header -->
<?php
    include("./layouts/header.php");
?>
<!-- -->

<!-- Menu -->
<?php
    include("./layouts/menu.php");
?>
<!--  -->

<!-- Slide -->
<?php
include("./layouts/slide.php");
?>
<!--  -->

<!--  Content-->
<?php
    if(isset($_GET['id']) && isset($_GET['a']))
    {
        if($_GET['a'] == "1")
        {
            include("./pages/details.php");
        }
        elseif($_GET['a'] == "2")
        {
            $_SESSION['cart'][] = $_GET['id'];
            include("./giohang.php");
        }
        elseif($_GET['a'] == "3")
        {
            echo"<div class='container'>";
            include("./pages/profile_edit.php");
            echo "</div>";
        }
    }
    else{
        include("./pages/content.php");
    }
?>
<!--  -->

<!-- Footer -->
<div class="d-block">
    <?php
    include("./layouts/footer.php");
    ?>
</div>
<!--  -->
</body>
</html>
