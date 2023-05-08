<?php
function getUserInfo() {
    $conn = $_POST["conn"];
    
    $sql = "select *
            from user_profile
            where username = :username;";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':username', $_SESSION["username"]);
    if (!$stmt->execute()){
        $stmt = null;
        header("location: ../profile.php?error=stmtFailed");
        exit();
    }
    
    if ($stmt->rowCount() == 0){
        $stmt = null;
        header("location: ../profile.php?error=profileNotFound");
        exit();
    }
    
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateProfileInfo($isActive){
    $conn = $_POST["conn"];
    
    $sql = "update users
            set isActive = :isActive, 
            where user_id; = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':user_id', $_SESSION["user_id"]);
    $stmt->bindValue(':isActive', $isActive);
    $stmt->execute();
}

function deleteProfileInfo(){
    $conn = $_POST["conn"];
    
    $sql = "update users
            set deleted = true
            where user_id; = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':user_id', $_SESSION["user_id"]);
    $stmt->execute();
}