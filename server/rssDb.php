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
      return $this->Exec($this->deleteAll);
    }

    function DeleteID($id){
      return $this->Exec("DELETE FROM rssFeeds WHERE ID = ".$id.";");
    }

    function Insert($arr){
      $insert = 'INSERT INTO rssFeeds (rssUrl,name,desc,link) VALUES (\''
        .$arr["rssUrl"].'\',\''
        .$arr["name"].'\',\''
        .$arr["desc"].'\',\''
        .$arr["link"].'\');';
      return $this->Exec($insert);
    }
  }
?>