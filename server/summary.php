<?php
  include 'db.php';
  $db = new Db();
  $query = "SELECT * FROM rssFeeds;";

  echo $db->Query($query);
?>