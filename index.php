<?php

	require_once("functions.php");
	session_start();

	$sql = "SELECT * FROM images ORDER BY votes DESC LIMIT 3";
	$entries = ft_run_sql($sql);

	$image =	"<div class='container' style='margin-top: 10px; margin-bottom: 10px;'>";
	if (count($entries) > 0)
		$image .= "	<img src='".$entries[0]['filePath']."' class='twelve columns' style='margin-top: 10px;'>";
	if (count($entries) > 1)
		$image .= "	<img src='".$entries[1]['filePath']."' class='twelve columns' style='margin-top: 10px;'>";
	if (count($entries) > 2)
		$image .= "	<img src='".$entries[2]['filePath']."' class='twelve columns' style='margin-top: 10px;'>";
	$image .= "</div>";
				

?>

<html lang="en">

<?php ft_printhead("Camagru"); ?>

<body>
	<div id="mainContent">

		<?php ft_printheader(); ?><div class="twelve columns">

			<div class="container">
				<h5>Upload your pictures and get the most points!</h5>
				<h3>Top Images:</h3>
				<?php
					print($image);
				?>
			</div>

		</div><?php ft_printfooter(); ?>

	</div>
</body>
</html>