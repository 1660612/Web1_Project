<?php
if(isset($_GET['id'])){
    $invoice_item = (new InvoiceItemBUS())->GetByID($_GET['id']);
}
?>
<div class="w-50 mx-auto">
    <h2 class="text-center" style="margin-bottom: 20px; margin-top: 20px;">
        <?php
        echo isset($_GET['id']) ? "Thay đổi thông tin chi tiết đơn hàng" : "Thêm chi tiết đơn hàng";
        ?>
    </h2>
    <form id="form" method="post" enctype="multipart/form-data" action="./pages/invoice_item/<?php isset($_GET['id']) ? $action = 'edit.php?id='.$_GET['id'] : $action = 'add.php'; echo $action; ?>" autocomplete="off">
        <div class="form-group row">
            <label class="col-sm-4">Số lượng:</label>
            <input type="text" name="quantity" class="col-sm-8 form-control"/>
        </div>
        <div class="form-group row">
            <label class="col-sm-4">Đơn giá:</label>
            <input type="text" name="price" class="col-sm-8 form-control" value="<?php echo isset($invoice_item) ? $invoice_item->price : "" ?>"/>
        </div>
        <div class="form-group row">
            <label class="col-sm-4">Sản phẩm:</label>
            <select name="product_id" class="col-sm-8 form-control">
                <option value="">Select 1 product</option>
                <?php foreach((new ProductBUS())->GetAll() as $product){?>
                    <option value="<?php echo $product->id; ?>" <?php if(isset($invoice_item)){ echo $product->id == $invoice_item->product_id ? "selected" : "";} ?>>
                        <?php echo $product->name; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group row">
            <label class="col-sm-4">Mã đơn hàng:</label>
            <select name="invoice_id" class="col-sm-8 form-control">
                <option value="">Select 1 invoice</option>
                <?php foreach((new InvoiceBUS())->GetAll() as $invoice){?>
                    <option value="<?php echo $invoice->id; ?>" <?php if(isset($invoice_item)){ echo $invoice->id == $invoice_item->invoice_id ? "selected" : "";} ?>>
                        <?php echo $invoice->id; ?>
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
    header_change("Chi tiết đơn hàng", "./index.php?a=7");
    document.getElementById("invoice_item_link").setAttribute("style", "background-color: #b3c734;");
</script>