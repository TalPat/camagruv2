<?php

	session_start();
	require_once("functions.php");

	$id = $_POST['userid'];
	$imageid = $_POST['imageid'];

	if ($id != "" && $imageid != "") {
		$entry = ft_run_sql("SELECT * FROM images WHERE id='$imageid'");
		$newVotes = $entry[0]['votes'] + 1;
		$newVoters = $entry[0]['voters'];
		$newVotersArr = unserialize($newVoters);
		$newVotersArr[] = $id;
		$newVoters = serialize($newVotersArr);
		ft_run_sql_noreturn("UPDATE images SET votes='$newVotes', voters='$newVoters' WHERE id='$imageid'");
		/** */echo $newVoters."--------";
		echo $id."--------";
		echo $imageid."--------";
		foreach ($newVotersArr as $m) echo $m."x";
	}
	else {
		header("location: index.php");
	}

?>
