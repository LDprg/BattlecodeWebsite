<?php 
	session_start();

	if(isset($_GET["section"]))
	{
		$section = $_GET["section"];
	}
	else
	{
		$section = "home";
	}

	require_once 'mysql.php';
	require_once 'staticVar.php';
	$db = new DB();	

	if(!$db->isUserLogin()){
		for ($i=0; $i < count($LOGINMENU); $i++) {
			if($LOGINMENU[$i][1] == $section) {
				$section = "login";
			}
		}
	}

	if (array_key_exists($section, $PAGES))
		$page = $PAGES[$section];
	else
		$page = NULL;

	if(file_exists("./prepages/".$page) && $page)
		include "./prepages/".$page;

	/* * * * * * * * * * * * * * * * * * * * * * * * * 
	 *												 *	
	 *	Copyright: 	Daniel Mikulas, 2019			 *
	 *	Contact: 	daniel04mik@gmail.com 			 *
	 *												 *
	 *	Note: 		Modified version 	 			 *
	 *												 *
	 * * * * * * * * * * * * * * * * * * * * * * * * */
 ?>

<!DOCTYPE html>
<html lang="<?php echo $LANG ?>">
	<head>
		<title><?php echo $TITLE; ?></title>
		
		<!--META-->
		<meta charset="UTF-8">
		<meta name="revisit-after" content="7 days">
		<meta name="copyright"content="LD-programs">
		<meta name="reply-to" content="ld.programs@gmx.at">
		<meta name="robots" content="index,follow" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- META by each Side -->
		<meta name="language" content="<?php echo $LANG; ?>">
		<meta name="keywords" content="<?php echo $KEYWORDS; ?>"/>
		<meta name="description" content="<?php echo $DESCRIPTION; ?>"/>

		<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>

		<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/piexif.min.js" type="text/javascript"></script>
		<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/sortable.min.js" type="text/javascript"></script>
		<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/fileinput.min.js"></script>

		<!-- Bootstrap -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

		<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

		<link href="style.css" rel="stylesheet">
	</head>
	<body>
		<main>
			<?php 
				include "sidebar.php";
			?>
			<div class="b-divider"></div>
			<div class="container-fluid overflow-auto p-3" style="background-color: #f5f5f5;">
				<?php 	
					if ($page == false) {
						 echo $ERROR404;
					} else {
						if(file_exists("./pages/".$page))
							include "./pages/".$page;
					}
				?>
			</div>
		</main>

		<!-- Bootstrap -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	</body>
</html>