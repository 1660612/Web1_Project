<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/28/2018
 * Time: 4:34 AM
 */
$products = array();
if(isset($_SESSION['cart']))
{
    $multi_carts = $_SESSION['cart'];
    foreach ($multi_carts as $mcs)
    {
        $products[] = (new ProductBUS())->GetByID($mcs);
    }
}
?>
<div class="w-75 mx-auto text-center mb-5">
    <h3>Giỏ hàng của bạn</h3>
    <?php foreach ($products as $product){?>
    <div class="row mb-1">
        <div class="col-sm-4 row">
            <label class="col-sm-4">Số lượng: </label>
            <input name="quantity" class="form-control col-sm-8" value="0"/>
        </div>
        <div class="col-sm-7 row">
            <div class="col-sm-3">Sản phẩm:</div>
            <div class="col-sm-9"><?php echo $product->name; ?></div>
        </div>
        <div class="col-sm-1">
            <img src="data:image;base64,<?php echo $product->image; ?>" width="150" height="150"/>
        </div>
    </div>
    <?php } ?>
</div>
