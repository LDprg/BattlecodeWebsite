<?php

	/* * * * * * * * * * * * * * * * * * * * * * * * * 
	 *												 *	
	 *	Copyright: 	Daniel Mikulas, 2019			 *
	 *	Contact: 	daniel04mik@gmail.com 			 *
	 *												 *
	 *	File: 		staticVar.php, static vars 		 *
	 *												 *
	 * * * * * * * * * * * * * * * * * * * * * * * * */



//Pagetitle
$TITLE="LD-programs";
$LANG="en";
$KEYWORDS="";
$DESCRIPTION="";
//Pagefooter

//page not found ERROR 404
$ERROR404 = "<center><h1>ERROR 404 - page not found</h1><br><a href=\"./index.php\"><h2>Back to main-page</h2><img src=\"./images/404.png\" alt=\"Bild: Error 404\"></center></a>";
//START MENU LIST
$MENU = array(	array("HOME", "home"),
				array("ABOUT US", "about"),
				array("CONTACT US", "contact"),
			);

$PAGES = array(	"home" => "./pages/home.php",
				"about" => "./pages/about.php",
				"contact" => "./pages/contact.php",
				"impressum" => "./pages/impressum.php",
			);
//END MENU LIST


?>