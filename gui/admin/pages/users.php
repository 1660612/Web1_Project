<?php
    $users = (new UserBUS())->GetAll();
    if(isset($_GET['q']))
    {
        $users = (new UserBUS())->SearchByName($_GET['q']);
    }
?>
<div class="row">
    <h2 class="col-5" style="display: inline-block;">Danh sách các tài khoản</h2>
    <div class="col-6">
        <?php
            include("./layouts/search_form.php");
        ?>
    </div>
    <a class="col-1 float-right" href="./index.php?a=5&bus=user"><button class="btn btn-primary"><i class="fa fa-plus"></i></button></a>
</div>
<hr/>
<table class="table table-hover">
    <thead>
        <tr>
            <th class="arrow-down" onclick="sortTable(0, this)">Tên đăng nhập</th>
            <th class="arrow-down" onclick="sortTable(1, this)">Tên hiển thị</th>
            <th class="arrow-down" onclick="sortTable(2, this)">Địa chỉ</th>
            <th class="arrow-down" onclick="sortTable(3, this)">Điện thoại</th>
            <th class="arrow-down" onclick="sortTable(4, this)">Email</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>

            <?php
                if(count($users) == 0)
                {
                    echo "<td class='text-center' colspan='6'>Không có tài khoản để hiển thị</td>";
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
                    <a href="./index.php?a=5&bus=user&id=<?php echo $user->id ?>"><button class='btn'><i class="fa fa-user-edit"></i></button></a>
                    <button class='btn btn-danger' onclick='Load(<?php echo $user->id; ?>)' data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-alt"></i> </button>
                </td>
            </tr>
                <?php }}
                ?>
    </tbody>
</table>
<?php
    include("./layouts/khungxuly.php");
?>
<script>
    header_change("Tài khoản", "./index.php?a=2");
    $(".active").removeClass("active");
    $("#user_link").addClass("active");
    $("#search_form").append("<input type=\"hidden\" value=\"2\" name=\"a\" class=\"form-control col-10\" />");
    $("h4.modal-title").append("Delete User Confirm");
    $("div.modal-body p").append("user?");
    $("#id").attr("href", "./pages/user/delete.php?id=");
</script>