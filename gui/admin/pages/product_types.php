<?php
    $product_types = (new ProductTypeBUS())->GetAll();
    if(isset($_GET['q']))
    {
        $product_types = (new ProductTypeBUS())->SearchByName($_GET['q']);
    }
?>
<div class="row">
    <h2 class="col-5" style="display: inline-block;">Danh sách các loại sản phẩm</h2>
    <div class="col-6">
        <?php
            include("./layouts/search_form.php");
        ?>
    </div>
    <a class="col-1 float-right" href="./index.php?a=5&bus=product_type"><button class="btn btn-primary"><i class="fa fa-plus"></i></button></a>
</div>
<hr/>
<table class="table">
    <thead>
        <tr>
            <th class="arrow-down" onclick="sortTable(0, this)">Mã loại sản phẩm</th>
            <th class="arrow-down" onclick="sortTable(1, this)">Tên loại sản phẩm</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>

            <?php
            if(count($product_types) == 0)
            {
                echo "<td colspan='3' class='text-center'>Hiện không có loại sản phẩm nào</td>";
            }
            else
            {
            foreach($product_types as $product_type)
            {
            ?>
                <tr>
                    <td><?php echo $product_type->id; ?></td>
                    <td><a href="./index.php?a=1&id=<?php echo $product_type->id; ?>"><?php echo $product_type->name; ?></a></td>
                    <td>
                        <a href="./index.php?a=5&bus=product_type&id=<?php echo $product_type->id; ?>"><button class='btn'><i class="fa fa-edit"></i></button></a>
                        <button class='btn btn-danger' onclick='Load(<?php echo $product_type->id; ?>)'><i class="fa fa-trash-alt"></i></button>
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
            <p>Are you sure you want to delete this product type?</p>
        </div>
        <div class="modal-footer">
            <a id="id" href="./pages/product_type/delete.php?id="><button class="btn btn-danger">Yes</button></a>
            <button id="not_agree" class="btn btn-warning">No</button>
        </div>
    </div>

</div>
<script>
    header_change("Sản phẩm", "./index.php?a=1");
    $(".active").removeClass("active");
    $("#product_type_link").addClass("active");
</script>
<script>
    $(".btn.btn-success").click(function(){
        $("#search_form").submit();
    });
    $("#search_form").append("<input type=\"hidden\" value=\"4\" name=\"a\" class=\"form-control col-10\" />");
</script>