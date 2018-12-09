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
            </tr>
        <?php }}
    ?>
    </tbody>
</table>
<script>
    header_change("Đơn hàng", "./index.php?a=3");
    document.getElementById("invoice_link").setAttribute("style", "background-color: #b3c734;");
</script>