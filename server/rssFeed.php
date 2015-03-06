<?php
  ini_set('display_errors', 'On');
  include 'db.php';
  $output = "";
  $db = new Db();

  $reqMethod = $_SERVER['REQUEST_METHOD'];

  switch($reqMethod){
    case "GET":
      $query = "SELECT * FROM rssFeeds;";
      $output = $db->Query($query);
      break;

    case "POST":
      $insert = 'INSERT INTO rssFeeds (rssUrl,name,desc,link) VALUES (\'http://slashdot.org/rss/slashdot.rss\',\'Slashdot\',\'News for nerds, stuff that matters\',\'http://slashdot.org/\');';
      $output = $db->Exec($insert);
      break;
    
    default:
      $query = "SELECT * FROM rssFeeds;";
      $output = $db->Query($query);
  }

  echo $output;
?>