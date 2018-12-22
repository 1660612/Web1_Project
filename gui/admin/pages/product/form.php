<div class="w-50 mx-auto">
    <h2 class="text-center font-weight-bold display-6 text-info" style="margin-bottom: 20px; margin-top: 20px;">
        <?php
            echo isset($_GET['id']) ? "Thay đổi thông tin sản phẩm" : "Thêm sản phẩm";
        ?>
    </h2>
    <form id="form" method="post" enctype="multipart/form-data" action="./pages/product/<?php echo isset($_GET['id']) ? $action = 'edit.php?id='.$_GET['id'] : $action = 'add.php'; ?>" autocomplete="off">
        <div class="form-group row">
            <label class="col-sm-4">Tên sản phẩm:</label>
            <input type="text" name="name" class="form-control col-sm-6" placeholder="Nhập tên sản phẩm..."/>
        </div>
        <div class="form-group row">
            <label class="d-block col-sm-4">Ngày nhận:</label>
            <input type="date" name="receipt_date" class="form-control col-sm-6"/>
        </div>
        <div class="form-group row">
            <label class="d-block col-sm-4">Số lượng bán:</label>
            <input type="text" name="total_sale_count" class="form-control col-sm-6" placeholder="Nhập số lượng đã bán..."/>
        </div>
        <div class="form-group row">
            <label class="d-block col-sm-4">Loại sản phẩm:</label>
            <select name="product_type_id" class="form-control col-sm-6">
                <option value="">Chọn loại sản phẩm</option>
                <?php foreach((new ProductTypeBUS())->GetAll() as $product_type) echo "<option value='$product_type->id'>$product_type->name</option>"; ?>
            </select>
        </div>
        <div class="form-group row">
            <label class="d-block col-sm-4">Hãng sản xuất:</label>
            <select name="manufacturer_id" class="form-control col-sm-6">
                <option value="">Chọn hãng sản xuất</option>
                <?php foreach((new ManufacturerBUS())->GetAll() as $manufacturer) echo "<option value='$manufacturer->id'>$manufacturer->name</option>"; ?>
            </select>
        </div>
        <div class="form-group row">
            <label class="d-block col-sm-4">Hình ảnh:</label>
            <div id="style-file" class="btn btn-sm btn-primary" onclick="upload_file()" style="width: 150px;">Choose Image File<input id="image_file" size="60" type="file" name="image" class="invisible"/></div>
        </div>
        <div class="form-group row">
            <label class="d-block col-sm-4">Giá:</label>
            <input type="text" name="price" class="form-control col-sm-6" placeholder="Nhập giá của sản phẩm..."/>
        </div>
        <div class="form-group row">
            <label class="d-block col-sm-4">Mô tả:</label>
            <textarea type="text" name="description" class="form-control col-sm-6" placeholder="Nhập mô tả sản phẩm..."></textarea>
        </div>
        <div class="form-group row">
            <label class="d-block col-sm-4">Xuất xứ:</label>
            <select id="list_source" class="form-control col-sm-6" name="product_source">
                <option value="">Chọn xuất xứ</option>
            </select>

        </div>
        <div class="text-center">
            <a href="./index.php?a=1" class="btn btn-secondary">Cancel</a>
            <input class="btn btn-primary" type="submit" name="submit" value="Submit" />
        </div>
    </form>
</div>

<script>
    header_change("Sản phẩm", "./index.php?a=1");
    document.getElementById("product_link").setAttribute("style", "background-color: #b3c734;");
</script>

<script>
    var body = document.getElementsByTagName("body")[0];
    body.setAttribute("onload","getCountries()");
</script>