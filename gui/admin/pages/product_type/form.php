<h2 class="text-center" style="margin-bottom: 20px; margin-top: 20px;">
    <?php
        echo isset($_GET['id']) ? "Thay đổi thông tin sản phẩm" : "Thêm sản phẩm";
    ?>
</h2>
<form id="form" method="post" enctype="multipart/form-data" action="./pages/product_type/<?php echo isset($_GET['id']) ? $action = 'edit.php?id='.$_GET['id'] : $action = 'add.php'; ?>" autocomplete="off">
    <label class="display-block float-left label-form">Tên sản phẩm:</label> <input type="text" name="name" class="display-block" placeholder="Nhập tên loại sản phẩm..."/>
    <a class="btn btn-secondary" href="./index.php?a=4">Cancel</a>
    <input class="text-center btn btn-submit" type="submit" name="submit" value="Submit" />
</form>

<script>
    header_change("Sản phẩm", "./index.php?a=4");
    $(".active").removeClass("active");
    $("#product_type_link").addClass("active");
</script>