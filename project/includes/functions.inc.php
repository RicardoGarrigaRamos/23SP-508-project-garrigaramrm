<?php 

function emptyInput($str) {
    $result = false;
    if (empty($str))
    {
            $result = true;
    }
    
    return $result;
}

function passwordsNotMatching($vpassword, $repetPassword) {
    $result = true;
    if ($vpassword == $repetPassword)
    {
            $result = false;
    }
    
    return $result;
}

function passwordLength($vpassword) {
    $result = false;
    if (strlen($vpassword) < 2)
    {
        $result = true;
    }
    
    return $result;
}

function invalidCharacter($str) {
    $result = false;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $str))
    {
        $result = true;
    }
    
    return $result;
}

function userExists($conn, $email, $vusername) {
    
    $sql = "select session_id, username, password, user_id
        from users join sessions using (session_id)
        where username =:vusername or email =:email;";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':vusername', $vusername);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $queryResult = $stmt->fetch();
    if (isset($queryResult)){
        return $queryResult;
    }
    
    return false; 
    
}

function createUser($conn, $email, $vusername, $vpassword) {
    
    $hashedPwd = password_hash($vpassword, PASSWORD_DEFAULT);
    
    $sql = "call createUser(:vusername,:vpassword,:email)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':vusername', $vusername);
    $stmt->bindValue(':vpassword', $hashedPwd);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    
    createSession($conn, $vusername, $vpassword);
    
    header("location: ../index");
    exit();
    
}


function createEmployee($conn, $vusername, $vpassword, $firstName, $lastName, $email, $dob, $supID) {
    
    $hashedPwd = password_hash($vpassword, PASSWORD_DEFAULT);
    
    $sql = "call createEmployee(:username,:password,:firstName, :lastName, :email, :dob, :supID)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':username', $vusername);
    $stmt->bindValue(':password', $hashedPwd);
    $stmt->bindValue(':firstName', $firstName);
    $stmt->bindValue(':lastName', $lastName);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':dob', $dob);
    $stmt->bindValue(':supID', $supID);
    $stmt->execute();
    
    header("location: ../signup.php");
    exit();
}


function createSession($conn, $name, $vpassword){
    $user = userExists($conn, $name, $name);
    if($user === false) {
        header("location: ../login.php?error=wrongLogin");
        exit();
    }
    
    $pwdHashed = $user["password"];
    $isPWD = password_verify($vpassword, $pwdHashed);
    
    if($isPWD === false) {
        header("location: ../login.php?error=wrongLogin");
        exit();
    }
    else if($isPWD === true) {
        session_start();
        $_SESSION["session_id"] = $user["session_id"]; 
        
        
        $sql = "select session_is_admin(:session_id)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':session_id', $user["session_id"]);
        $stmt->execute();
        $queryResult = $stmt->fetch();
        $_SESSION["is_admin"] = $queryResult;
        $_SESSION["username"] = $user["username"];
        $_SESSION["user_id"] = $user["user_id"];
        
        header("location: ../index.php");
        exit();
    }
    
    
    
}
