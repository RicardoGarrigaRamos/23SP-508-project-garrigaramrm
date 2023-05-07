<?php 

if(isset($_POST["submitSignup"])){
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $repetPassword = $_POST["repet-password"];
        
    require_once ('connection.inc.php');
    require_once ('functions.inc.php');
    
        
    if (emptyInput($email)!== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (emptyInput($username)!== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (emptyInput($password)!== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (emptyInput($repetPassword)!== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    
    if (passwordNotMatching($password, $repetPassword)!== false){
        header("location: ../signup.php?error=passwordsDontMatch");
        exit();
    }
  
    if (passwordLength($password)!== false){
        header("location: ../signup.php?error=passwordIsTooShort");
        exit();
    }

    if (invalidCharacter($email)!== false ||
        invalidCharacter($username)!== false ||
        invalidCharacter($password)!== false){
        header("location: ../signup.php?error=invalidInput");
        exit();
    }
    
    if (userExists($conn, $email, $username)!== false){
        header("location: ../signup.php?error=userExists");
        exit();
    }
    
    createUser($conn, $email, $username, $password);
}

else{
    header("location: ../signup.php");
    exit();
}
