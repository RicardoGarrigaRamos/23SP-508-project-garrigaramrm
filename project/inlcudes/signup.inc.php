<?php 

if(isset($_POST["submit"])){
    
    $email = $_POST["email"];
    $vusername = $_POST["vusername"];
    $vpassword = $_POST["vpassword"];
    $repetPassword = $_POST["repet-password"];
        
    require_once ('connection.inc.php');
    require_once ('functions.inc.php');
    
        
    if (emptyInput($email)!== false){
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

    if (validCharacter($vusername)!== false ||
        validCharacter($vpassword)!== false){
        header("location: ../signup.php?error=invalidInput");
        exit();
    }
    
    if (userExists($conn, $email, $vusername)!== false){
        header("location: ../signup.php?error=userExists");
        exit();
    }
    
    createUser($conn, $email, $username, $vpassword);
}

else{
    header("location: ../signup.php");
    exit();
}
