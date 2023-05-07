<!DOCTYPE html>
<?php session_start();?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PR database</title>
    <!-- JS libraries -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>

    <!-- CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css"/>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
   
</head>

<body>
    <header class="header-main">
        
        <nav class="main-nav">
            <ul>
            	<li><a href="index.php">HOME</a></li>
                <li><a href="find-user.php">SEARCH</a></li>
                <?php 
                    if(isset($_SESSION) and !empty($_SESSION)) {
                        if($_SESSION["is_admin"]) {
                            echo "<li><a href='employees.php'>EMPLOYEES</a></li>";
                        }
                        echo "<li><a href='profile.php'>PROFILE</a></li>
                            <li><a href='includes/logout.inc.php'>LOG OUT</a></li>";
                    }else {
                        echo "<li><a href='login.php'>LOG IN</a></li>
                            <li><a href='signup.php'>SIGN UP</a></li>";
                    }
                ?>
            </ul>
        </nav>

    </header>