<?php
	ini_set('display_errors', 'On');

	include 'db.php';
	$db = new Db();
	$query = "SELECT * FROM rssFeeds;";

	echo $db->Query($query);
?>