<?php
require_once 'header.php';
?>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>


<title>PR User Search</title>

<body>
	<div class = "container my-5">
		<form method = "post">
			<input type="text" placeholder ="Search..." name = "search">
			<button class="btn btn-dark btm-sm" name="submit">Search</button>
		</form>
		<div class="container my-5">
			<table id="table-user" class="table table-bordered table-striped">
				<?php 
				
				if(isset($_POST['submit'])){
				    
				    $search=$_POST['search'];
				    // Display all errors, very useful for PHP debugging (disable in production)
				    error_reporting(E_ALL);
				    ini_set('display_errors', 1);
				    
				    // Parameters of the MySQL connection
				    $servername = "cmsc508.com";
				    $username = "23SP_garrigaramrm";
				    $password = "23SP_garrigaramrm";
				    $database = "23SP_garrigaramrm_pr";
				    
				    try {
				        // Establish a connection with the MySQL server
				        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
				        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				    } catch (PDOException $e) {
				        echo "Connection failed: " . $e->getMessage();
				    }
				    
				    $sql = "select * from employees where employee_id=:emp_id;";
				    $stmt = $conn->prepare($sql);
				    $stmt->bindValue(':emp_id', $search);
				    $stmt->execute();
				    $queryResult = $stmt->fetch();
	                
				    echo "
                    <thead>
    				    <tr>
        				    <th>Username</th>
        				    <th>Email</th>
        				    <th>Following</th>
        				    <th>Followers</th>
        				    <th>Active</th>
    				    </tr>
				    </thead>
                    <tbody>
                        <tr>
                            <td>'#'</td>
            				<td>'#'</td>
            				<td>'#'</td>
                        </tr>
                    </tbody>";
				}
				?>
			
			</table>
		</div>
	</div>
</body>
</html>