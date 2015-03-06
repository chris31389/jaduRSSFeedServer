<?php

  class RssSummary{
    private $url = "";
    public $errorMessage = "unknown";
    public $info = array(
      "url" => "http://slashdot.org/rss/slashdot.rss",
      "name" => "Slashdot",
      "desc" => "News for nerds, stuff that matters",
      "link" => "http://slashdot.org/"
    );

    private function ParseStatusType($line){
      return substr($line,9,1);
    }

    private function CheckStatusCode($line){
      $type = $this->ParseStatusType($line);
      $valid = false;
      switch($type){
        case "1": 
          $valid = true;
          break;
        case "2": 
          $valid = true;
          break;
        case "3": 
          $valid = true;
          break;
        default:
          $valid = false;
      }
      return $valid;
    }


    function RssSummary($url){
      $this->url = $url;
    }

    function Validate(){
      $headers = get_headers($this->url);
      $responseStatus = $headers[0];  // HTTP\/1.1 301 Moved Permanently
      
      $valid = $this->CheckStatusCode($responseStatus);
      
      if($valid == true){
        $valid = false;
        $this->errorMessage = $headers; // "none";
      };

      return $valid;
    }

    function GetError(){
      return json_encode(array('error'=>$this->errorMessage));
    }
  }

?>