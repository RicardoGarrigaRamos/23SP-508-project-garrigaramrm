<?php include_once 'header.php';?>


<head>
    <link rel="stylesheet" href="css/profile.css">
</head>
	
	<main>
		<p>This is the profile</p>
		
		<?php 
		if(isset($_SESSION) === false){
		    require('login.php');
		}
		?>
	</main>

</body>
</html>
