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

	if (count($commentEntries) > 0) {
		$comments = "<div class='container'>";
		foreach ($commentEntries as $entry) {
			$sql = "SELECT * FROM users WHERE id = '".$entry['authorid']."'";
			$author = ft_run_sql($sql)[0];
			$comments .= "<p>".$author['username'].": ".$entry['comment']."</p>";
		}
	}
	else {
		$comments = "<div class='container'><p>No one has commented on this picture yet, be the first!</p>";
	}
	$comments .= "</div>";
	$commentform = 	'<div class="container " id="comments" >'.
					'<form action="comment.php" method="POST">'.
					'<textarea rows="4" class="twelve columns" name="comment" style="resize: none;"></textarea>'.
					'<input type="hidden" value="'.$imageid.'" name="imageid" />'.
					'<input type="submit" name="okay">'.
					'</form>'.
					'</div>';

?>

<html lang="en">

<?php ft_printhead("Camagru"); ?>

<body>
	<div id="mainContent">

		<?php ft_printheader(); ?><div class="twelve columns">

		<div class="container primary">
			<?php
				print($image);
				print($comments);
				if ($_SESSION['id'] != "" && isset($_SESSION['id']))
					print($commentform);
			?>
			
		</div>

		</div><?php ft_printfooter(); ?>

	</div>
</body>
</html>