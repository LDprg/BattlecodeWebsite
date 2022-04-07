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

	if(isset($_GET["lang"]))
	{
		$lang = $_GET["lang"];
		setcookie("lang",$lang,time()+100000000);

	}
	elseif (isset($_COOKIE["lang"])) {
		$lang = $_COOKIE["lang"];
	} else {
		$lang = 'en';
	}

	define('IN_SITE', true);
	require_once 'mysql.php';
	require_once 'staticVar.php';
	$db = new DB();	
 ?>

<!DOCTYPE html>
<html lang="<?php echo $LANG ?>">
	<head>
		<title><?php echo $TITLE; ?></title>

		<link rel="stylesheet" type="text/css" href="style.css" />
		<script type="text/javascript" src="cookie-settings.js"></script>
		<script type="text/javascript" src="https://s3.eu-central-1.amazonaws.com/website-tutor/cookiehinweis/script.js"></script>
		<script type="text/javascript" src="jquery-3.4.1.min.js"></script>

		<!--META-->
		<meta charset="UTF-8">
		<meta name="revisit-after" content="7 days">
		<meta name="copyright"content="LD-programs">
		<meta name="reply-to" content="ld.programs@gmx.at">
		<meta name="robots" content="index,follow" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- META by each Side -->
		<meta name="language" content=<?php echo "\"" . $LANG . "\""; ?>>
		<meta name="keywords" content=<?php echo "\"" . $KEYWORDS . "\""; ?>/>
		<meta name="description" content=<?php echo "\"" . $DESCRIPTION . "\""; ?>/>
	</head>
	<body>
		<div id="wrapper">
			<header>
				
			</header>
			<div id="place-menu">
				<nav class="menu">
					<?php include 'nav.php'; ?>
					<div id="soc-in-menu">
						<a href="https://github.com/ld-programs/" target="_blank" rel="noopener">
							<img src="./images/github.png" width="22px" height="22px"></a>
						<a href="https://www.patreon.com/LD_programs" target="_blank" rel="noopener">
							<img src="./images/Patreon.png" width="22px" height="22px"></a>
						<a href="https://discord.gg/6rgavKU" target="_blank" rel="noopener">
							<img src="./images/discord.png" width="22px" height="22px"></a>
						<a href="mailto:ld.programs@gmx.at" target="_blank" rel="noopener">
							<img src="./images/mail.png" width="22px" height="22px"></a>
						&nbsp;

					</div>
				</nav>


			</div>
			<main>
				<?php include("mainpage.php"); ?>
			</main>
			
			<footer>
				<?php include 'footer.php'; ?>

			</footer>
		</div>

		<script type="text/javascript">
			var num = 200 + 20; //number of pixels before modifying styles, header + 20 px margin top

			$(window).bind('scroll', function () {
			    if ($(window).scrollTop() > num) {
			        $('.menu').addClass('fixed');
			    } else {
			        $('.menu').removeClass('fixed');
			    }
			});
		</script>
	</body>
</html>