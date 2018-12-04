<?php

	require_once("functions.php");
	session_start();

	$sql = "SELECT * FROM images ORDER BY votes DESC LIMIT 1";
	$entries = ft_run_sql($sql);

	$image =	"<div class='container' style='margin-top: 10px; margin-bottom: 10px; border: 1px solid black;'>".
				"	<img src='".$entries[0]['filePath']."' class='twelve columns'>".
				"</div>";

?>

<html lang="en">

<?php ft_printhead("Camagru"); ?>

<body>
	<div id="mainContent">

		<?php ft_printheader(); ?><div class="twelve columns">

			<div class="container">
				<h5>Upload your pictures and get the most points!</h5>
				<h3>Top Image:</h3>
				<?php
					print($image);
				?>
			</div>

		</div><?php ft_printfooter(); ?>

	</div>
</body>
</html>