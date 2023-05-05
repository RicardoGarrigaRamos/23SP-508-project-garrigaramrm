<?php 

require_once 'index.php'

?>

	
	<main class="signup-form">
		<h2>Sign Up</h2>
		<div class = "signup-form">
    		<form action = "signup.inc.php" method = "post">
    			<input type = "text" email="email" placeholder="Email...">
    			<input type = "text" email="username" placeholder="Username...">
    			<input type = "password" email="password" placeholder="Password...">
    			<input type = "password" email="password-repeat" placeholder="Repeat Password...">
    			<button type = "submit" name = "submit">Sign Up</button>
    		</form>
		</div>
	</main>

</body>
</html>