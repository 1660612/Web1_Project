<div id="user_form">
    <form method="post" enctype="multipart/form-data" action="./pages/user/<?php isset($_GET['id']) ? $action = 'edit.php?id='.$_GET['id'] : $action = 'add.php'; echo $action; ?>">
        <label class="display-block float-left label-form">Tên đăng nhập:</label> <input type="text" name="username" class="display-block"/>
        <label class="display-block float-left label-form">Tên mật khẩu:</label> <input type="password" name="password" class="display-block"/>
        <label class="display-block float-left label-form">Avatar:</label> <input type="file" name="avatar" class="display-block"  onchange="readURL(this);"/>
        <label class="display-block float-left label-form">Tên hiển thị:</label> <input type="text" name="fullname" class="display-block"/>
        <label class="display-block float-left label-form">Địa chỉ:</label> <input type="text" name="address" class="display-block"/>
        <label class="display-block float-left label-form">Số điện thoại:</label> <input type="text" name="phone_number" class="display-block"/>
        <label class="display-block float-left label-form">Email:</label> <input type="text" name="email" class="display-block"/>
        <label class="display-block float-left label-form">Loại tài khoản:</label> <input type="text" name="role_id" class="display-block"/>
        <input type="submit" value="Submit" />
    </form>
</div>
<img id="blah" src="#" alt="your image" />

<script>
    header_change("Tài khoản", "./index.php?a=2");
    document.getElementById("user_link").setAttribute("style", "background-color: #b3c734;");
</script>