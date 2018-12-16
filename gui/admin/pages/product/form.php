<h2 class="text-center" style="margin-bottom: 20px; margin-top: 20px;">
    <?php
        echo isset($_GET['id']) ? "Thay đổi thông tin sản phẩm" : "Thêm sản phẩm";
    ?>
</h2>
<form id="form" method="post" enctype="multipart/form-data" action="./pages/product/<?php echo isset($_GET['id']) ? $action = 'edit.php?id='.$_GET['id'] : $action = 'add.php'; ?>" autocomplete="off">
    <label class="display-block float-left label-form">Tên sản phẩm:</label> <input type="text" name="name" class="display-block" placeholder="Nhập tên sản phẩm..."/>
    <label class="display-block float-left label-form">Ngày nhận:</label> <input type="date" name="receipt_date" class="display-block"/>
    <label class="display-block float-left label-form">Số lượng bán:</label> <input type="text" name="total_sale_count" class="display-block" placeholder="Nhập số lượng đã bán..."/>
    <label class="display-block float-left label-form">Loại sản phẩm:</label> <select name="product_type_id"><?php foreach((new ProductTypeBUS())->GetAll() as $product_type) echo "<option value='$product_type->id'>$product_type->name</option>"; ?></select>
    <label class="display-block float-left label-form">Hãng sản xuất:</label> <select name="manufacturer_id"><?php foreach((new ManufacturerBUS())->GetAll() as $manufacturer) echo "<option value='$manufacturer->id'>$manufacturer->name</option>"; ?></select>
    <label class="display-block float-left label-form">Hình ảnh:</label> <div id="style-file" onclick="upload_file()">Choose Image File<input id="image_file" size="60" type="file" name="image"/></div>
    <label class="display-block float-left label-form">Giá:</label> <input type="text" name="price" class="display-block" placeholder="Nhập giá của sản phẩm..."/>
    <label class="display-block float-left label-form">Mô tả:</label> <textarea type="text" name="description" class="display-block" placeholder="Nhập mô tả sản phẩm..."></textarea>
    <label class="display-block float-left label-form">Xuất xứ:</label>
    <select id="list_source" name="product_source" ></select>
    <input class="text-center btn btn-submit" type="submit" name="submit" value="Submit" />
</form>

<script>
    header_change("Sản phẩm", "./index.php?a=1");
    document.getElementById("product_link").setAttribute("style", "background-color: #b3c734;");
</script>

<script>
    var body = document.getElementsByTagName("body")[0];
    body.setAttribute("onload","getCountries()");
</script>