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
$total_sale_products = (new ProductBUS())->GetTop10ByTotalSale();
if(isset($_GET['bus']) && isset($_GET['id']))
{
    $total_sale_products = [];
    if($_GET['bus'] == "product")
    {
        $products = (new ProductBUS())->GetProductsByProductType($_GET['id']);
    }
    elseif($_GET['bus'] == "manufacturer")
    {
        $products = (new ProductBUS())->GetProductsByManufacturer($_GET['id']);
    }
}
if(isset($_GET['q']))
{
    $total_sale_products = [];
    $products = [];
    $products = (new ProductBUS())->GetProductsByName($_GET['q']);
    if($_GET['q'] == '')
    {
        $total_sale_products = [];
        $products = [];
        $products = (new ProductBUS())->GetTop10ByDate();
        $total_sale_products = (new ProductBUS())->GetTop10ByTotalSale();
    }
}

?>
<div class="container">
    <?php
    if(!isset($_GET['bus']) && !isset($_GET['id']) && (!isset($_GET['q']) || $_GET['q'] == ''))
    {
        echo "<h4 class=\"text-danger font-weight-bold\">Sản phẩm bán chạy nhất</h4>";
        if (count($total_sale_products) == 0)
        {
            echo "<h5 class='text-danger text-center' style='height: 200px; width: 100%'>Không tìm thấy sản phẩm nào</h5> ";
        }
        elseif(count($total_sale_products)>0)
        {
            echo "<div class=\"row\">";
            ?>

            <?php foreach ($total_sale_products as $product)
        {
            echo "<div class=\"col-sm-4 text-center\">
                    <a href='./index.php?a=1&id=$product->id'><img src=\"data:image;base64,$product->image\"  style='width: 200px; height: 200px; display: inline-block'/><p style=\" font-size:18px\">$product->name</p></a>
                    <p style=\"display: inline-block; color:red; font-size:18px\" >$product->price VND</p>
                    <a href='./index.php?a=2&id=$product->id' class='fas fa-shopping-cart'></a>
                </div>";

        }
            echo "</div>"; }
    }
        ?>
    <?php
        if(!isset($_GET['bus']) && !isset($_GET['id']) && (!isset($_GET['q']) || $_GET['q'] == ''))
        {
            echo "<h4 class=\"text-danger font-weight-bold\">Sản phẩm mới nhất</h4>";
        }
        if(count($products)==0)
        {
            echo "<h5 class='text-danger text-center' style='height: 200px;'>Không tìm thấy sản phẩm nào</h5>";
        }
        elseif(count($products)>0)
        {
            if(isset($_GET['q']) && $_GET['q'] != ''){
                echo "<h4 class=\"text-danger font-weight-bold\">Thông tin tìm kiếm</h4>";
            }
    ?>
    <div class="row">
        <?php foreach ($products as $product)
            {
                echo "<div class=\"col-sm-4 text-center\">
            <a href='./index.php?a=1&id=$product->id'><img src=\"data:image;base64,$product->image\" style='width: 200px; height: 200px; display: inline-block'/><p style=\" font-size:18px\">$product->name</p></a>
            <p style=\"display: inline-block; color:red; font-size:18px\" >$product->price VND</p>
            <a href='./index.php?a=2&id=$product->id' class='fas fa-shopping-cart'></a>
        </div>";
            } }
        ?>
    </div>

</div>