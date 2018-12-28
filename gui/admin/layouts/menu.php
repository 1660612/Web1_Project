<div id="admin_menu" class="d-block float-left bg-dark">
    <div class="wrapper w-100">
        <nav id="sidebar">
            <ul class="list-unstyled components">
                <li id="dashboard_link">
                    <a class="mb-2 d-inline-block text-center w-100 h-100" href="./index.php?a=0">Trang chủ</a>
                </li>
                <li id="product_link" >
                    <a class="mb-2 d-inline-block text-center w-100 h-100" href="./index.php?a=1">Sản phẩm</a>
                </li>
                <li id="user_link" >
                    <a class="mb-2 d-inline-block text-center w-100 h-100" href="./index.php?a=2">Tài khoản</a>
                </li>
                <li id="invoice_link">
                    <a class="mb-2 d-inline-block text-center w-100 h-100" href="./index.php?a=3">Đơn hàng</a>
                </li>
                <li id="product_type_link">
                    <a class="mb-2 d-inline-block text-center w-100 h-100" href="./index.php?a=4">Loại sản phẩm</a>
                </li>
                <li id="manufacturer_link">
                    <a class="mb-2 d-inline-block text-center w-100 h-100" href="./index.php?a=6">Nhà sản xuất</a>
                </li>
                <li id="invoice_item_link">
                    <a class="mb-2 d-inline-block text-center w-100 h-100" href="./index.php?a=7">Chi tiết đơn hàng</a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<script>
    var can_open = false;
    $("#show_menu").click(function(){
        can_open = !can_open;
        if(can_open){
            $("#admin_menu").css("visibility","visible");
            $("#admin_content").css("opacity","0.5");
        }
        else{
            $("#admin_menu").css("visibility","hidden");
            $("#admin_content").css("opacity","1");
        }
    });
    $(function(){

        var $win = $(window); // or $box parent container
        var $box = $("#show_menu");

        $win.on("click", function(event){
            if($(window).width() <= 800) {

                if (
                    $box.has(event.target).length == 0 //checks if descendants of $box was clicked
                    &&
                    !$box.is(event.target) //checks if the $box itself was clicked
                ) {
                    $("#admin_menu").css("visibility", "hidden");
                    $("#admin_content").css("opacity","1");
                    can_open = false;
                }
            }
        });
    });
</script>