<?php

	session_start();
	require_once("functions.php");
	if (!isset($_SESSION['user']))
		header("location: index.php");

?>

<html lang="en">

<?php ft_printhead("Camagru"); ?>

<body>
	<div id="mainContent">

		<?php ft_printheader(); ?><div class="twelve columns">

		<div class="container primary">
			<h2>Take a Pic</h2>
			
			<div class="eight columns">
				<video id="player" class="twelve columns" autoplay></video>
				<canvas id="canvas" class="twelve columns"></canvas>
			</div>
			<div class="three columns">
				<button id="capture" class="twelve columns">Capture</button>
				<img src="stickers/grumpy.png" class="twelve columns stickers" id="grumpy">
				<img src="stickers/loops.png" class="twelve columns stickers" id="loops">
				<img src="stickers/polite.png" class="twelve columns stickers" id="polite">
				<img src="stickers/surprise.png" class="twelve columns stickers" id="surprise">
			</div>
			<div id="taken">
			</div>
			
		</div>

		</div><?php ft_printfooter(); ?>

	</div>
</body>
<script>

	var sticker = null;

	const player = document.getElementById('player');
	var canvas = document.getElementById('canvas');
	const context = canvas.getContext('2d');
	const captureButton = document.getElementById('capture');
	const stickers = document.getElementsByClassName('stickers');

	const constraints = {
		video: true,
	};

	captureButton.addEventListener('click', () => {
		if (sticker) {
			var img = document.getElementById(sticker);
			var prev = document.getElementById("taken");

			canvas.width = player.clientWidth;
			canvas.height = player.clientHeight;

			var xval = canvas.height / 2;

			context.drawImage(player, 0, 0, canvas.width, canvas.height);
			var dataUrl = canvas.toDataURL("image/jpeg");
			context.drawImage(img,canvas.width - xval,canvas.height - xval, xval, xval);
			saveImage(dataUrl);

			dataUrl = canvas.toDataURL("image/jpeg");
			var cont = prev.innerHTML;
			prev.innerHTML = "<img src='" + dataUrl + "' style='width: 27%; margin: 3%'>" + cont;
		}
		// Stop all video streams.
		//player.srcObject.getVideoTracks().forEach(track => track.stop());
	});

	var myFunction = function() {
		for (var i = 0; i < stickers.length; i++) {
			stickers[i].style.border = 'none';
		}
		var attribute = this.getAttribute("id");
		this.style.border = 'black solid 1px';
		sticker = attribute;
	};

	for (var i = 0; i < stickers.length; i++) {
		stickers[i].addEventListener('click', myFunction, false);
	}

	navigator.mediaDevices.getUserMedia(constraints)
		.then((stream) => {
		player.srcObject = stream;
    });

	function saveImage(dataUrl) {
		var xhttp = new XMLHttpRequest();
		canvas = document.getElementById('canvas');
		var baseURIimg = encodeURIComponent(dataUrl);

		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				//display merged photo
			}
		};
		xhttp.open("POST", "saveimage.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("image=" + baseURIimg + "&sticker=" + sticker + "&userid=<?php echo $_SESSION['id']?>");
	}

</script>
</html>
