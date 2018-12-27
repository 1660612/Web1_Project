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
                    <td><?php echo $product_type->name; ?></td>
                    <td>
                        <a href="./index.php?a=5&bus=product_type&id=<?php echo $product_type->id; ?>"><button class='btn'><i class="fa fa-edit"></i></button></a>
                        <button class='btn btn-danger' onclick='Load(<?php echo $product_type->id; ?>)' data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-alt"></i></button>
                    </td>
                </tr>
            <?php } } ?>


    </tbody>
</table>
<?php
    include("./layouts/khungxuly.php");
?>
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
    $("h4.modal-title").append("Xác nhận xóa loại sản phẩm");
    $("div.modal-body p").append("loại sản phẩm?");
    $("#id").attr("href", "./pages/product_type/delete.php?id=");
</script>