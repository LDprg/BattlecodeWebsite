	Contact us: 
		<b>
			<a href="mailto:ld.programs@gmx.at">
				<font color="#08088A"> ld.programs@gmx.at</font>
			</a>
		</b>
	or 
		<b>
			<a href="https://discord.gg/6rgavKU" target="_blank" rel="noopener">
				<font color="#08088A">DISCORD</font>
			</a>
		</b>
<br>
	<b>
		&copy; 2019 
		<font color="#08088A">LD-programs</font>
		ALL RIGHTS RESERVED 
		
	</b>        
<br>
	<b>
		
		<a href="index.php?section=impressum">
			<font color="#08088A">
				IMPRESSUM
			</font>
		</a> 
		&verbar; 
		<a href="index.php?section=impressum#Kontaktdaten">
			<font color="#08088A">
				KONTAKTDATEN
			</font>
		</a> 
		
		&verbar; 
		<a href="index.php?section=impressum#Datenschutzerkl">
			<font color="#08088A">
				DATENSCHUTZERKL&Auml;RUNG
			</font>
		</a> 
		&verbar; 
		<a href="index.php?section=impressum#Quellen">
			<font color="#08088A">
				QUELLEN
			</font>
		</a>
	</b> 
<br>

<p align="right">
<?php if (!$db->isAdminLoggedIn()) { ?>
	<a href="index.php?section=!adminlogin"><font color="#D41212">Login</font></a>
<?php } else { ?>
	<a href="index.php?section=!adminHome"><font color="#D41212">Admin-Home</font></a>
	  | 
	<a href="index.php?section=!adminlogin"><font color="#D41212">Logout</font></a>
<?php } ?>
</p> 