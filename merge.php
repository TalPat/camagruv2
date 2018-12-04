<?php
	$image = $_POST['imagepath'];
	$sticker = $_POST['stickerpath'];


	$dest = imagecreatefrompng($sticker);
	$src = imagecreatefromjpg($image);

	imagealphablending($dest, false);
	imagesavealpha($dest, true);

	imagecopymerge($dest, $src, 10, 10, 0, 0, 100, 47, 75);

	header('Content-Type: image/jpg');
	imagejpg($dest);

	imagedestroy($dest);
	imagedestroy($src);
?>