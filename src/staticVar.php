<?php
	$TITLE="Battlecode 22 Challenges";
	$LANG="en";
	$KEYWORDS="Battlecode, Challenges";
	$DESCRIPTION="A Website for makeing Battlecode 22 Challenges!";

	$ERROR404 = "<center><h1>ERROR 404 - Page not found</h1><br><a href=\".\"><h2>Back to Home</h2><img src=\"./images/404.png\" alt=\"Bild: Error 404\"></center></a>";

	$MENU = array(	
		array("Home", "home", "house-door"),
		array("Getting Started", "getting_started", "sun"),
		array("Resources", "resources", "clipboard2-data"),
	);

	$LOGINMENU = array(	
		array("Upload", "upload", "upload"),
		array("Test", "test", "wrench"),
	);

	$PAGES = array(	
		"home" => "home.php",
		"getting_started" => "getting_started.php",
		"resources" => "resources.php",

		"login" => "login.php",
		"logout" => "logout.php",
		"register" => "register.php",

		"upload" => "upload.php",

		"test" => "test.php",
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

	function humanFileSize($size,$unit="") {
		if( (!$unit && $size >= 1<<30) || $unit == " GB")
			return number_format($size/(1<<30),2)." GB";
		if( (!$unit && $size >= 1<<20) || $unit == " MB")
			return number_format($size/(1<<20),2)." MB";
		if( (!$unit && $size >= 1<<10) || $unit == " KB")
			return number_format($size/(1<<10),2)." KB";
		else
			return number_format($size)." bytes";
	}
?>