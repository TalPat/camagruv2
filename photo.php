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
			<h2>Take a Pic</h2>
			
		</div>

		<?php ft_printfooter(); ?>

	</div>
</body>
<script>
	
</script>
</html>
