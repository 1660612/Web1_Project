<h2 class="text-center" style="margin-bottom: 20px; margin-top: 20px;">
    <?php
    echo isset($_GET['id']) ? "Thay đổi thông tin cá nhân" : "Thêm người dùng";
    ?>
</h2>
<form id="form" method="post" enctype="multipart/form-data" action="./pages/user/<?php isset($_GET['id']) ? $action = 'edit.php?id='.$_GET['id'] : $action = 'add.php'; echo $action; ?>" autocomplete="off" style="width:355px;">
    <?php if($action == 'add.php') { ?>
    <label class="display-block float-left label-form" style="width: 130px;">Tên đăng nhập:</label> <input type="text" name="username" class="display-block" onkeypress="error_delete('username_error')" placeholder="Nhập tên tài khoản..."/>
        <?php if(isset($_GET['error']) && $_GET['error'] == 1){
            echo "<span id='username_error' class='m-l-110 display-block text-danger' style='height: 25px'>Tên đăng nhập đã tồn tại</span>";
        }?>
    <label class="display-block float-left label-form" style="width: 130px;">Mật khẩu:</label> <input type="password" name="password" class="display-block" placeholder="Nhập mật khẩu..."/>
    <label class="display-block float-left label-form" style="width: 130px;">Xác nhận mật khẩu:</label> <input type="password" name="password" class="display-block" placeholder="Nhập mật khẩu..."/>
    <?php } ?>
    <label class="display-block float-left label-form" style="width: 130px;">Avatar:</label> <div id="style-file" onclick="upload_file()">Choose Image File<input id="image_file" size="60" type="file" name="avatar"/></div>
    <label class="display-block float-left label-form" style="width: 130px;">Tên hiển thị:</label> <input type="text" name="fullname" class="display-block" placeholder="Nhập tên hiển thị..."/>
    <label class="display-block float-left label-form" style="width: 130px;">Địa chỉ:</label> <input type="text" name="address" class="display-block" placeholder="Nhập địa chỉ..."/>
    <label class="display-block float-left label-form" style="width: 130px;">Số điện thoại:</label> <input type="text" name="phone_number" class="display-block" placeholder="Nhập số điện thoại..."/>
    <label class="display-block float-left label-form" style="width: 130px;">Email:</label> <input type="text" name="email" class="display-block" placeholder="Nhập email..."/>
    <label class="display-block float-left label-form" style="width: 130px;">Loại tài khoản:</label> <select><?php foreach((new RoleBUS())->GetAll() as $role) echo "<option>$role->name</option>"; ?></select>
    <input class="text-center btn btn-submit" type="submit" name="submit" value="Submit" style="margin-left: 155px;" />
</form>

<script>
    header_change("Tài khoản", "./index.php?a=2");
    document.getElementById("user_link").setAttribute("style", "background-color: #b3c734;");
</script>