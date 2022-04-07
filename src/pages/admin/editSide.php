<?php
	if (!defined('IN_SITE')) { echo("Zugriff verweigert: <a href='index.php?section=home'>Zurück zur Startseite</a>"); die();}
	if (!$db->isAdminLoggedIn()) {echo("Zugriff verweigert: <a href='index.php?section=home'>Zurück zur Startseite</a>"); die();}
	//zugriffsschutz ende

	if (!isset($_GET['page'])) {
		echo "<h2><font color=\"#DF013A\">Fehler - Keine Gültige Seite - Versuche es erneut, wenn der Fehler dauerhaft auftritt wende dich bitte an einen Entwickler</font></h2>";
		echo "<a href=\"index.php?section=!adminHome\"><font color=\"#D41212\"><button>Admin-Home</button></font></a>";
		echo "<a href=\"index.php?section=!manageSides\"><button>Manage Sides</button></a>";
		echo "<a href=\"index.php?section=!createSide\"><button>Create New Page</button></a>";
	} else {


		if(isset($_POST['speichern'])) {
			if ($db->saveEditPage($_GET['page'],$_POST['name'], $_POST['lang'], $_POST['description'], $_POST['keywords'], $_POST['anmerkungen'], $_POST['page'])) {
				echo " <h2><font color=\"#088A29\">Seite erfolgreich gespeichert</font></h2>";
			} else {
				echo "<h2><font color=\"#DF013A\">Fehler beim Speichern - Versuche es erneut, wenn der Fehler dauerhaft auftritt wende dich bitte an einen Entwickler</font></h2>";
			}
			echo "<a href=\"index.php?section=!adminHome\"><font color=\"#D41212\"><button>Admin-Home</button></font></a>";
			echo "<a href=\"index.php?section=!manageSides\"><button>Manage Sides</button></a>";

		}
		$oldPage = $db->getPageByID($_GET['page']);
		if ($oldPage == false) {
			echo "<h2><font color=\"#DF013A\">Fehler - Keine Gültige Seite - Versuche es erneut, wenn der Fehler dauerhaft auftritt wende dich bitte an einen Entwickler</font></h2>";
			echo "<a href=\"index.php?section=!adminHome\"><font color=\"#D41212\"><button>Admin-Home</button></font></a>";
			echo "<a href=\"index.php?section=!manageSides\"><button>Manage Sides</button></a>";
			echo "<a href=\"index.php?section=!createSide\"><button>Create New Page</button></a>";
		} else {

?>



<a href="index.php?section=!manageSides"><button><-- Manage Sides</button></a>
<a href="index.php?section=!adminHome"><button>Admin-Home</button></a>
<h1>Edit Page:</h1>
<form action="index.php?section=!editSide&page=<?php echo $_GET['page']; ?>" method="POST">
	<table>
		<tr>
			<td>Seitenname:</td>
			<td><input type="text" name="name" value="<?php echo $oldPage->name; ?>"></td>
		</tr>
		<tr>
			<td>Sprache</td>
			<td>
				<select name="lang" >
					<option value="de" <?php if ($oldPage->lang == "de") {echo "selected=\"selected\"";} ?>>Deutsch</option>
					<option value="en" <?php if ($oldPage->lang == "en") {echo "selected=\"selected\"";} ?>>Englisch</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Beschreibung:</td>
			<td><input type="text" name="description" value="<?php echo $oldPage->description; ?>"></td>
		</tr>
		<tr>
			<td>Keywords:</td>
			<td><input type="text" name="keywords" value="<?php echo $oldPage->keywords; ?>"></td>
		</tr>
		<tr>
			<td>Anmerkungen:</td>
			<td><input type="text" name="anmerkungen" value="<?php echo $oldPage->anmerkungen; ?>"></td>
		</tr>
	</table>
	<textarea name="page" id="editor1" rows="30"><?php echo $oldPage->inhalt; ?></textarea><br>
	<b>
		<input type="submit" name="speichern" value="speichern">
		<input type="reset" name="reset" value="Abbrechen/Verwerfen">
	</b>
</form>



<script type="text/javascript" src="./ckeditor/ckeditor.js"></script>
<script type="text/javascript">
	CKEDITOR.replace('editor1');
	window.onbeforeunload = function() {
	   	return 'Möchten Sie die Seite wirklich verlassen?';
	};
</script>

<?php 
		} //endelse ln 30
	} //endelse ln 11
?>