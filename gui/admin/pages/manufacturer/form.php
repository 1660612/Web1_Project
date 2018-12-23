<?php
/**
 * Created by PhpStorm.
 * User: Tien Quach
 * Date: 12/23/2018
 * Time: 4:47 PM
 */
?>

<div class="w-50 mx-auto">
    <h2 class="text-center" style="margin-bottom: 20px; margin-top: 20px;">
        <?php
        echo isset($_GET['id']) ? "Thay đổi thông tin hãng sản xuất" : "Thêm loại hãng sản xuất";
        ?>
    </h2>
    <form id="form" method="post" enctype="multipart/form-data" action="./pages/manufacturer/<?php echo isset($_GET['id']) ? $action = 'edit.php?id='.$_GET['id'] : $action = 'add.php'; ?>" autocomplete="off">
        <div class="form-group row">
            <label class="col-sm-4">Tên hãng sản xuất:</label>
            <input type="text" name="name" class="form-control col-sm-8" placeholder="Nhập tên hãng sản xuất..."/>
        </div>
        <div class="form-group row">
            <label class="col-sm-4">Số điện thoại:</label>
            <input type="text" name="phone_number" class="form-control col-sm-8" placeholder="Nhập số điện thoại..."/>
        </div>
        <div class="form-group row">
            <label class="col-sm-4">Địa chỉ:</label>
            <input type="text" name="address" class="form-control col-sm-8" placeholder="Nhập địa chỉ..."/>
        </div>
        <div class="form-group row">
            <label class="col-sm-4">Logo:</label>
            <div id="style-file" class="btn btn-sm btn-primary" onclick="upload_file()" style="width: 150px;">Choose Image File
                <input id="image_file" size="60" type="file" name="logo" class="invisible"/>
            </div>
        </div>
        <div class="text-center">
            <a href="./index.php?a=6" class="btn btn-secondary">Cancel</a>
            <input class="btn btn-primary" type="submit" name="submit" value="Submit" />
        </div>
    </form>
</div>
<script>
    header_change("Hãng sản xuất", "./index.php?a=6");
    $(".active").removeClass("active");
    $("#manufacturer_link").addClass("active");
</script>
