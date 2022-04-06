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
		/* CMS - main pgaes */
			private function getPageFromDatabase($section, $lang)
			{
				$stmt = self::$_db->prepare("SELECT * FROM `pages` WHERE `name`=:name AND `lang`=:lang");
				$stmt->bindParam(":name", $section);
				$stmt->bindParam(":lang", $lang);

				$stmt->execute();
				$inhalt = $stmt->fetch(PDO::FETCH_OBJ);
				if($stmt->rowCount() == 1) {
					return $inhalt;
				} else {
					$stmt = self::$_db->prepare("SELECT * FROM `pages` WHERE `name`=:name AND `lang`='en'");
					$stmt->bindParam(":name", $section);
					

					$stmt->execute();
					$inhalt = $stmt->fetch(PDO::FETCH_OBJ);	
					if($stmt->rowCount() == 1) {
						return $inhalt;
					} else {
						$stmt = self::$_db->prepare("SELECT * FROM `pages` WHERE `name`=:name ORDER BY id ASC LIMIT 1");
						$stmt->bindParam(":name", $section);

						$stmt->execute();
						$inhalt = $stmt->fetch(PDO::FETCH_OBJ);	
						if($stmt->rowCount() == 1) {
							return $inhalt;
						} else {
							return false;
						}
					}
				}
			}
			function getPage($section, $lang)
			{
				$inhalt = $this->getPageFromDatabase($section, $lang);
				if ($inhalt == false) {
					return false;
				}
				else
				{
					return $inhalt->inhalt;
				}
			}

			function getMeta($section, $lang)
			{
				$meta = $this->getPageFromDatabase($section, $lang);
				if ($meta == false) {
					return false;
				}
				else
				{
					return $meta;
				}
			}
			function getAllPages(){
				$stmt = self::$_db->prepare("SELECT * FROM `pages` ORDER BY name ASC");
				$stmt->execute();
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}

			function newPage($name, $lang, $description, $keywords, $anmerkungen, $page) {
				$stmt = self::$_db->prepare("INSERT INTO `pages`(`name`, `lang`, `description`, `keywords`, `inhalt`, `anmerkungen`) VALUES (:name,:lang,:description,:keywords,:inhalt,:anmerkungen)");
				$stmt->bindParam(":name", $name);
				$stmt->bindParam(":lang", $lang );
				$stmt->bindParam(":description", $description );
				$stmt->bindParam(":keywords", $keywords );
				$stmt->bindParam(":inhalt", $page);
				$stmt->bindParam(":anmerkungen", $anmerkungen );
				if ($stmt->execute()) {
					return true;
				}  //else
				return false;
			}
			function saveEditPage($id, $name, $lang, $description, $keywords, $anmerkungen, $page) {
				$stmt = self::$_db->prepare("UPDATE `pages` SET `name`=:name,`lang`=:lang,`description`=:description,`keywords`=:keywords,`inhalt`=:inhalt,`anmerkungen`=:anmerkungen WHERE `id`=:id");
				$stmt->bindParam(":id", $id);
				$stmt->bindParam(":name", $name);
				$stmt->bindParam(":lang", $lang );
				$stmt->bindParam(":description", $description );
				$stmt->bindParam(":keywords", $keywords );
				$stmt->bindParam(":inhalt", $page);
				$stmt->bindParam(":anmerkungen", $anmerkungen );
				if ($stmt->execute()) {
					return true;
				}  //else
				return false;
			}
			function getPageByID($page) {
				$stmt = self::$_db->prepare("SELECT * FROM `pages` WHERE `id`=:id");
				$stmt->bindParam(":id", $page);

				$stmt->execute();
				$inhalt = $stmt->fetch(PDO::FETCH_OBJ);
				if($stmt->rowCount() == 1) {
					return $inhalt;
				} else{
					return false;
				}

			}
			function deletePage($id) {
				$stmt = self::$_db->prepare("DELETE FROM `pages` WHERE id=:id");
				$stmt->bindParam(":id", $id);
				if ($stmt->execute()) {
					return true;
				}  //else
				return false;
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
					$stmt = self::$_db->prepare("SELECT id FROM adminAccounts WHERE email_SHA=:adminmail AND password=:pw");
					$stmt->bindParam(":adminmail", $name);
					$stmt->bindParam(":pw", $password);
					$stmt->execute();
			 
					if($stmt->rowCount() === 1) {
						$stmt = self::$_db->prepare("UPDATE adminAccounts SET session=:sid WHERE email_SHA=:adminmail AND password=:pw");
			            $sid = session_id();
						$stmt->bindParam(":sid", $sid);
						$stmt->bindParam(":adminmail", $name);
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