<?php 

function emptyInput($str) {
    $result = false;
    if (empty($str))
    {
            $result = true;
    }
    
    return $result;
}

function passwordNotMatching($password, $repetPassword) {
    $result = false;
    if ($password !== $repetPassword)
    {
            $result = true;
    }
    
    return $result;
}

function passwordLength($password) {
    $result = false;
    if ($password.length < 5)
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

function userExists($conn, $email, $username) {
    
    $sql = "select session_id
        from users join sessions using (session_id)
        where username = :username and email = :email;";
    $stmt = $conn->prepare($sqlQuery);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $queryResult = $stmt->fetch();
    if (!empty($queryResult)){
        return $queryResult;
    }
    
    return false; 
    
}


function createUser($conn, $email, $username, $password) {
    $sql = "call createUser(:username,:password,:email)";
    $stmt = $conn->prepare($sqlQuery);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $password);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $queryResult = $stmt->fetch();
    if (!empty($queryResult)){
        return $queryResult;
    }
    
    return false; 
}


function createEmployee($conn, $username, $password, $firstName, $lastName, $email, $dob, $supID) {
    $sql = "call createEmployee(:username,:password,:firstName, :lastName, :email, :dob, :supID)";
    $stmt = $conn->prepare($sqlQuery);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $password);
    $stmt->bindValue(':firstName', $firstName);
    $stmt->bindValue(':lastName', $lastName);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':dob', $dob);
    $stmt->bindValue(':supID', $supID);

    $stmt->execute();
    $queryResult = $stmt->fetch();
    if (!empty($queryResult)){
        return $queryResult;
    }
    
    return false;
}