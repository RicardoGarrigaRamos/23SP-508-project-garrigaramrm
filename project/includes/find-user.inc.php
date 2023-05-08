<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $conn = $_POST["conn"];
    
    $search=$_POST['search'];
    
    $sql = "select * from user_profile where username=:vusername;";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':vusername', $search);
    $stmt->execute();
    $queryResult = $stmt->fetch();
    
    if($queryResult) {
        $num=mysqli_num_rows($queryResult);
        echo $num;
    }
}