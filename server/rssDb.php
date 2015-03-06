<?php
  include 'db.php';

  class RssDb extends Db {
    private $select = "SELECT * FROM rssFeeds;";
    private $deleteAll = "DELETE FROM rssFeeds;";

    function Select(){
      return $db->Query($select);
    }

    function Delete(){
      return $db->Query($deleteAll);
    }

    function Insert($arr){
      $insert = 'INSERT INTO rssFeeds (rssUrl,name,desc,link) VALUES (\''
        .$arr["url"].'\',\''
        .$arr["name"].'\',\''
        .$arr["desc"].'\',\''
        .$arr["link"].'\');';
      return $insert;// $db->Exec($insert);
    }
  }
?>