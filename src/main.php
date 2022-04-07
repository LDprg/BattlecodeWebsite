<?php
	$page = $PAGES[$section];
	
	if ($page == false) {
		 echo $ERROR404;
	} else {
		if ($section[0] == '!') {
			
			echo $page;
		}
		else {
			include $page;
		}
	}
?>