<?php require_once 'header.php';?>
<head>
    <link rel="stylesheet" href="css/form.css">
</head>
	
	<main class="container mt-3 mb-3">
		<form action="includes/login.inc.php" method="post">
			<div class="row justify-content-center">
				<div class="col-4">
					<div class="form-group">
						<label>Username:</label>
						<input type="text" class="form-control" name="name" placeholder="Username/Email" >
					</div>
					<div class="form-group">
						<label>Password:</label>
						<input type="password" class="form-control" name="vpassword" placeholder="Enter password">
					</div>
					<button type="submit" name="submit" class="btn btn-primary">Log in</button>
				</div>
			</div>
		</form>
		<div>
        	<?php 
        	   if(isset($_GET["error"])){
            	    if($_GET["error"] == "emptyinput"){
            	        echo "<p>Error :  A field is still empty</p>";
            	    }
            	    if($_GET["error"] == "wrongLogin"){
            	        echo "<p>Error :  Wrong Login Details</p>";
            	    }
            	    if($_GET["error"] == "none"){
            	        echo "<p>You are Logged in!</p>";
            	    }
                }
        	?>
    	</div>	
	</main>

</body>
</html>

