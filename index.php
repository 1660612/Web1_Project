<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_GET['user_name']) && isset($_GET['password']))
        {
            echo "Chao ban ".$_GET['user_name']." den voi Website"; 
        }
    ?>
</body>
</html>