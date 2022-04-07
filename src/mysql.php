<?php
if (!defined('IN_SITE')) { echo("Zugriff verweigert: <a href='index.php?section=startseite'>Zurück zur Startseite</a>"); die();}
	
	/* * * * * * * * * * * * * * * * * * * * * * * * * 
	 *												 *	
	 *	Copyright: 	Daniel Mikulas, 2019			 *
	 *	Contact: 	daniel04mik@gmail.com 			 *
	 *												 *
	 *	File: 		mysql.php, connection to db 	 *
	 *	Functions sorted by:						 *
	 *				file where used 				 *
	 *												 *
	 * * * * * * * * * * * * * * * * * * * * * * * * */

	require_once 'staticVar.php';
 
	class DB {
		/* Init */
			private static $_db_username = "user";
			private static $_db_password = "9TF5KKZSu9kDQbxj";
			private static $_db_host = "db";
			private static $_db_name = "MYSQL_DATABASE";
			private static $_db;

			function __construct() {
				try {
				self::$_db = new PDO("mysql:host=" . self::$_db_host . ";dbname=" . self::$_db_name,  self::$_db_username , self::$_db_password);
				} catch(PDOException $e) {
					echo "Datenbankverbindung gescheitert!";
					die();
				}
			}
		/* Init ENDE */
		/* CMS - main pages */
			function getPage($section)
			{
				return $PAGES[$section];
			}
		/* CMS ENDE  */
		/* USER::ADMIN*/
			/*LOGIN-State*/
				function isAdminLoggedIn() 
				{
					$stmt = self::$_db->prepare("SELECT id FROM adminAccounts WHERE session=:sid");
					$sid = session_id();
				    $stmt->bindParam(":sid", $sid);
					$stmt->execute();
					
					if($stmt->rowCount() === 1) {
						return true;
					} else {
						return false;	
					}
				}
				function adminLogin($name, $password)
				{
					$stmt = self::$_db->prepare("SELECT id FROM adminAccounts WHERE email=:email AND password=:pw");
					$stmt->bindParam(":email", $name);
					$stmt->bindParam(":pw", $password);
					$stmt->execute();
			 
					if($stmt->rowCount() === 1) {
						$stmt = self::$_db->prepare("UPDATE adminAccounts SET session=:sid WHERE email=:email AND password=:pw");
			            $sid = session_id();
						$stmt->bindParam(":sid", $sid);
						$stmt->bindParam(":email", $name);
						$stmt->bindParam(":pw", $password);
						$stmt->execute();
						
						return true;
					} else {
						return false;
					}
				}
				function adminLogout()
				{
					$stmt = self::$_db->prepare("UPDATE adminAccounts SET session='' WHERE session=:sid");	
					$stmt->bindParam(":sid", session_id());
					$stmt->execute();
				}
			/*LOGIN-State ENDE*/
			/*ADMIN-ID*/
				function getAdminId()
				{
					$stmt = self::$_db->prepare("SELECT id FROM adminAccounts WHERE session=:sid");
					$sid = session_id();
					$stmt->bindParam(":sid", $sid);
					$stmt->execute();
					return $stmt->fetch(PDO::FETCH_OBJ)->id;
				}
				function getNicknameById($adminId)
				{
					$stmt = self::$_db->prepare("SELECT nickname FROM adminAccounts WHERE id=:adminId");
					$stmt->bindParam(":adminId", $adminId);
					if ($stmt->execute()) {
						if($stmt->rowCount() === 1) {
							$nickname = $stmt->fetch(PDO::FETCH_OBJ);
							return $nickname->nickname;
						} else 
						{
							return "unbekannt";
						}
					} else {
						return "unbekannt";
					}
				}
			/*ADMIN-ID ENDE*/
		/* USER::ADMIN ENDE*/
  }