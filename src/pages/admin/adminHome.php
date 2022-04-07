<?php
	if (!defined('IN_SITE')) { echo("Zugriff verweigert: <a href='index.php?section=home'>Zurück zur Startseite</a>"); die();}
	if (!$db->isAdminLoggedIn()) {echo("Zugriff verweigert: <a href='index.php?section=home'>Zurück zur Startseite</a>"); die();}
	//zugriffsschutz ende
?>

<a href="index.php?section=!manageSides"><button>Manage Sides</button></a>
<a href="index.php?section=!adminlogin"><button>Logout</button></a>