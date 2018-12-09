<?php
$invoices = (new InvoiceBUS)->GetAll();
?>

<h2 class="text-center">Danh sách các đơn hàng</h2>
<table>
    <thead>
    <tr>
        <th>Ngày lập</th>
        <th>Tổng thành tiền</th>
        <th>Tài khoản</th>
        <th>Hành động</th>
    </tr>
    </thead>
    <tbody>

    <?php
    if(count($invoices) == 0)
    {
        echo "<td colspan='4'>Không có đơn hàng nào để hiển thị</td>";
    }

    else
    {
        foreach($invoices as $invoice)
        {
            ?>
            <tr>
                <?php  ?>
                <td>
                    <?php $date = new DateTime($invoice->created_date);
                    echo $date->format('Y-m-d'); ?>
                </td>
                <td><?php echo $invoice->total_price; ?></td>
                <td><?php echo $invoice->user_id; ?></td>
                <td>
                    <button class='btn btn-warning'>Edit</button>
                    <button class='btn btn-danger' onclick='Load()'>Delete</button>
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
            <p>Are you sure you want to delete this invoice</p>
        </div>
        <div class="modal-footer">
            <button class="btn btn-danger">Yes</button>
            <button id="not_agree" class="btn btn-warning">No</button>
        </div>
    </div>

</div>
<script>
    header_change("Đơn hàng", "./index.php?a=3");
    document.getElementById("invoice_link").setAttribute("style", "background-color: #b3c734;");
</script>