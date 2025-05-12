<?php


    session_start();
    session_unset();
    session_destroy();
    header("location: http://localhost/CoffeeShop/admin-panel/admins/login-admins.php");