<?php


if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require_once ("connection.inc.php");
    require_once ("functions.inc.php");
    
    $profile_data = getUserInfo();
    
    
}else {
    header("location: ../profile.php");
    exit();
}