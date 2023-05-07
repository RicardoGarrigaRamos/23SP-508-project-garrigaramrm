<?php require_once 'header.php'?>
<head>
    <link rel="stylesheet" href="css/form.css">
</head>
	
	<main class="container mt-3 mb-3">
		<form action="includes/signup.inc.php" method="post">
			<div class="row justify-content-center">
				<div class="col-4">
					<div class="form-group">
						<label>Email:</label>
						<input type="email" class="form-control" name="email" placeholder="Enter email">
					</div>
					<div class="form-group">
						<label>Username:</label>
						<input type="text" class="form-control" name="vusername" placeholder="Enter username" >
					</div>
					<div class="form-group">
						<label>Password:</label>
						<input type="password" class="form-control" name="vpassword" placeholder="Enter password">
					</div>
					<div class="form-group">
						<label>Repet Password:</label>
						<input type="password" class="form-control" name="repet-password" placeholder="Confirm password">
					</div>
					<button type="submit" name="submit" class="btn btn-primary">Sign up</button>
				</div>
			</div>
		</form>
		<div>
        	<?php 
            	if(isset($_GET["error"])){
            	    if($_GET["error"] == "emptyinput"){
            	        echo "<p>Error :  A field is still empty</p>";
            	    }
            	    if($_GET["error"] == "passwordsDontMatch"){
            	        echo "<p>Error :  Passwords did not match</p>";
            	    }
            	    if($_GET["error"] == "passwordIsTooShort"){
            	        echo "<p>Error :  Password was too short</p>";
            	    }
            	    if($_GET["error"] == "invalidInput"){
            	        echo "<p>Error :  A field used illigal characters</p>";
            	    }
            	    if($_GET["error"] == "userExists"){
            	        echo "<p>Error :  This user already exists</p>";
            	    }
            	    if($_GET["error"] == "none"){
            	        echo "<p>You are signed in!</p>";
            	    }
            	}
        	?>
    	</div>	
	</main>

</body>
</html>

