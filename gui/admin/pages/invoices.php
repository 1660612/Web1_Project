<?php
$invoices = (new InvoiceBUS)->GetAll();
?>

<h2 style="display: inline-block;">Danh sách các đơn hàng</h2>
<a class="float-right" href="./index.php?a=5&bus=invoice"><button class="btn mg-b-s" style="background-color: aquamarine; height: 30px;">Add</button></a>
<hr/>
<table class="table">
    <thead>
    <tr>
        <th class="arrow-down" onclick="sortTable(0, this)">Ngày lập</th>
        <th class="arrow-down" onclick="sortTable(1, this)">Tổng thành tiền</th>
        <th class="arrow-down" onclick="sortTable(2, this)">Tài khoản</th>
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
                <td><?php echo (new InvoiceBUS())->getUserFullName($invoice->id); ?></td>
                <td>
                    <a href="./index.php?a=5&bus=invoice&id=<?php echo $invoice->id; ?>"><button class='btn btn-warning'>Edit</button></a>
                    <button class='btn btn-danger' onclick='Load(<?php echo $invoice->id; ?>)'>Delete</button>
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
            <a id="id" href="./pages/invoice/delete.php?id="><button class="btn btn-danger">Yes</button></a>
            <button id="not_agree" class="btn btn-warning">No</button>
        </div>
    </div>

</div>
<script>
    header_change("Đơn hàng", "./index.php?a=3");
    document.getElementById("invoice_link").setAttribute("style", "background-color: #b3c734;");
</script>