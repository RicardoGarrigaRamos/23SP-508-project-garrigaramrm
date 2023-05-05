<?php 

require_once 'index.php'

?>

	
	<main class="container mt-3 mb-3">
		<form method="post">
			<div class="row justify-content-center">
				<div class="col-4">
					<div class="form-group">
						<label>Email:</label>
						<input type="username" class="form-control" id="username" placeholder="Enter username" name="username" required>
					</div>
					<div class="form-group">
						<label>Password:</label>
						<input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
					</div>
					<button type="submit" class="btn btn-primary">Log in</button>
				</div>
			</div>
		</form>
	</main>

</body>
</html>

<?php 

require_once 'index.php'

?>

	
	<main class="signup-form">
		<h2>Sign Up</h2>
		<div class="row justify-content-center">
			<div class = "signup-form">
    			<div class="col-4">
    				<div class="form-group">
                		<form action = "signup.inc.php" method = "post">
                			<input type = "text" email="email" placeholder="Email...">
                			<input type = "text" email="username" placeholder="Username...">
                			<input type = "password" email="password" placeholder="Password...">
                			<input type = "password" email="password-repeat" placeholder="Repeat Password...">
                			<button type = "submit" name = "submit">Sign Up</button>
                		</form>
            		</div>
        		</div>
    		</div>
		</div>
	</main>

</body>
</html>