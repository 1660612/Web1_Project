<?php
$invoices = (new InvoiceBUS)->GetAll();
if(isset($_GET['q']))
{
    $invoices = (new InvoiceBUS())->SearchByUserName($_GET['q']);
}
?>
<div class="row">
    <h2 class="col-sm-5" style="display: inline-block;">Danh sách các đơn hàng</h2>
    <div class="col-sm-6">
        <?php
            include("./layouts/search_form.php");
        ?>
    </div>
    <a class="col-sm-1" href="./index.php?a=5&bus=invoice"><button class="btn btn-primary"><i class="fa fa-plus"></i></button></a>
</div>
<hr/>
<div class="table-responsive">
    <table class="table w-75 d-table mx-auto">
        <thead >
        <tr>
            <th class="arrow-down" onclick="sortTable(0, this)">Mã đơn hàng</th>
            <th class="arrow-down" onclick="sortTable(1, this)">Ngày lập</th>
            <th class="arrow-down" onclick="sortTable(2, this)">Tổng thành tiền</th>
            <th class="arrow-down" onclick="sortTable(3, this)">Khách hàng</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>

        <?php
        if(count($invoices) == 0)
        {
            echo "<td colspan='5'>Không có đơn hàng nào để hiển thị</td>";
        }

        else
        {
            foreach($invoices as $invoice)
            {
                ?>
                <tr>
                    <?php  ?>
                    <td><?php echo $invoice->id; ?></td>
                    <td>
                        <?php $date = new DateTime($invoice->created_date);
                        echo $date->format('Y-m-d'); ?>
                    </td>
                    <td><?php echo $invoice->total_price; ?></td>
                    <td><?php echo (new InvoiceBUS())->getUserFullName($invoice->id); ?></td>
                    <td>
                        <a href="./index.php?a=5&bus=invoice&id=<?php echo $invoice->id; ?>"><button class='btn'><i class="fa fa-edit"></i></button></a>
                        <button class='btn btn-danger' onclick='Load(<?php echo $invoice->id; ?>)' data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-alt"></i></button>
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
    header_change("Đơn hàng", "./index.php?a=3");
    $(".active").removeClass("active");
    $("#invoice_link").addClass("active");
    $("#search_form").append("<input type=\"hidden\" value=\"3\" name=\"a\" class=\"form-control col-10\" />");
    $("h4.modal-title").append("Xác nhận xóa đơn hàng");
    $("div.modal-body p").append("đơn hàng?");
    $("#id").attr("href", "./pages/invoice/delete.php?id=");
</script>