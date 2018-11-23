<?php
    include_once("lib/DataProvider.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kid Shop</title>
    <link rel="stylesheet" href="./css/style.css" type="text/css" /> 
</head>
<body>
    <div id="container">
        <div id="header">
            <?php include("modules/mHeader.php");?>
        </div>
        <div id="nav">
            <?php include("modules/mMenu.php"); ?>
        </div>
        <div id="content">
            <?php
                $a=1;
                if(isset($_GET["a"])){
                    $a = $_GET["a"];
                }
                switch ($a) {
                    case 1:
                        include("pages/pIndex.php");
                        break;
                    case 2:
                        include("pages/pListOfProduct.php");
                        break;
                    case 3:
                        include("pages/pProductDetail.php");
                        break;
                    default:
                        include("pages/pError.php");
                        break;
                }
            ?>
        </div>
        <div id="footer">
                <?php include("modules/mFooter.php") ?>
        </div>
    </div>
</body>
</html>