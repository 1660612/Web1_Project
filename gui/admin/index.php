<?php
    include("../controllers/users/sessions_controller.php");
    include("../lib/DataProvider.php");
    $title = "Admin Page";
?>

<?php
    if(!isset($_SESSION["user_name"]) || DataProvider::is_admin() == false)
    {
        header("Refresh:0; url=../login.php");
    }
    else {
        $user = $_SESSION['user_name'];
        $pass = $_SESSION['password'];
        $result = DataProvider::ExecuteQuery("select * from TaiKhoan where TenDangNhap = '$user' and MatKhau = '$pass'");
        $check = mysqli_fetch_array($result);
        if(!isset($check))
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
            <link rel="stylesheet" href="../css/style.css" />
            <script src="../js/javascript.js"></script>
            <link rel="icon" type="image/png" href="../img/admin.png" />
        </head>
        <body>
            <?php
            include_once("./layouts/header.php");
            ?>

            <?php
                include_once("./layouts/menu.php");
            ?>

            <div id="admin_content">
                <?php
                    include_once("./layouts/sub-header.php");
                ?>

                <?php
                    if(isset($_GET['a']))
                    {
                        $a = $_GET['a'];
                        if($a == 1)
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
                    }
                ?>
            </div>

            <?php
                include_once("./layouts/footer.php");
            ?>
        </body>
        </html>
        <?php
    }
?>