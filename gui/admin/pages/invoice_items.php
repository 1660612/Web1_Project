<?php
$invoice_items = (new InvoiceItemBUS())->GetAll();
?>
<div class="row">
    <h2 class="col-sm-11" style="display: inline-block;">Danh sách các chi tiết đơn hàng</h2>
    <a class="col-sm-1" href="./index.php?a=5&bus=invoice_item"><button class="btn btn-primary"><i class="fa fa-plus"></i></button></a>
</div>
<hr/>
<div class="table-responsive">
    <table class="table w-75 d-table mx-auto">
        <thead >
        <tr>
            <th class="arrow-down" onclick="sortTable(0, this)">Sản phẩm</th>
            <th class="arrow-down" onclick="sortTable(1, this)">Mã đơn hàng</th>
            <th class="arrow-down" onclick="sortTable(2, this)">Số lượng</th>
            <th class="arrow-down" onclick="sortTable(3, this)">Đơn giá</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>

        <?php
        if(count($invoice_items) == 0)
        {
            echo "<td class='text-center' colspan='5'>Không có chi tiết đơn hàng nào để hiển thị</td>";
        }

        else
        {
            foreach($invoice_items as $invoice_item)
            {
                ?>
                <tr>
                    <?php  ?>
                    <td style="max-width: 200px;"><?php echo (new InvoiceItemBUS())->GetProductName($invoice_item->id) ?></td>
                    <td><?php echo $invoice_item->invoice_id; ?></td>
                    <td><?php echo $invoice_item->quantity; ?></td>
                    <td><?php echo $invoice_item->price; ?></td>
                    <td>
                        <a href="./index.php?a=5&bus=invoice_item&id=<?php echo $invoice_item->id; ?>"><button class='btn'><i class="fa fa-edit"></i></button></a>
                        <button class='btn btn-danger' onclick='Load(<?php echo $invoice_item->id; ?>)' data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-alt"></i></button>
                    </td>
                </tr>
            <?php }}?>
        </tbody>
    </table>
</div>
<?php
    include("./layouts/khungxuly.php");
?>
<script>
    header_change("Chi tiết đơn hàng", "./index.php?a=7");
    $(".active").removeClass("active");
    $("#invoice_item_link").addClass("active");
    $("h4.modal-title").append("Xác nhận xóa chi tiết đơn hàng");
    $("div.modal-body p").append("chi tiết đơn hàng?");
    $("#id").attr("href", "./pages/invoice_item/delete.php?id=");
</script>