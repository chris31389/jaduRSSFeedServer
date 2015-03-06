<?php

  class RssSummary{
    private $url = "";
    public $info = array(
      "url" => "http://slashdot.org/rss/slashdot.rss",
      "name" => "Slashdot",
      "desc" => "News for nerds, stuff that matters",
      "link" => "http://slashdot.org/"
    );

    function RssSummary($url){
      $this->url = $url;
    }

    function Validate(){
      return true;
    }
  }

?>