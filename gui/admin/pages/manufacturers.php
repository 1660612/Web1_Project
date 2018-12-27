<?php
/**
 * Created by PhpStorm.
 * User: Tien Quach
 * Date: 12/23/2018
 * Time: 3:16 PM
 */
?>

<?php
$manufacturers = (new ManufacturerBUS())->GetAll();
if(isset($_GET['q']))
{
    $manufacturers = (new ManufacturerBUS())->SearchByName($_GET['q']);
}
?>
<div class="row">
    <h2 class="col-5" style="display: inline-block;">Danh sách các hãng sản xuất</h2>
    <div class="col-6">
        <?php
        include("./layouts/search_form.php");
        ?>
    </div>
    <a class="col-1 float-right" href="./index.php?a=5&bus=manufacturer"><button class="btn btn-primary"><i class="fa fa-plus"></i></button></a>
</div>
<hr/>
<table class="table">
    <thead>
    <tr>
        <th class="arrow-down" onclick="sortTable(0, this)">Tên hãng sản xuất</th>
        <th class="arrow-down" onclick="sortTable(1, this)">Số điện thoại</th>
        <th class="arrow-down" onclick="sortTable(2, this)">Địa chỉ</th>
        <th>Hành động</th>
    </tr>
    </thead>
    <tbody>

    <?php
    if(count($manufacturers) == 0)
    {
        echo "<td colspan='4' class='text-center'>Hiện không có loại sản phẩm nào</td>";
    }
    else
    {
        foreach($manufacturers as $manufacturer)
        {
            ?>
            <tr>

                <td><a href="./index.php?a=1&id=<?php echo $manufacturer->id; ?>"><?php echo $manufacturer->name; ?></a></td>
                <td><?php echo $manufacturer->phone_number; ?></td>
                <td><?php echo $manufacturer->address; ?></td>
                <td>
                    <a href="./index.php?a=5&bus=manufacturer&id=<?php echo $manufacturer->id; ?>"><button class='btn'><i class="fa fa-edit"></i></button></a>
                    <button class='btn btn-danger' onclick='Load(<?php echo $manufacturer->id; ?>)' data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-alt"></i></button>
                </td>
            </tr>
        <?php } } ?>
    </tbody>
</table>
<?php
include("./layouts/khungxuly.php");
?>
<script>
    header_change("Hãng sản xuất", "./index.php?a=6");
    $(".active").removeClass("active");
    $("#manufacturer_link").addClass("active");
</script>
<script>
    $(".btn.btn-success").click(function(){
        $("#search_form").submit();
    });
    $("#search_form").append("<input type=\"hidden\" value=\"6\" name=\"a\" class=\"form-control col-10\" />");
    $("h4.modal-title").append("Xác nhận xóa nhà sản xuất");
    $("div.modal-body p").append("nhà sản xuất?");
    $("#id").attr("href", "./pages/manufacturer/delete.php?id=");
</script>