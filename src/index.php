<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Main</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php 
		if(!empty($_SESSION['userid']))
			echo "<a href='logout.php'>Logout</a>";
		else{
			echo "<a href='register.php'>Regestrierung</a><br>";
			echo "<a href='login.php'>Login</a>";
		}
	 ?>
</body>
</html>