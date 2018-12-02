<?php

	session_start();
	require_once("functions.php");
	if (!isset($_SESSION[user]))
		header("location: index.php");

?>

<html lang="en">

<?php ft_printhead("Camagru"); ?>

<body>
	<div id="mainContent">

		<?php ft_printheader(); ?>

		<div class="container">
			<h2><?php print($_SESSION[user]) ?>'s Profile</h2>
			<a href="photo.php">Take Photo</a><br>
			<a href="upload.php">Upload a Picture</a>
		</div>

		<?php ft_printfooter(); ?>

	</div>
</body>
</html>
