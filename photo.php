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
			
			<div class="eight columns">
				<video id="player" class="twelve columns" autoplay></video>
				<canvas id="canvas" class="twelve columns"></canvas>
			</div>
			<div class="three columns">
				<img src="stickers/grumpy.png" class="twelve columns stickers" id="grumpy">
				<img src="stickers/loops.png" class="twelve columns stickers" id="loops">
				<img src="stickers/polite.png" class="twelve columns stickers" id="polite">
				<img src="stickers/surprise.png" class="twelve columns stickers" id="surprise">
				<button id="capture">Capture</button>
			</div>
			
		</div>

		<?php ft_printfooter(); ?>

	</div>
</body>
<script>

	var sticker = null;

	const player = document.getElementById('player');
	const canvas = document.getElementById('canvas');
	const context = canvas.getContext('2d');
	const captureButton = document.getElementById('capture');
	const stickers = document.getElementsByClassName('stickers');

	const constraints = {
		video: true,
	};

	captureButton.addEventListener('click', () => {
		if (sticker) {
			canvas.width = player.style.width;
			canvas.height = player.scrollHeight;
			console.log(player.scrollHeight);
			context.drawImage(player, 0, 0, canvas.width, canvas.height);
		}
		// Stop all video streams.
		//player.srcObject.getVideoTracks().forEach(track => track.stop());
	});

	var myFunction = function() {
		var attribute = this.getAttribute("id");
		sticker = attribute;
	};

	for (var i = 0; i < stickers.length; i++) {
		stickers[i].addEventListener('click', myFunction, false);
	}

	navigator.mediaDevices.getUserMedia(constraints)
		.then((stream) => {
		player.srcObject = stream;
    }); 

</script>
</html>
