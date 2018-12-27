<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/27/2018
 * Time: 11:30 AM
 */

foreach(glob("../../../DAO/*.php") as $filename)
{
    include $filename;
}
foreach(glob("../../../DTO/*.php") as $filename)
{
    include $filename;
}
foreach(glob("../../../BUS/*.php") as $filename)
{
    include $filename;
}
$products = (new ProductBUS())->GetTop10ByDate();
$total_sale_products = (new ProductBUS())->GetTop10ByDate();
if(isset($_GET['bus']) && isset($_GET['id']))
{
    if($_GET['bus'] == "product")
    {
        $products = (new ProductBUS())->GetProductsByProductType($_GET['id']);
    }
    elseif($_GET['bus'] == "manufacturer")
    {
        $products = (new ProductBUS())->GetProductsByManufacturer($_GET['id']);
    }
}
?>
<div class="container">
    <?php
        if(!isset($_GET['bus']) && !isset($_GET['id']))
        {
            echo "<h4 class=\"text-info\">Sản phẩm mới nhất</h4>";
        }
        if(count($products)==0)
        {
            echo "<h5 class='text-danger text-center' style='height: 200px;'>Không tìm thấy sản phẩm nào</h5>";
        }
        else
        {
    ?>
    <div class="row">
        <?php foreach ($products as $product)
            {
                echo "<div class=\"col-sm-4\">
            <a href=\"#\"><img src=\"data:image;base64,$product->image\" height=\"200px\" width=\"200px\"/></a>
            <a href=\"#\"><p style=\" font-size:18px\">$product->name</p></a>
            <p style=\"color:red; font-size:18px\" >$product->price</p>
        </div>";
            } }
        ?>
    </div>
    <?php
        if(!isset($_GET['bus']) && !isset($_GET['id']))
        {
            echo "<h4 class=\"text-info\">Sản phẩm bán chạy nhất</h4>";
        }
        if(count($total_sale_products)==0)
        {
            echo "<h5 class='text-danger text-center' style='height: 200px;'>Không tìm thấy sản phẩm nào</h5>";
        }
        else{
    ?>
    <div class="row">
        <?php foreach ($total_sale_products as $product)
        {
            echo "<div class=\"col-sm-4\">
            <a href=\"#\"><img src=\"data:image;base64,$product->image\" height=\"200px\" width=\"200px\"/></a>
            <a href=\"#\"><p style=\" font-size:18px\">$product->name</p></a>
            <p style=\"color:red; font-size:18px\" >$product->price</p>
        </div>";
        } }
        ?>
    </div>
</div>
