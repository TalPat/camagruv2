<?php
    require_once('merge.php');
	require_once("functions.php");

    $rawData = $_POST['image'];
    $sticker = $_POST['sticker'];
    $userid = $_POST['userid'];

    echo "test";
    $target_dir = "uploads/".$userid."/";
    echo "uploads/".$userid."/";
	if (!file_exists($target_dir)) {
		mkdir($target_dir, 0777, true);
	}
    echo "test1";
    $file = time().'.jpg';
    $filename = $target_dir.$filename.$file;
    echo "test2";
    $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $rawData));
    echo "test3";
    file_put_contents($filename, $data);
    echo "test4";

    merge('stickers/'.$sticker.'.png', $filename);

    $sql = "INSERT INTO images (imagename, filePath, sticker, merged, userid, votes, voters) VALUES ('$file', '$filename', '$sticker', '1', '$userid', '0', '');";
	ft_run_sql_noreturn($sql);

?>