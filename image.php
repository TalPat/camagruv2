<?php

	require_once("functions.php");
	session_start();

	if($_SERVER['REQUEST_METHOD'] == "GET")
		$imageid = $_GET['imageid'];
	else
		header("location: index.php");

	$sql = "SELECT * FROM comments WHERE imageid = '$imageid'";
	$commentEntries = ft_run_sql($sql);

	$sql = "SELECT * FROM images WHERE id = '$imageid'";
	$imageEntries = ft_run_sql($sql);

	$image =	"<div class='container' style='margin-top: 10px; margin-bottom: 10px; border: 1px solid black;'>".
				"	<img src='".$imageEntries[0]['filePath']."' class='twelve columns'>".
				"</div>";

	$comments = "<div class='container'><p>No one has commented on this picture yet, be the first!</p>";
	if (count($commentEntries) > 0) {
		foreach ($commentEntries as $entry) {
			$sql = "SELECT * FROM users WHERE id = '".$entry['authorid']."'";
			$author = ft_run_sql($sql)[0];
			$comments .= "<p>".$author['username'].": ".$entry['comment']."</p>";
		}
	}
	$comments .= "</div>";

?>

<html lang="en">

<?php ft_printhead("Camagru"); ?>

<body>
	<div id="mainContent">

		<?php ft_printheader(); ?><div class="twelve columns">

		<div class="container">
			<h2>Camagru</h2>
			<?php
				print($image);
				print($comments);
			?>
		</div>

		</div><?php ft_printfooter(); ?>

	</div>
</body>
</html>