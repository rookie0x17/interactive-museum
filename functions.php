<?php

session_start();
$_SESSION['id'] = isset( $_SESSION['id'] )? $_SESSION['id'] : '';

$link = mysqli_connect("localhost" , "daniel" , "museum" , "int-museum");

if (mysqli_connect_errno()) {

    print_r(mysqli_connect_error());
    exit();
}

if (isset($_GET['function']) && $_GET['function']== "logout"){
    session_unset();
}
?>