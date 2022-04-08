<?php
	$TITLE="Battlecode 22 Challenges";
	$LANG="en";
	$KEYWORDS="";
	$DESCRIPTION="";

	$ERROR404 = "<center><h1>ERROR 404 - page not found</h1><br><a href=\"./index.php\"><h2>Back to main-page</h2><img src=\"./images/404.png\" alt=\"Bild: Error 404\"></center></a>";

	$MENU = array(	
		array("Home", "home", "house-door"),
		array("Getting Started", "getting_started", "sun"),
		array("Resources", "resources", "clipboard2-data"),
		array(""),
	);

	$PAGES = array(	
		"home" => "./pages/home.php",
		"getting_started" => "./pages/getting_started.php",
		"resources" => "./pages/resources.php",

		"login" => "./pages/login.php",
		"logout" => "./pages/logout.php",
		"register" => "./pages/register.php",
	);

	function loadPageURL($page){
		return "index.php?section=" . $page;
	}

	function reloadPage(){
		echo '<script type="text/javascript">';
		echo 'location.reload();';
		echo '</script>';
		echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url=\''.$filename.'\'" />';
        echo '</noscript>';
	}
?>