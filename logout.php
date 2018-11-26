<?php
    include("./controllers/users/sessions_controller.php");
    session_destroy();
    header("refresh: 0; url='./login.php'");
?>