<?php 
	$error = "";

	if(isset($_POST['submit'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$passwd = $_POST['passwd'];

		$error = $db->createUser($email, $name, $passwd);
	}
 ?>