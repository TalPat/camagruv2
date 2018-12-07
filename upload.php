<?php

	session_start();
	require_once("functions.php");
	if (!isset($_SESSION[user]))
		header("location: index.php");

?>

<html lang="en">

<?php ft_printhead("Upload Image"); ?>

<body>
	<div id="mainContent">

		<?php ft_printheader(); ?><div class="twelve columns">

		<div class="container primary">
			<h2>Upload an Image</h2>
			<form action="uploadAction.php" method="post" enctype="multipart/form-data">
				Select image to upload:<br>
				<input type="file" name="fileToUpload" id="fileToUpload"><br>
				<input type="submit" value="Upload Image" name="submit">
			</form>
		</div>

		</div><?php ft_printfooter(); ?>

	</div>
</body>
</html>
