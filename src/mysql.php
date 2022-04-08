<?php
	class DB {
		private static $_db_username = "user";
		private static $_db_password = "9TF5KKZSu9kDQbxj";
		private static $_db_host = "db";
		private static $_db_name = "MYSQL_DATABASE";
		private static $_db;

		public function __construct() {
			try {
				self::$_db = new PDO("mysql:host=" . self::$_db_host . ";dbname=" . self::$_db_name,  self::$_db_username , self::$_db_password);
			} catch(PDOException $e) {
				echo "Datenbankverbindung gescheitert!<br>";
				die($e);
			}
		}

		public function createUser($email, $name, $passwd)
		{
			try{
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					return "Email not valid!";
				}

				$hash = password_hash($passwd, PASSWORD_DEFAULT);
				$session = session_id();
				$path = "/home/work/code/" . $name . "_" . $email . "/"; 

				$stmt = self::$_db->prepare("INSERT INTO users(name, passwd, email, session, path) VALUES (:name, :passwd, :email, :session, :path)");

				$stmt->bindParam(":name", $name);
				$stmt->bindParam(":passwd", $hash);
				$stmt->bindParam(":email", $email);
				$stmt->bindParam(":session", $session);
				$stmt->bindParam(":path", $path);

				if($stmt->execute()) {
					if (!file_exists($path))
						mkdir($path);
					return false;
				} else {
					return 	"SQL Error <br />" . 
							$stmt->queryString . "<br />" .
							$stmt->errorInfo()[2];
				}
			} catch (PDOException $e) {
		        if ($e->errorInfo[1] == 1062) {
		            return "User name already existing!";
		        } else {
		            throw $e;
		        }
		    }
		}

		public function loginUser($email, $passwd)
		{
			$stmt = self::$_db->prepare("SELECT * FROM users WHERE email = :email");

			$stmt->bindParam(":email", $email);

			if($stmt->execute()) {
				$user = $stmt->fetch();
				if(!empty($user) && password_verify($passwd, $user['passwd'])){
					$_SESSION['session'] = $user['session'];
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

		public function logoutUser()
		{
			if($_SESSION['session']){
				$_SESSION['session'] = NULL;
			}
		}
		
		public function isUserLogin(){
			$stmt = self::$_db->prepare("SELECT ID FROM users WHERE session=:sid");
		    $stmt->bindParam(":sid", $_SESSION['session']);
			$stmt->execute();

			if($stmt->rowCount() === 1) {
				return true;
			} else {
				return false;	
			}
		}

		public function getUserLogin(){
			if($this->isUserLogin()){
				$stmt = self::$_db->prepare("SELECT * FROM users WHERE session=:sid");
				$sid = session_id();
			    $stmt->bindParam(":sid", $sid);
				$stmt->execute();

				if($stmt->rowCount() === 1) {
					return $stmt->fetch();
				} else {
					return false;	
				}
			}
			else
				return false;
		}

		public function getUploads($uid)
		{		
			$stmt = self::$_db->prepare("SELECT * FROM uploads WHERE userid=:uid");		
			$stmt->bindParam(":uid", $uid);
			$stmt->execute();
			return $stmt->fetchAll();
		}

		public function createUpload($filename)
		{		
			if($this->isUserLogin()){
				$stmt = self::$_db->prepare("INSERT INTO uploads(userid, filename) VALUES (:uid, :filename)");		
				$stmt->bindParam(":uid", $this->getUserLogin()['id']);
				$stmt->bindParam(":filename", $filename);
				$stmt->execute();
				return $stmt->fetchAll();
			}
		}
  	}
?>