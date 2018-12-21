<?php
    $products = (new ProductBUS())->GetAll();
?>
<div class="row">
    <h2 class="col-5" style="display: inline-block;">Danh sách các sản phẩm</h2>
    <div class="col-6">
        <form id="search_form" action="" method="get">
            <div class="row">
                <input type="hidden" value="1" name="a" class="form-control col-10" />
                <input type="text" name="q" class="form-control col-10 mr-0" placeholder="Tìm kiếm theo tên sản phẩm..." />
                <div class="ml-0 d-inline-block">
                    <span class="btn btn-success"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </form>
    </div>
    <a class="col-1 float-right" href="./index.php?a=5&bus=product"><button class="btn btn-primary"><i class="fa fa-plus"></i></button></a>
</div>
<hr/>
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
                    <td><?php echo $product->product_type_id; ?></td>
                    <td><?php echo $product->manufacturer_id; ?></td>
                    <td>
                        <a href="./index.php?a=5&bus=product&id=<?php echo $product->id; ?>"><button class='btn btn-warning'><i class="fa fa-edit"></i></button></a>
                        <button class='btn btn-danger' onclick='Load(<?php echo $product->id; ?>)'><i class="fa fa-trash-alt"></i></button>
                    </td>
                </tr>
            <?php } } ?>


    </tbody>
</table>
<div id="myModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Are you sure</h2>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete this invoice</p>
        </div>
        <div class="modal-footer">
            <a id="id" href="./pages/invoice/delete.php?id="><button class="btn btn-danger">Yes</button></a>
            <button id="not_agree" class="btn btn-warning">No</button>
        </div>
    </div>

</div>
<script>
    header_change("Sản phẩm", "./index.php?a=1");
    $(".active").removeClass("active");
    $("#product_link").addClass("active");
</script>
<script>
    $(".btn.btn-success").click(function(){
        $("#search_form").submit();
    });
</script>