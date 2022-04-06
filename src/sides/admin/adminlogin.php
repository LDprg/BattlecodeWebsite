<?php 
	if (!defined('IN_SITE')) { echo("Zugriff verweigert: <a href='index.php?section=home'>Zurück zur Startseite</a>"); die();}
	if (isset($_POST['einloggen'])) {
		if($db->adminLogin(sha1($_POST['email']), md5(sha1($_POST['pw'])))) {
			echo " <h2><font color=\"#088A29\">Erfolgreich eingeloggt!</font></h2>";
		} else {
			echo "<h2><font color=\"#DF013A\">Felerhafte Anmeldung: Überprüfe deine Eingaben und versuche es erneut!</font></h2>";
		}
	}
	if (isset($_GET['logout'])) {
		if ($_GET['logout'] == "true") {
			$db->adminLogout();
			if (!$db->isAdminLoggedIn()) {
				echo "<h2><font color=\"#088A29\">Erfolgreich ausgeloggt!</font></h2>";
			} else {
				echo "<h2><font color=\"#DF013A\">Ausloggen fehlgeschlagen!</font></h2>";
			}
		}
	}
	if (!$db->isAdminLoggedIn()) { //start print Loginformular
		
?>

<h1>Administrator-Login</h1>
<h3>Zugriff nur für Administratoren</h3>
<form action="index.php?section=!adminlogin" method="POST">
	<table>
		<tr>
			<th>E-Mail:</th>
			<th><input type="email" name="email" required></th>
		</tr>
		<tr>
			<th>Password:</th>
			<th><input type="password" name="pw" required></th>
		</tr>
		<tr>
			<th></th>
			<th><input type="submit" name="einloggen" value="einloggen"></th>
		</tr>
	</table>
</form>

<?php

	} // ende print loginformular
	else
	{
		echo "Du bist bereits eingellogt: <a href=\"index.php?section=" . $section . "&logout=true\"><button >LOGOUT</button><br></a>";
		if ($db->isAdminLoggedIn()) {
			echo "<a href=\"index.php?section=!adminHome\"><font color=\"#D41212\"><button>Admin-Home</button></font></a>";
		}
	}

 ?>
