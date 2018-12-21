<div id="admin_menu" class="d-block float-left bg-dark w-25" style="height: -webkit-fill-available;">
    <div class="wrapper w-100">
        <nav id="sidebar">
            <ul class="list-unstyled components">
                <li id="dashboard_link" class="active">
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
            </ul>
        </nav>
    </div>
</div>

<script>
    var can_open = false;
    $("#show_menu").click(function(){
        can_open = !can_open;
        if(can_open){
            $("#admin_menu").css("margin-left","0px");
        }
        else{
            $("#admin_menu").css("margin-left","-200px");
        }
    });
</script>