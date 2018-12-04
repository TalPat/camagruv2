<?php
	function merge($sticker, $image) {
		$png = imagecreatefrompng($sticker);
		$jpeg = imagecreatefromjpeg($image);

		// imagealphablending($src, false);
		// imagesavealpha($src, true);

		// imagecopymerge($dest, $src, 10, 10, 0, 0, 100, 47, 75);

		// imagejpeg($dest, $image);

		// imagedestroy($dest);
		// imagedestroy($src);

		list($width, $height) = getimagesize($image);
		list($newwidth, $newheight) = getimagesize($sticker);
		$out = imagecreatetruecolor($width, $height);
		imagecopyresampled($out, $jpeg, 0, 0, 0, 0, $width, $height, $width, $height);
		imagecopyresampled($out, $png, $width - $height/2, $height/2, 0, 0, $height/2, $height/2, $newheight, $newwidth);
		imagejpeg($out, $image, 100);
	}
?>