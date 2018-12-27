<?php
if(isset($_GET['id'])){
    $product_type = (new ProductTypeBUS())->GetByID($_GET['id']);
}
?>
<div class="w-50 mx-auto">
    <h2 class="text-center" style="margin-bottom: 20px; margin-top: 20px;">
        <?php
            echo isset($_GET['id']) ? "Thay đổi thông tin loại sản phẩm" : "Thêm loại sản phẩm";
        ?>
    </h2>
    <form id="form" method="post" enctype="multipart/form-data" action="./pages/product_type/<?php echo isset($_GET['id']) ? $action = 'edit.php?id='.$_GET['id'] : $action = 'add.php'; ?>" autocomplete="off">
        <div class="form-group row">
            <label class="col-sm-4">Tên sản phẩm:</label>
            <input type="text" name="name" class="form-control col-sm-8" placeholder="Nhập tên loại sản phẩm..." value="<?php echo isset($product_type) ? $product_type->name : "" ?>"/>
        </div>
        <div class="text-center">
            <a href="./index.php?a=4" class="btn btn-secondary">Cancel</a>
            <input class="btn btn-primary" type="submit" name="submit" value="Submit" />
        </div>
    </form>
</div>
<script>
    header_change("Sản phẩm", "./index.php?a=4");
    $(".active").removeClass("active");
    $("#product_type_link").addClass("active");
</script>