<form id="form" method="post" enctype="multipart/form-data" action="./pages/user/<?php isset($_GET['id']) ? $action = 'edit.php?id='.$_GET['id'] : $action = 'add.php'; echo $action; ?>" autocomplete="off">
    <?php if($action == 'add.php') { ?>
    <label class="display-block float-left label-form">Tên đăng nhập:</label> <input type="text" name="username" class="display-block" onkeypress="error_delete('username_error')"/>
        <?php if(isset($_GET['error']) && $_GET['error'] == 1){
            echo "<span id='username_error' class='m-l-110 display-block text-danger' style='height: 25px'>Tên đăng nhập đã tồn tại</span>";
        }?>
    <label class="display-block float-left label-form">Mật khẩu:</label> <input type="password" name="password" class="display-block"/>
    <?php } ?>
    <label class="display-block float-left label-form">Avatar:</label> <div id="style-file" onclick="upload_file()">Choose Image File<input id="image_file" size="60" type="file" name="avatar"/></div>
    <label class="display-block float-left label-form">Tên hiển thị:</label> <input type="text" name="fullname" class="display-block"/>
    <label class="display-block float-left label-form">Địa chỉ:</label> <input type="text" name="address" class="display-block"/>
    <label class="display-block float-left label-form">Số điện thoại:</label> <input type="text" name="phone_number" class="display-block"/>
    <label class="display-block float-left label-form">Email:</label> <input type="text" name="email" class="display-block"/>
    <label class="display-block float-left label-form">Loại tài khoản:</label> <select><?php foreach((new RoleBUS())->GetAll() as $role) echo "<option>$role->name</option>"; ?></select>

    <input class="text-center btn btn-submit" type="submit" name="submit" value="Submit" />
</form>

<script>
    header_change("Tài khoản", "./index.php?a=2");
    document.getElementById("user_link").setAttribute("style", "background-color: #b3c734;");
</script>