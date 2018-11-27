<?php
    $result = DataProvider::getAll("SanPham");
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
            if($result->num_rows == 0)
            {
                echo "<td colspan='5' class='text-center'>Hiện không có sản phẩm nào</td>";
            }
            else
            {
            while($list = mysqli_fetch_array($result))
            {
                extract($list);
            ?>
                <tr>
                    <td><a href="./index.php?a=1&id=<?php echo $MaSanPham; ?>"><?php echo $TenSanPham; ?></a></td>
                    <td id="money"><?php echo $GiaSanPham; ?></td>
                    <td><?php echo $MoTa; ?></td>
                    <td><?php echo $MaLoaiSanPham; ?></td>
                    <td><?php echo $MaHangSanXuat; ?></td>
                </tr>
            <?php } } ?>


    </tbody>
</table>
<script>
    header_change("Sản phẩm", "./index.php?a=1");
</script>