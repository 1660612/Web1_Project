<?php

    $users = (new UserBUS())->GetAll();


?>

<h2 style="display: inline-block;">Danh sách các tài khoản</h2>
<a class="float-right" href="./index.php?a=5&bus=user"><button class="btn mg-b-s" style="background-color: aquamarine; height: 30px;">Add</button></a>
<hr/>
<table>
    <thead>
        <tr>
            <th>Tên đăng nhập</th>
            <th>Tên hiển thị</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Email</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>

            <?php
                if(count($users) == 0)
                {
                    echo "<td colspan='6'>Không có tài khoản để hiển thị</td>";
                }

                else
                {
                    foreach($users as $user)
                    {

                    ?>
            <tr>
                <td><?php echo $user->username; ?></td>
                <td><?php echo $user->full_name; ?></td>
                <td>
                    <?php echo $user->address; ?>
                </td>
                </td>
                <td><?php echo $user->phone_number; ?></td>
                <td><?php echo $user->email; ?></td>
                <td>
                    <a href="./index.php?a=5&bus=user&id=<?php echo $user->id ?>"><button class='btn btn-warning'>Edit</button></a>
                    <button class='btn btn-danger' onclick='Load(<?php echo $user->id; ?>)'>Delete</button>
                </td>
            </tr>
            <?php }}
                ?>
    </tbody>
</table>
<div id="myModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Are you sure</h2>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete this user</p>
        </div>
        <div class="modal-footer">
            <a id="id" href="./pages/user/delete.php?id="><button class="btn btn-danger">Yes</button></a>
            <button id="not_agree" class="btn btn-warning">No</button>
        </div>
    </div>

</div>
<script>
    header_change("Tài khoản", "./index.php?a=2");
    document.getElementById("user_link").setAttribute("style", "background-color: #b3c734;");
</script>