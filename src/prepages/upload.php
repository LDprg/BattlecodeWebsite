<?php 
	$error = "";
	$info = "";

	if(isset($_FILES["upload"]) && $db->isUserLogin()) {
		 $target_dir = $db->getUserLogin()['path'];
		if (!file_exists($target_dir))
			mkdir($target_dir);

		$target_file = $target_dir . basename($_FILES["upload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		if (file_exists($target_file)) {
			$error = "Sorry, file already exists.";
			$uploadOk = 0;
		}

		if ($_FILES["upload"]["size"] > 5000000) {
			$error = "Sorry, your file is too large.";
			$uploadOk = 0;
		}

		if($imageFileType != "zip") {
			$error = "Sorry, only ZIP files are allowed.";
			$uploadOk = 0;
		}

		if ($uploadOk == 0) {
			$error = "Sorry, your file was not uploaded.";
		} else {
			if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
				$db->createUpload(basename($_FILES["upload"]["name"]));
				$info ="The file ". htmlspecialchars( basename( $_FILES["upload"]["name"])). " has been uploaded.";
				$_POST = NULL;
				$_FILES = NULL;
			} else {
				$error = "Sorry, there was an error uploading your file.";
			}
		}
	}

	$upload = $db->getUploads($db->getUserLogin()['id']);
?>