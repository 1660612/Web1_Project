<?php
    $products = (new ProductBUS())->GetAll();
?>
<h2 class="text-center">Danh sách các sản phẩm</h2>
<table>
    <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Mô tả</th>
            <th>Loại sản phẩm</th>
            <th>Hãng sản xuất</th>
        </tr>
    </thead>
    <tbody>

            <?php
            if(count($products) == 0)
            {
                echo "<td colspan='5' class='text-center'>Hiện không có sản phẩm nào</td>";
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
                    <td><?php echo $product->product_type; ?></td>
                    <td><?php echo $product->manufacturer_id; ?></td>
                </tr>
            <?php } } ?>


    </tbody>
</table>
<script>
    header_change("Sản phẩm", "./index.php?a=1");
    document.getElementById("product_link").setAttribute("style", "background-color: #b3c734;");
</script>