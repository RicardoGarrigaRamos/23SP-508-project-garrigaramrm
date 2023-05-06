<?php 

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $password = $_POST["password"];
    
    
    if (emptyInputsLogin($name, $password)!== false){
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
