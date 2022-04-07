<?php
	if (!defined('IN_SITE')) { echo("Zugriff verweigert: <a href='index.php?section=home'>Zurück zur Startseite</a>"); die();}
	if (!$db->isAdminLoggedIn()) {echo("Zugriff verweigert: <a href='index.php?section=home'>Zurück zur Startseite</a>"); die();}
	//zugriffsschutz ende


	if(isset($_POST['erstellen'])) {
		if ($db->newPage($_POST['name'], $_POST['lang'], $_POST['description'], $_POST['keywords'], $_POST['anmerkungen'], $_POST['page'])) {
			echo " <h2><font color=\"#088A29\">Seite erfolgreich hinzugefügt</font></h2>";
		} else {
			echo "<h2><font color=\"#DF013A\">Fehler beim Hinzufügen - Versuche es erneut, wenn der Fehler dauerhaft auftritt wende dich bitte an einen Entwickler</font></h2>";
		}
		echo "<a href=\"index.php?section=!adminHome\"><font color=\"#D41212\"><button>Admin-Home</button></font></a>";
		echo "<a href=\"index.php?section=!manageSides\"><button>Manage Sides</button></a>";
		echo "<a href=\"index.php?section=!createSide\"><button>Create New Page</button></a>";
	} else {
?>
<a href="index.php?section=!manageSides"><button><-- Manage Sides</button></a>
<a href="index.php?section=!adminHome"><button>Admin-Home</button></a>
<h1>New Page:</h1>
<form action="index.php?section=!createSide" method="POST">
	<table>
		<tr>
			<td>Seitenname:</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Sprache</td>
			<td>
				<select name="lang">
					<option value="de">Deutsch</option>
					<option value="en">Englisch</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Beschreibung:</td>
			<td><input type="text" name="description"></td>
		</tr>
		<tr>
			<td>Keywords:</td>
			<td><input type="text" name="keywords"></td>
		</tr>
		<tr>
			<td>Anmerkungen:</td>
			<td><input type="text" name="anmerkungen"></td>
		</tr>
	</table>
	<textarea name="page" id="editor1" rows="30">
		Die seite ...
	</textarea><br>
	<b>
		<input type="submit" name="erstellen" value="erstellen">
		<input type="reset" name="reset" value="Abbrechen/Verwerfen">
	</b>
</form>

<script type="text/javascript" src="./ckeditor/ckeditor.js"></script>
<script type="text/javascript">
	CKEDITOR.replace('editor1');
</script>

<?php 
	} //end else
?>