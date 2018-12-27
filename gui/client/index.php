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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop Quần Áo Nam-Trang Chủ</title>
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
    include("./pages/content.php");
?>
<!--  -->

<!-- Footer -->
<?php
include("./layouts/footer.php");
?>
<!--  -->
</body>
</html>
