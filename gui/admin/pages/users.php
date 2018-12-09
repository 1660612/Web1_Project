<?php
    $users = (new UserBUS())->GetAll();
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
                if(count($users) == 0)
                {
                    echo "<td colspan='5'>Không có tài khoản để hiển thị</td>";
                }

                else
                {
                    foreach($users as $user)
                    {

                    ?>
            <tr>
            <td><?php echo $user->username; ?></td>
            <td><?php echo $user->full_name; ?></td>
            <td><?php echo $user->address; ?></td>
            <td><?php echo $user->phone_number; ?></td>
            <td><?php echo $user->email; ?></td>
            </tr>
            <?php }}
                ?>
    </tbody>
</table>
<script>
    header_change("Tài khoản", "./index.php?a=2");
    document.getElementById("user_link").setAttribute("style", "background-color: #b3c734;");
</script>