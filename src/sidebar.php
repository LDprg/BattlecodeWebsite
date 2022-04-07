<?php
	/*echo "&nbsp;";
	for ($i=0; $i < count($MENU); $i++) {
		echo "<a class='navlink' href=index.php?section=" . $MENU[$i][1] . "> " . $MENU[$i][0] . " </a>";
		if($i < count($MENU)-1)
			echo "|";
	}*/
?>
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
	<a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
		<span class="fs-4"><?php echo $TITLE; ?></span>
	</a>
	<hr>
	<ul class="nav nav-pills flex-column mb-auto">
		<?php for ($i=0; $i < count($MENU); $i++) { ?>
			<li>
				<a href="<?php echo "index.php?section=" . $MENU[$i][1]; ?>" 
					class="nav-link <?php echo $section == $MENU[$i][1] ? "active" : "text-white"; ?>">
					<?php echo $MENU[$i][0]; ?>
				</a>
			</li>
		<?php } ?>
	</ul>
	<hr>
	<div class="dropdown">
		<!-- <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
			<strong>mdo</strong>
		</a>
		<ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser">
			<li><a class="dropdown-item" href="#">Settings</a></li>
			<li><a class="dropdown-item" href="#">Profile</a></li>
			<li><hr class="dropdown-divider"></li>
			<li><a class="dropdown-item" href="#">Logout</a></li>
		</ul> -->

		<a href="#" class="d-flex align-items-center text-white text-decoration-none" aria-expanded="false">
			<strong>Login</strong>
		</a>
	</div>
</div>