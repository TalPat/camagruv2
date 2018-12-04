<?php

	session_start();
	require_once("functions.php");
	ft_checklogin();

	$target_dir = "uploads/".$_SESSION['id']."/";
	if (!file_exists($target_dir)) {
		mkdir($target_dir, 0777, true);
	}
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$fileName = time() . "." . $imageFileType;
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			$uploadOk = 0;
		}
	}

	if (file_exists($target_file)) {
		$uploadOk = 0;
	}
	
	if ($_FILES["fileToUpload"]["size"] > 2000000) {
		$uploadOk = 0;
	}
	
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		$uploadOk = 0;
	}
	
	if ($uploadOk == 0) {
		$out = "File failed to upload";
	} else {
		$filePath = $target_dir . $fileName;
		$userid = $_SESSION['id'];
		$sql = "INSERT INTO images (imagename, filePath, sticker, merged, userid, votes) VALUES ('$fileName', '$filePath', 'none', '1', '$userid', '0');";
		ft_run_sql_noreturn($sql);
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $filePath)) {
			$out = "The file '". basename( $_FILES["fileToUpload"]["name"]). "' has been uploaded.";
		} else {
			$out = "There was an error uploading your file.";
		}
	}
?>

<html lang="en">

<?php ft_printhead("Upload Image"); ?>

<body>
	<div id="mainContent">

		<?php ft_printheader(); ?><div class="twelve columns">

		<div class="container">
			<h2>Upload Image</h2>
			<p><?php echo($out) ?></p>
		</div>

		</div><?php ft_printfooter(); ?>

	</div>
</body>
</html>
