<?php
class DB {
		private static $_db_username = "MYSQL_USER";
		private static $_db_password = "MYSQL_PASSWORD";
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

	}
	$db = new DB();


?> 