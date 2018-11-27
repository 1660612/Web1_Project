<?php
$result = DataProvider::getAll("DonDatHang");
?>

<h2 class="text-center">Danh sách các đơn hàng</h2>
<table>
    <thead>
    <tr>
        <th>Ngày lập</th>
        <th>Tổng thành tiền</th>
        <th>Tài khoản</th>
        <th>Tình trạng</th>
    </tr>
    </thead>
    <tbody>

    <?php
    if($result->num_rows == 0)
    {
        echo "<td colspan='4'>Không có đơn hàng nào để hiển thị</td>";
    }

    else
    {
        while($list = mysqli_fetch_array($result))
        {
            extract($list);

            ?>
            <tr>
                <td><?php echo $NgayLap; ?></td>
                <td><?php echo $TongThanhTien; ?></td>
                <td><?php echo $MaTaiKhoan; ?></td>
                <td><?php echo $MaTinhTrang; ?></td>
            </tr>
        <?php }}
    ?>
    </tbody>
</table>
<script>
    header_change("Đơn hàng", "./index.php?a=3");
</script>