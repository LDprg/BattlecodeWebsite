<?php

	/* * * * * * * * * * * * * * * * * * * * * * * * * 
	 *												 *	
	 *	Copyright: 	Daniel Mikulas, 2019			 *
	 *	Contact: 	daniel04mik@gmail.com 			 *
	 *												 *
	 *	File: 		nav.php, nav-menu writer, 		 *
	 *	requires:	staticVar.php 	=> $MENU(array); *
	 *												 *
	 * * * * * * * * * * * * * * * * * * * * * * * * */


	echo "&nbsp;";
	$temp = 0;
	$menu_num = count($MENU);
	while ($temp < $menu_num) {
		echo "<a class='navlink' href=index.php?section=" . $MENU[$temp][1] . "> " . $MENU[$temp][0] . " </a>";
		$temp = $temp + 1;
		/*if ($temp == $menu_num) {
			break;
		} else {
			echo "|";
		}*/ //nur notwendig wenn dropdown-lang nicht aktive ist
		echo " | ";
	}
	echo "
		<div class=\"dropdown\">
			
			<a class='navlink' class=\"dropbtn\"  href=\"#\">Select lang</a>
		  	<div class=\"dropdown-content\">
		    	<a href=\"index.php?section=" . $section . "&lang=de\">German</a>
		    	<a href=\"index.php?section=" . $section . "&lang=en\">English</a>
  			</div>
		</div>
	 ";



?>



<!--| <a class="search"><input type="text" name="search" placeholder="Search here"></a>-->