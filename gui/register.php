<?php
/**
 * Created by PhpStorm.
 * User: Tien Quach
 * Date: 12/9/2018
 * Time: 4:48 PM
 */
foreach(glob("../DAO/*.php") as $filename)
{
    include $filename;
}
foreach(glob("../DTO/*.php") as $filename)
{
    include $filename;
}
foreach(glob("../BUS/*.php") as $filename)
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
    <title>Đăng ký</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/all.min.css" />
    <link rel="stylesheet" href="./css/style.css" />


    <!-- jQuery library -->
    <script src="./js/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="./js/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="./js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="../img/admin.png" />
    <script src="./js/javascript.js"></script>
    <style>
        #register{
            width: 390px;
        }
    </style>
    <script>
        function validate()
        {
            if($("input[name='password']").val() != $("input[name=retype_password]").val())
            {
                $("#valid_pass").css("visibility","visible");
            }
            else if($("input[name='password']").val() == $("input[name=retype_password]").val())
            {
                $("#valid_pass").css("visibility","hidden");
            }
        }
    </script>
</head>
<body>
<div id="register" class="mx-auto">
    <h2 class="text-center font-weight-bold display-6 text-info" style="margin-bottom: 20px; margin-top: 20px;">
        Đăng ký
    </h2>
    <form id="form" class="w-100" method="post" enctype="multipart/form-data" action="./create_user.php" autocomplete="off" style="width:355px;">
        <div class="form-group row">
            <label class="col-sm-4">Tên đăng nhập:</label>
            <input type="text" name="username" class="form-control col-sm-8" onkeypress="error_delete('username_error')" placeholder="Nhập tên tài khoản..."/>
            <?php if(isset($_GET['error']) && $_GET['error'] == 1){
                echo "<label class=\"col-sm-4\"></label>
                  <span id='username_error' class='col-sm-8 d-block text-danger'>Tên đăng nhập đã tồn tại</span> ";
            }?>
        </div>
        <div class="form-group row">
            <label class="col-sm-4">Mật khẩu:</label>
            <input type="password" name="password" class="form-control col-sm-8" placeholder="Nhập mật khẩu..."/>
        </div>
        <div class="form-group row">
            <label class="col-sm-4">Xác nhận mật khẩu:</label>
            <input type="password" name="retype_password" class="form-control col-sm-8" placeholder="Nhập mật khẩu..." onblur="validate()"/>
            <label class="col-sm-4"></label>
            <span id="valid_pass" class='col-sm-8 d-block text-danger' style="visibility: hidden">Mật khẩu không khớp</span>
        </div>
        <div class="form-group row">
            <label class="col-sm-4">Avatar:</label>
            <div id="style-file" class="btn btn-sm btn-primary" onclick="upload_file()" style="width: 150px;">Choose Image File<input id="image_file" size="60" type="file" name="avatar" class="invisible"/></div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4">Tên hiển thị:</label>
            <input type="text" name="fullname" class="form-control col-sm-8" placeholder="Nhập tên hiển thị..."/>
        </div>
        <div class="form-group row">
            <label class="col-sm-4">Địa chỉ:</label>
            <input type="text" name="address" class="form-control col-sm-8" placeholder="Nhập địa chỉ..."/>
        </div>
        <div class="form-group row">
            <label class="col-sm-4">Số điện thoại:</label>
            <input type="text" name="phone_number" class="form-control col-sm-8" placeholder="Nhập số điện thoại..."/>
        </div>
        <div class="form-group row">
            <label class="col-sm-4">Email:</label>
            <input type="text" name="email" class="form-control col-sm-8" placeholder="Nhập email..."/>
        </div>
        <div class="form-group row">
            <input type="hidden" name="role_id" value="3" class="form-control col-sm-8" placeholder="Nhập email..."/>
        </div>
        <div class="text-center">
            <input class="btn btn-primary" type="submit" name="submit" value="Submit" />
        </div>
    </form>
    <div class="text-center mt-2">
        <small class="text-info">Bạn đã có tài khoản <a href="./login.php" class="btn btn-sm btn-info">Đăng nhập</a></small>
    </div>
</div>
</body>
</html>