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
    if(!isset($_SESSION["current_user_id"]) || UserDAO::is_admin($_SESSION['current_user_id']) == false)
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
            else if($a == 5)
            {
                if(isset($_GET['bus']))
                {
                    include_once("./pages/".$_GET['bus']."/user_form.php");
                }
            }
            ?>
        </div>

        <?php
            include_once("./layouts/footer.php");
        ?>
    </body>
    </html>
