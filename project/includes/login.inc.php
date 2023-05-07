<?php 

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $vpassword = $_POST["vpassword"];
    $conn = $_POST["conn"];
    
    require_once ('connection.inc.php');
    require_once ('functions.inc.php');
    
    
    if (emptyInput($name)!== false){
        header("location: ../login.php?error=emptyinput");
        exit();
    }
    if (emptyInput($vpassword)!== false){
        header("location: ../login.php?error=emptyinput");
        exit();
    }
    
    createSession($conn, $name, $vpassword);
}

else{
    header("location: ../login.php");
}