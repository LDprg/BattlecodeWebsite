<?php
	session_start();
	include 'db.php';

	$db = new DB();
	$error = false;
?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>
	<?php 
		if(isset($_POST['submit'])) {
			$name = $_POST['name'];
    		$passwd = $_POST['passwd'];

    		$error = $db->loginUser($name, $passwd);
    	}else{
	 ?>

	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		User:<br>
		<input type="text" size="40" maxlength="250" name="name" required="required"><br><br>
		 
		Passwort:<br>
		<input type="password" size="40"  maxlength="250" name="passwd" required="required"><br><br>
		 
		<input type="submit" value="Login" name="submit">
	</form>	

	<?php 
		}

		if($error){
			echo $error;
			echo "<br>";
			echo "<a href='". $_SERVER['PHP_SELF'] ."'>Try again</a>";
		}
		elseif(isset($_POST['submit'])){
			echo "worked <br>";
			echo "<a href='./'>Back to Main</a>";
		}
	 ?>
</body>
</html>