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

function validCharacter($str) {
    $result = false;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $str))
    {
        $result = true;
    }
    
    return $result;
}

function userExists($conn, $email, $vusername) {
    
    $sql = "select session_id
        from users join sessions using (session_id)
        where username = :username or email = :email;";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':username', $vusername);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $queryResult = $stmt->fetch();
    if (!isset($queryResult)){
        return $queryResult;
    }
    
    return false; 
    
}


function createUser($conn, $email, $vusername, $vpassword) {
    
    $hashedPwd = password_hash($vpassword, PASSWORD_DEFAULT);
    
    $sql = "call createUser(:username,:password,:email)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':username', $vusername);
    $stmt->bindValue(':password', $hashedPwd);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    
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
    
    header("location: ../index");
    exit();
}