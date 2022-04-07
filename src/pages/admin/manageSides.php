<?php 
	if (!defined('IN_SITE')) { echo("Zugriff verweigert: <a href='index.php?section=home'>Zurück zur Startseite</a>"); die();}
	if (!$db->isAdminLoggedIn()) {echo("Zugriff verweigert: <a href='index.php?section=home'>Zurück zur Startseite</a>"); die();}


	if (isset($_GET['delete'])) {
		if ($db->deletePage($_GET['delete'])) {
			echo " <h2><font color=\"#088A29\">Seite erfolgreich gelöscht</font></h2>";
		} else {
			echo "<h2><font color=\"#DF013A\">Fehler beim Löschen - Versuche es erneut, wenn der Fehler dauerhaft auftritt wende dich bitte an einen Entwickler</font></h2>";
		}
		echo "<a href=\"index.php?section=!adminHome\"><font color=\"#D41212\"><button>Admin-Home</button></font></a>";
		echo "<a href=\"index.php?section=!manageSides\"><button>Manage Sides</button></a>";
	} else {
?>
<a href="index.php?section=!createSide"><button>Create New</button></a>
<a href="index.php?section=!adminHome"><button>Admin-Home</button></a>

<table border="1">
	<tr>
		<th>id</th>
		<th>Name</th>
		<th>Lang</th>
		<th>keywords</th>
		<th>last edit</th>
		<th>description</th>
		<th>anmerkungen</th>
		<th>EDIT</th>
		<th>DELETE</th>
	</tr>
	<?php 
		$pages = $db->getAllPages();
		foreach ($pages as $page) {
			echo "
				<tr>
					<td>
						" . $page['id'] . "
					</td>
					<td>
						<a href=\"index.php?section=" . $page['name'] . "&lang=" . $page['lang'] . "\" target=\"_blank\" rel=\"noopener\">" . $page['name'] . " </a>
					</td>
					<td>
						" . $page['lang'] . "
					</td>
					<td>
						" . $page['keywords'] . "
					</td>
					<td>
						" . $page['updated'] . "
					</td>
					<td>
						" . $page['description'] . "
					</td>
					<td>
						" . $page['anmerkungen'] . "
					</td>
					<td>
						<center><a href=\"index.php?section=!editSide&page=" . $page['id'] . "\">X</a><center>
					</td>
					<td>
						<center><a href='#' onclick=\"deleteFunc(" . $page['id'] . ", '" . $page['name'] . "')\">X</a></center>
					</td>
				</tr>
			";
		}
	?>
</table>
<script type="text/javascript">
function deleteFunc(id, name) {
  	var wollen = confirm('Wollen Sie ' + name + ' wirklich Löschen?');
  	//
  	if (wollen == true) {
  		window.location.href = "index.php?section=!manageSides&delete=" + id;

  	}
}
</script>

<?php
	} //endelse del ln 14
?>
