<?php
    $products = (new ProductBUS())->GetAll();
    if(isset($_GET['q']))
    {
        $products = (new ProductBUS())->SearchByName($_GET['q']);
    }
?>
<div class="row">
    <h2 class="col-md-5" style="display: inline-block;">Danh sách các sản phẩm</h2>
    <div class="col-md-6">
        <?php
            include("./layouts/search_form.php");
        ?>
    </div>
    <a class="col-md-1 p-0" href="./index.php?a=5&bus=product"><button class="btn btn-primary"><i class="fa fa-plus"></i></button></a>
</div>
<hr/>
<div class="table-responsive">
    <table class="table">
    <thead>
        <tr>
            <th class="arrow-down" onclick="sortTable(0, this)">Tên sản phẩm</th>
            <th class="arrow-down" onclick="sortTable(1, this)">Giá</th>
            <th class="arrow-down" onclick="sortTable(2, this)">Mô tả</th>
            <th class="arrow-down" onclick="sortTable(3, this)">Loại sản phẩm</th>
            <th class="arrow-down" onclick="sortTable(4, this)">Hãng sản xuất</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>

            <?php
            if(count($products) == 0)
            {
                echo "<td colspan='6' class='text-center'>Hiện không có sản phẩm nào</td>";
            }
            else
            {
            foreach($products as $product)
            {
            ?>
                <tr>
                    <td><a href="./index.php?a=1&id=<?php echo $product->id; ?>"><?php echo $product->name; ?></a></td>
                    <td id="money"><?php echo $product->price; ?></td>
                    <td><?php echo $product->description; ?></td>
                    <td><?php echo (new ProductBUS())->GetProductTypeName($product->id); ?></td>
                    <td><?php echo (new ProductBUS())->GetManufacturerName($product->id); ?></td>
                    <td>
                        <a href="./index.php?a=5&bus=product&id=<?php echo $product->id; ?>"><button class='btn'><i class="fa fa-edit"></i></button></a>
                        <button class='btn btn-danger' onclick='Load(<?php echo $product->id; ?>)' data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-alt"></i></button>
                    </td>
                </tr>
            <?php } } ?>
    </tbody>
</table>
</div>
<?php
    include("./layouts/khungxuly.php");
?>
<script>
    header_change("Sản phẩm", "./index.php?a=1");
    $(".active").removeClass("active");
    $("#product_link").addClass("active");
</script>
<script>
    $(".btn.btn-success").click(function(){
        $("#search_form").submit();
    });
    $("#search_form").append("<input type=\"hidden\" value=\"1\" name=\"a\" class=\"form-control col-10\" />");
    $("h4.modal-title").append("Delete Product Confirm");
    $("div.modal-body p").append("product?");
    $("#id").attr("href", "./pages/product/delete.php?id=");
</script>