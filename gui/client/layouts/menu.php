<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/27/2018
 * Time: 11:28 AM
 */
$product_types = (new ProductTypeBUS())->GetAll();
$manufacturers = (new ManufacturerBUS())->GetAll();
?>
<div id="Menu">
    <div id="Container">
        <div id="divLeft">
            <ul type="none">
                <li><a href="./index.php">Trang Chủ</a></li>
                <li><a href="">Loại sản phẩm</a>
                    <ul type="none">
                        <?php foreach($product_types as $pt){ ?>
                            <li><a href="./index.php?bus=product&id=<?php echo $pt->id; ?>"><?php echo $pt->name; ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li><a href="./Trangquan/quan.html">Nhà sản xuất</a>
                    <ul type="none">
                        <?php foreach($manufacturers as $manufacturer){ ?>
                            <li><a href="./index.php?bus=manufacturer&id=<?php echo $manufacturer->id; ?>"><?php echo $manufacturer->name; ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </div>

        <div id="divRight">
            <div>
                <div id="form">
                    <form action="#" method="GET" >
                        <input id="bt" type="text" name="txtTimkiem" placeholder="Nhập Sản Phẩm Cần Tìm..." style="margin-right: -5px;" />
                        <input id="tk" type="button" value="Tìm Kiếm"> </input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
