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
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Loại sản phẩm
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach($product_types as $pt){ ?>
                            <li class="dropdown-item"><a href="./index.php?bus=product&id=<?php echo $pt->id; ?>"><?php echo $pt->name; ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Nhà sản xuất
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach($manufacturers as $manufacturer){ ?>
                            <li class="dropdown-item"><a href="./index.php?bus=manufacturer&id=<?php echo $manufacturer->id; ?>"><?php echo $manufacturer->name; ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </div>

        <div id="divRight">
            <div>
                <div id="form">
                    <form action="./index.php" method="GET" >
                        <input id="bt" type="text" name="q" placeholder="Nhập Sản Phẩm Cần Tìm..." style="margin-right: -5px;" />
                        <input id="tk" type="submit" value="Tìm Kiếm" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
