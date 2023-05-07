<?php 

if(isset($_POST["submit"])){
    
    $email = $_POST["email"];
    $vusername = $_POST["vusername"];
    $vpassword = $_POST["vpassword"];
    $repetPassword = $_POST["repet-password"];
    $conn = $_POST["conn"];
        
    require_once ("connection.inc.php");
    require_once ("functions.inc.php");
    
        
    if (emptyInput($email) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    
    if (emptyInput($vusername)!== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (emptyInput($vpassword)!== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (emptyInput($repetPassword)!== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (passwordsNotMatching($vpassword, $repetPassword)!== false){
        header("location: ../signup.php?error=passwordsDontMatch");
        exit();
    }
    if (passwordLength($vpassword)!== false){
        header("location: ../signup.php?error=passwordIsTooShort");
        exit();
    }

    if (invalidCharacter($vusername)!== false ||
        invalidCharacter($vpassword)!== false){
        header("location: ../signup.php?error=invalidInput");
        exit();
    }
    
    if (userExists($conn, $email, $vusername) !== false){
        header("location: ../signup.php?error=userExists");
        exit();
    }
    
    createUser($conn, $email, $vusername, $vpassword);
}

else{
    header("location: ../signup.php");
    exit();
}
