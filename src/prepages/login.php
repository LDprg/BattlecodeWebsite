<?php 
	$error = "";

	if($_POST && isset($_POST['submit'])) {
		$submit = $_POST['submit'];
		$email = $_POST['email'];
		$passwd = $_POST['passwd'];

		$error = $db->loginUser($email, $passwd);
	}
 ?>