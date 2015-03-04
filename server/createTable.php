<?php
	ini_set('display_errors', 'On');

	include 'db.php';
	$db = new Db();
	$create = 'CREATE TABLE rssFeeds (ID INTEGER PRIMARY KEY, rssUrl STRING, name STRING, desc STRING, link STRING)';
	echo $db->exec($create);
?>	