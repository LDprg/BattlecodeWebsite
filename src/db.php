<?php 
	class DB {
		private static $_db_username = "user";
		private static $_db_password = "9TF5KKZSu9kDQbxj";
		private static $_db_host = "db";
		private static $_db_name = "MYSQL_DATABASE";
		private static $_db;


		function __construct() {
			try {
			self::$_db = new PDO("mysql:host=" . self::$_db_host . ";dbname=" . self::$_db_name,  self::$_db_username , self::$_db_password);
			} catch(PDOException $e) {
				echo "Datenbankverbindung fehlgeschlagen!<br>";
				die($e);
			}
		}

		function createUser($name, $passwd, $email)
		{
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				return "Email not valid!";
			}

			$hash = password_hash($passwd, PASSWORD_DEFAULT);

			$stmt = self::$_db->prepare("INSERT INTO users(NAME, PASSWD, EMAIL) VALUES (:name, :passwd, :email)");

			$stmt->bindParam(":name", $name);
			$stmt->bindParam(":passwd", $hash);
			$stmt->bindParam(":email", $email);

			if($stmt->execute()) {
				return false;
			} else {
				return 	"SQL Error <br />" . 
						$stmt->queryString . "<br />" .
						$stmt->errorInfo()[2];
			}
		}

		function loginUser($name, $passwd)
		{
			$stmt = self::$_db->prepare("SELECT * FROM users WHERE name = :name");

			$stmt->bindParam(":name", $name);

			if($stmt->execute()) {
				$user = $stmt->fetch();
				if(!empty($user) && password_verify($passwd, $user['PASSWD'])){
					$_SESSION['userid'] = $user['ID'];
					return false;
				} else {
					return "Password or User wrong!";
				}
			} else {
				return 	"SQL Error <br />" . 
						$stmt->queryString . "<br />" .
						$stmt->errorInfo()[2];
			}
		}
	}
 ?>