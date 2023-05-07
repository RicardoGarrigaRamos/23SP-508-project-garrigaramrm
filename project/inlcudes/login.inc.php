<?php 

if(isset($_POST["submitLogin"])){
    $name = $_POST["name"];
    $password = $_POST["password"];
    
    require_once ('connection.inc.php');
    require_once ('functions.inc.php');
    
    
    if (emptyInput($name)!== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (emptyInput($password)!== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidSession($conn, $name, $password)!== false){
        header("location: ../signup.php?error=invalidEmail");
        exit();
    
    getSessionID($conn, $name, $password);
}

else{
    header("location: ../login.php");
}
