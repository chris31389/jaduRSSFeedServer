<?php
  // SQL INJECTION CAUTION!!! - option: change to NoSQL DB.
  // FIX = NO VARIABLES ARE PASSED THAT HAVEN'T BEEN GENERATED. E.G. NO DIRECT LINK FROM USER VARIABLE TO SQL QUERY.

  ini_set('display_errors', 'On');
  include 'rssDb.php';
  $output;
  $db = new RssDb("test.db");

  class RssFeed{
    private $url = "";
    public $errorMessage = "unknown";
    public $valid = false;
    public $info = array();

    function RssFeed($url){
      $this->url = $url;
      $headers = @get_headers($url);
      if($headers !== false){
        foreach($headers as $att){
          if(strpos($att,"Content-Type:") !== FALSE && strpos($att,"xml") !== FALSE){
            $this->valid = true;
          }
        }

        if($this->valid == true){
          $this->errorMessage = "none";
          $xml = new DOMDocument();
          $xml->load($url);
          $channel = $xml->getElementsByTagName('channel')->item(0);
          $title = $channel->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
          $link = $channel->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
          $desc = $channel->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;

          $this->info = array(
            "url" => $url,
            "name" => $title,
            "desc" => $desc,
            "link" => $link
          );
        };
      }
    }

    function GetError(){
      return json_encode(array('error'=>$this->errorMessage));
    }
  }

  $reqMethod = $_SERVER['REQUEST_METHOD'];
  switch($reqMethod){
    case "GET":
      $output = $db->Select();
      break;

    case "POST":
      $request_body =file_get_contents("php://input");
      $payload = json_decode($request_body);
      $url = urldecode($payload->url);
      $feed = new RssFeed($url);
      if($feed->valid){
        $output = $db->Insert($feed->info);
      }
      else{
        $output = $feed->GetError();
      }
      break;

    case "DELETE":
      $output = $db->Delete();
    
    default:
      $output = $db->Select();
  }

  echo $output;
?>