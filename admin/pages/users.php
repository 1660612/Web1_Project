<?php
    $result = DataProvider::getAll("TaiKhoan");
?>

<h2 class="text-center">Danh sách các tài khoản</h2>
<table>
    <thead>
        <tr>
            <th>Tên đăng nhập</th>
            <th>Tên hiển thị</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>

            <?php
                if($result->num_rows == 0)
                {
                    echo "<td colspan='5'>Không có tài khoản để hiển thị</td>";
                }

                else
                {
                    while($list = mysqli_fetch_array($result))
                    {
                        extract($list);

                    ?>
            <tr>
            <td><?php echo $TenDangNhap; ?></td>
            <td><?php echo $TenHienThi; ?></td>
            <td><?php echo $DiaChi; ?></td>
            <td><?php echo $DienThoai; ?></td>
            <td><?php echo $Email; ?></td>
            </tr>
            <?php }}
                ?>
    </tbody>
</table>
<script>
    header_change("Tài khoản", "./index.php?a=2");
</script>