<?php
    include_once("lib/DataProvider.php");
    include_once("controllers/users/sessions_controller.php");
    if(isset($_SESSION['user_name']) == false)
    {
        header("refresh:0, url='./views/users/login.php'");
    }
    else
    {
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
    Buon ban san pham
</body>
</html>
<?php } ?>