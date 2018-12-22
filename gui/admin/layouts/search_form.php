<form id="search_form" action="" method="get" autocomplete="off" style="clear: both;">
    <div class="row">
        <input type="text" name="q" class="form-control col-sm-10 mr-0" placeholder="Tìm kiếm..." value="<?php echo isset($_GET['q']) ? $_GET['q'] : ''; ?>" />
        <div class="ml-0 d-inline-block">
            <span class="btn btn-success" onclick="$('#search_form').submit()"><i class="fa fa-search"></i></span>
        </div>
    </div>
</form>