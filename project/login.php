<?php require_once 'header.php';?>
<head>
    <link rel="stylesheet" href="css/from.css">
</head>
	
	<main class="container mt-3 mb-3">
		<form action="inlcudes/login.inc.php" method="post">
			<div class="row justify-content-center">
				<div class="col-4">
					<div class="form-group">
						<label>Username:</label>
						<input type="text" class="form-control" name="name" placeholder="Username/Email" >
					</div>
					<div class="form-group">
						<label>Password:</label>
						<input type="password" class="form-control" name="password" placeholder="Enter password">
					</div>
					<button type="submit" name="submitLogin" class="btn btn-primary">Log in</button>
				</div>
			</div>
		</form>
	</main>

</body>
</html>

