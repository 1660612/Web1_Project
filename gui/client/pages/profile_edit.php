<?php
if(isset($_GET['id'])){
    $user = (new UserBUS())->GetByID($_GET['id']);
}
?>
<div class="w-50 mx-auto mb-5">
    <h2 class="text-center font-weight-bold display-6 text-info" style="margin-bottom: 20px; margin-top: 20px;">
        <?php
        echo isset($_GET['id']) ? "Thay đổi thông tin cá nhân" : "Thêm người dùng";
        ?>
    </h2>
    <form class="w-100" method="post" enctype="multipart/form-data" action="../admin/pages/user/<?php isset($_GET['id']) ? $action = 'edit.php?id='.$_GET['id'] : $action = 'add.php'; echo $action; ?>" autocomplete="off" style="width:355px;">
        <?php if($action == 'add.php') { ?>
            <div class="form-group row">
                <label class="col-sm-4">Tên đăng nhập:</label>
                <input type="text" name="username" class="form-control col-sm-8" onkeypress="error_delete('username_error')" placeholder="Nhập tên tài khoản..."/>

                <?php if(isset($_GET['error']) && $_GET['error'] == 1){
                    echo "<label class=\"col-sm-4\"></label>
                  <span id='username_error' class='col-sm-8 d-block text-danger'>Tên đăng nhập đã tồn tại</span> ";
                }?>
            </div>
        <?php } ?>
        <div class="form-group row">
            <label class="col-sm-4">Mật khẩu:</label>
            <input type="password" name="password" class="form-control col-sm-8" placeholder="Nhập mật khẩu..." onblur="validate()"/>
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
            <input type="text" name="fullname" class="form-control col-sm-8" placeholder="Nhập tên hiển thị..." value="<?php echo isset($user) ? $user->full_name : "" ?>"/>
        </div>
        <div class="form-group row">
            <label class="col-sm-4">Địa chỉ:</label>
            <input type="text" name="address" class="form-control col-sm-8" placeholder="Nhập địa chỉ..."  value="<?php echo isset($user) ? $user->address : "" ?>"/>
        </div>
        <div class="form-group row">
            <label class="col-sm-4">Số điện thoại:</label>
            <input type="text" name="phone_number" class="form-control col-sm-8" placeholder="Nhập số điện thoại..."  value="<?php echo isset($user) ? $user->phone_number : "" ?>"/>
        </div>
        <div class="form-group row">
            <label class="col-sm-4">Email:</label>
            <input type="text" name="email" class="form-control col-sm-8" placeholder="Nhập email..."  value="<?php echo isset($user) ? $user->email : "" ?>"/>
        </div>
        <div class="form-group row">
            <label class="col-sm-4">Loại tài khoản:</label>
            <select class="form-control col-sm-8" name="role_id">
                <!--                --><?php //foreach((new RoleBUS())->GetAll() as $role) echo "<option value='$role->id'>$role->name</option>"; ?>
                <?php foreach((new RoleBUS())->GetAll() as $role) { ?>
                    <option value="<?php echo $role->id; ?>" <?php if(isset($user)){echo $role->id == $user->role_id ? "selected" : ""; }?>>
                        <?php echo $role->name; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="text-center">
            <a href="./index.php?a=2" class="btn btn-secondary">Cancel</a>
            <input class="btn btn-primary" type="submit" name="submit" value="Submit" />
        </div>

    </form>
</div>

<script>
    function validate()
    {
        if($("input[name='password']").val() != $("input[name=retype_password]").val())
        {
            $("#valid_pass").css("visibility","visible");
            $("input[type=submit]").attr("disabled", "disabled");
        }
        else if($("input[name='password']").val() == $("input[name=retype_password]").val())
        {
            $("#valid_pass").css("visibility","hidden");
            $("input[type=submit]").removeAttr("disabled");
        }
    }
</script>