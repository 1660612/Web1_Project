<?php
if(isset($_GET['id'])){
    $invoice = (new InvoiceBUS())->GetByID($_GET['id']);
}
?>
<div class="w-50 mx-auto">
    <h2 class="text-center" style="margin-bottom: 20px; margin-top: 20px;">
        <?php
        echo isset($_GET['id']) ? "Thay đổi thông tin đơn hàng" : "Thêm đơn hàng";
        ?>
    </h2>
    <form id="form" method="post" enctype="multipart/form-data" action="./pages/invoice/<?php isset($_GET['id']) ? $action = 'edit.php?id='.$_GET['id'] : $action = 'add.php'; echo $action; ?>" autocomplete="off">
        <div class="form-group row">
            <label class="col-sm-4">Ngày tạo đơn hàng:</label>
            <input type="date" name="created_date" class="col-sm-8 form-control"/>
        </div>
        <div class="form-group row">
            <label class="col-sm-4">Tổng giá trị:</label>
            <input type="text" name="total_price" class="col-sm-8 form-control" value="<?php echo isset($invoice) ? $invoice->total_price : "" ?>"/>
        </div>
        <div class="form-group row">
            <label class="col-sm-4">Khách hàng:</label>
            <select name="user_id" class="col-sm-8 form-control">
                <option value="">Select 1 user</option>
                <?php foreach((new UserBUS())->GetAll() as $user){?>
                <option value="<?php echo $user->id; ?>" <?php if(isset($invoice)){ echo $user->id == $invoice->user_id ? "selected" : "";} ?>>
                    <?php echo $user->full_name; ?>
                </option>
                <?php } ?>
            </select>
        </div>
        <div class="text-center">
            <input class="text-center btn btn-primary" type="submit" name="submit" value="Submit" />
        </div>
    </form>
</div>

<script>
    header_change("Đơn hàng", "./index.php?a=3");
    document.getElementById("invoice_link").setAttribute("style", "background-color: #b3c734;");
</script>