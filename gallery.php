<?php

	require_once("functions.php");
	session_start();

	if($_SERVER['REQUEST_METHOD'] == "GET")
		$page = $_GET['page'];
	else
		$page = 1;
	if (is_nan($page) || $page < 1)
		$page = 1;
	$start = ($page - 1) * 10;

	$sql = "SELECT * FROM images LIMIT $start, 10";
	$entries = ft_run_sql($sql);

	$allEntries = ft_run_sql("SELECT * FROM images");

	$pics = "<div style='display: inline-block'>";
	$nav = "<div id='pagenav' style='text-align: center'>";
	$counter = 0;

	foreach ($entries as $entry) {
		if ($counter % 2 == 0)
			$pics .= "<div  style='display: inline-block'>";

		$pics .=	"<div class='piccontainer one-half column' style='border: 1px solid black; margin-bottom: 5px;'>".
					"	<a href='image.php?imageid=".$entry['id']."'><img src='".$entry['filePath']."' style='width: 100%;'></a>".
					"	Points: ".$entry['votes'].
					"</div>";
		
		if ($counter % 2 != 0)
			$pics .= "</div>";
		
		$counter++;
	}
	
	$pics .= "</div>";

	if ($page != 1) {
		$nav .= "<a href='gallery.php?page=" .($page - 1)."'><<</a>";
	}
	$nav .= " page: ".$page." ";
	if ($page * 10 < count($allEntries)) {
		$nav .= "<a href='gallery.php?page=".($page + 1)."'>>></a>";
	}
	$nav .= "</div>";

?>

<html lang="en">

<?php ft_printhead("Camagru"); ?>

<body>
	<div id="mainContent">

		<?php ft_printheader(); ?>

		<div class="container">
			<h2>Camagru</h2>
			<?php
				print($pics);
				print($nav);
			?>
		</div>

		<?php ft_printfooter(); ?>

	</div>
</body>
</html>