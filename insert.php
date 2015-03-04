<?php
	ini_set('display_errors', 'On');
	include 'db.php';

	$db = new Db();
	$insert = 'INSERT INTO rssFeeds (rssUrl,name,desc,link) VALUES (\'http://slashdot.org/rss/slashdot.rss\',\'Slashdot\',\'News for nerds, stuff that matters\',\'http://slashdot.org/\');';
	echo $db->Exec($insert);
?>	