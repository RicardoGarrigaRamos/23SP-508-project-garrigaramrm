<?php

require_once 'header.php'
    
?>
<head>
    <link rel="stylesheet" href="css/from.css">
</head>
	
	<main class="container mt-3 mb-3">
		<form action="inlcudes/signup.inc.php" method="post">
			<div class="row justify-content-center">
				<div class="col-4">
					<div class="form-group">
						<label>Email:</label>
						<input type="email" class="form-control" name="email" placeholder="Enter email">
					</div>
					<div class="form-group">
						<label>Username:</label>
						<input type="text" class="form-control" name="username" placeholder="Enter username" >
					</div>
					<div class="form-group">
						<label>Password:</label>
						<input type="password" class="form-control" name="password" placeholder="Enter password">
					</div>
					<div class="form-group">
						<label>Repet Password:</label>
						<input type="password" class="form-control" name="repet-password" placeholder="Confirm password">
					</div>
					
					<button type="submit" name="submitSignup" class="btn btn-primary">Sign up</button>
				</div>
			</div>
		</form>
	</main>

</body>
</html>

