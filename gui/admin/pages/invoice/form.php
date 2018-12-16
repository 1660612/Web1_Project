<form style="width: 500px;" id="form" method="post" enctype="multipart/form-data" action="./pages/invoice/<?php isset($_GET['id']) ? $action = 'edit.php?id='.$_GET['id'] : $action = 'add.php'; echo $action; ?>" autocomplete="off">
    <label class="display-block float-left label-form" style="width: 150px;">Ngày tạo đơn hàng:</label> <input type="date" name="created_date" class="display-block"/>
    <label class="display-block float-left label-form" style="width: 150px;">Tổng giá trị:</label> <input type="text" name="total_price" class="display-block"/>
    <label class="display-block float-left label-form" style="width: 150px;">Người tạo:</label> <select name="user_id">
        <option value="" selected>Select 1 user</option>
        <?php foreach((new UserBUS())->GetAll() as $user) echo "<option value='$user->id'>$user->full_name</option>"; ?>
    </select>

    <input class="text-center btn btn-submit" type="submit" name="submit" value="Submit" style="margin-left: 160px;" />
</form>

<script>
    header_change("Đơn hàng", "./index.php?a=3");
    document.getElementById("invoice_link").setAttribute("style", "background-color: #b3c734;");
</script>