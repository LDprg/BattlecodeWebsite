<?php
if (!defined('IN_SITE')) { echo("Zugriff verweigert: <a href='index.php?section=home'>Zurück zur Startseite</a>"); die();}
	

	/* * * * * * * * * * * * * * * * * * * * * * * * * 
	 *												 *	
	 *	Copyright: 	Daniel Mikulas, 2019			 *
	 *	Contact: 	daniel04mik@gmail.com 			 *
	 *												 *
	 *	File: 		mainpage.php, generates the 	 *
	 *								main pages 		 *
	 *	requires:	staticVar.php 	=> $ERROR404;	 *
	 *				mysql.php 		=> getPage();	 *
	 *				index.php 		=> $section;	 *
	 *												 *
	 * * * * * * * * * * * * * * * * * * * * * * * * */
	

	$page = $db->getPage($section);
	
	if ($page == false) {
		 echo $ERROR404;
	} else {
		if ($section[0] == '!') {
			
			include $page;
		}
		else {
			echo $page;
		}
	}
		


?>