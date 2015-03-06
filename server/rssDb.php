<?php
  include 'db.php';

  class RssDb extends Db {
    private $select = "SELECT * FROM rssFeeds;";
    private $deleteAll = "DELETE FROM rssFeeds;";

    function Select(){
      return $this->Query($this->select);
    }

    function SelectID($id){
      return $this->Query("SELECT * FROM rssFeeds WHERE ID = ".$id.";");
    }

    function Delete(){
      return $this->Query($this->deleteAll);
    }

    function Insert($arr){
      $insert = 'INSERT INTO rssFeeds (rssUrl,name,desc,link) VALUES (\''
        .$arr["url"].'\',\''
        .$arr["name"].'\',\''
        .$arr["desc"].'\',\''
        .$arr["link"].'\');';
      return $this->Exec($insert);
    }
  }
?>