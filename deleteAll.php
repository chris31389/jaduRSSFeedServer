<?php
	ini_set('display_errors', 'On');

	include 'db.php';
	$db = new Db();
	echo $db->Exec('DELETE FROM rssFeeds;');
?>	