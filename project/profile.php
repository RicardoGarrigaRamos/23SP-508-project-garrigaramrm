<?php include_once 'header.php';?>


<head>
    <link rel="stylesheet" href="css/profile.css">
</head>
	
<body>	
	<main>
		<p>This is your profile</p>
		<h2>
			line 1
			<br>
			line 2
		</h2>
		
		<?php 
		if(!isset($_SESSION)){
		    require('login.php');
		}
		?>
	</main>

</body>
</html>
