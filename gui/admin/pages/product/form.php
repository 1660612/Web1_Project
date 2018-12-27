<?php
    if(isset($_GET['id'])){
        $product = (new ProductBUS())->GetByID($_GET['id']);
    }
?>
<div class="w-50 mx-auto">
    <h2 class="text-center font-weight-bold display-6 text-info" style="margin-bottom: 20px; margin-top: 20px;">
        <?php
            echo isset($_GET['id']) ? "Thay đổi thông tin sản phẩm" : "Thêm sản phẩm";
        ?>
    </h2>
    <form id="form" method="post" enctype="multipart/form-data" action="./pages/product/<?php echo isset($_GET['id']) ? $action = 'edit.php?id='.$_GET['id'] : $action = 'add.php'; ?>" autocomplete="off">
        <div class="form-group row">
            <label class="col-sm-4">Tên sản phẩm:</label>
            <input type="text" name="name" class="form-control col-sm-8" placeholder="Nhập tên sản phẩm..." value="<?php echo isset($product) ? $product->name : "" ?>"/>
        </div>
        <div class="form-group row">
            <label class="d-block col-sm-4">Ngày nhận:</label>
            <input type="date" name="receipt_date" class="form-control col-sm-8"/>
        </div>
        <div class="form-group row">
            <label class="d-block col-sm-4">Số lượng đã bán:</label>
            <input type="text" name="total_sale_count" class="form-control col-sm-8" placeholder="Nhập số lượng đã bán..." value="<?php echo isset($product) ? $product->total_sale_count : "" ?>"/>
        </div>
        <div class="form-group row">
            <label class="d-block col-sm-4">Loại sản phẩm:</label>
            <select name="product_type_id" class="form-control col-sm-8">
                <option value="">Chọn loại sản phẩm</option>
                <?php foreach((new ProductTypeBUS())->GetAll() as $product_type) { ?>
                    <option value="<?php echo $product_type->id; ?>" <?php if(isset($product)){ echo $product_type->id == $product->product_type_id ? "selected" : "";} ?>>
                        <?php echo $product_type->name; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group row">
            <label class="d-block col-sm-4">Hãng sản xuất:</label>
            <select name="manufacturer_id" class="form-control col-sm-8">
                <option value="">Chọn hãng sản xuất</option>
                <?php foreach((new ManufacturerBUS())->GetAll() as $manufacturer) { ?>
                    <option value="<?php echo $manufacturer->id; ?>" <?php if(isset($product)){ echo $manufacturer->id == $product->manufacturer_id ? "selected" : "";} ?>>
                        <?php echo $manufacturer->name; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group row">
            <label class="d-block col-sm-4">Hình ảnh:</label>
            <div id="style-file" class="btn btn-sm btn-primary" onclick="upload_file()" style="width: 150px;">Choose Image File<input id="image_file" size="60" type="file" name="image" class="invisible"/></div>
        </div>
        <div class="form-group row">
            <label class="d-block col-sm-4">Giá:</label>
            <input type="text" name="price" class="form-control col-sm-8" placeholder="Nhập giá của sản phẩm..."  value="<?php echo isset($product) ? $product->price : "" ?>"/>
        </div>
        <div class="form-group row">
            <label class="d-block col-sm-4">Mô tả:</label>
            <textarea type="text" name="description" class="form-control col-sm-8" placeholder="Nhập mô tả sản phẩm..." value="<?php echo isset($product) ? $product->description : "" ?>"></textarea>
        </div>
        <div class="form-group row">
            <label class="d-block col-sm-4">Xuất xứ:</label>
            <select id="list_source" class="form-control col-sm-8" name="product_source">
                <option value="<?php echo isset($product) ? $product->price : "" ?>"><?php echo isset($product) ? $product->product_source : "Chọn xuất xứ" ?></option>
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