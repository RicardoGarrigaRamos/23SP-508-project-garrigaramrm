<?php 

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $repetPassword = $_POST["repet-password"];
        
        
    if (emptyInputsSignup($email, $username, $password, $repetPassword)!== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidEmail($email)!== false){
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }
    if (invalidUsername($username)!== false){
        header("location: ../signup.php?error=invalidUsername");
        exit();
    }
    if (passwordMatch($password, $repetPassword)!== false){
        header("location: ../signup.php?error=passwordsDontMatch");
        exit();
    }
    if (invalidPassword($password)!== false){
        header("location: ../signup.php?error=invalidPassword");
        exit();
    }
    if (passwordLength($password)!== false){
        header("location: ../signup.php?error=passwordIsTooShort");
        exit();
    }
    if (emailExists($conn, $email)!== false){
        header("location: ../signup.php?error=emailInUse");
        exit();
    }
    if (UsernameExists($conn, $username)!== false){
        header("location: ../signup.php?error=usernameTaken");
        exit();
    }
    
    createUser($conn, $email, $username, $password);
}

else{
    header("location: ../signup.php");
    exit();
}
