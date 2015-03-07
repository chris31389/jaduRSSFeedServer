<?php
  // SQL INJECTION CAUTION!!! - option: change to NoSQL DB.
  // FIX = NO VARIABLES ARE PASSED THAT HAVEN'T BEEN GENERATED. E.G. NO DIRECT LINK FROM USER VARIABLE TO SQL QUERY.

  ini_set('display_errors', 'On');
  include 'rssDb.php';
  $output;
  $db = new RssDb("test.db");

  // Sumamry information on RSS Feed.
  class RssFeed{
    private $url = "";
    public $errorMessage = "unknown";
    public $valid = false;
    public $info = array();

    public function __construct(){

    }

    public static function withURL($url){
      $instance = new self();
      $instance->RssFeedByUrl($url);
      return $instance;
    }

    public static function withJsonArray($jsonArr){
      $instance = new self();
      $instance->RssFeedByJsonArray($jsonArr);
      return $instance;
    }

    private function RssFeedByJsonArray($jsonArr){
      $arr = json_decode($jsonArr,true);
      $this->url = $arr[0]['rssUrl'];
      $this->errorMessage = "none";
      $valid = true;
      $this->info = $this->newArray($arr[0]['rssUrl'],$arr[0]['name'],$arr[0]['desc'],$arr[0]['link']);
    }

    private function newArray($url, $title, $desc, $link){
      return array(
          "rssUrl" => $url,
          "name" => $title,
          "desc" => $desc,
          "link" => $link
        );
    }

    // This is designed to read the RSS Reed Channel Header.
    private function RssFeedByUrl($url){
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

          $this->info = $this->newArray($url, $title, $desc, $link);
        };
      }
    }

    public function getFeed(){
      $arr = array();

      // GET ALL THE FEED INFORMATION AND POPULATE INTO ARRAY.
      $arr[] = $this->info;
      

      return json_encode($arr);
    }

    function GetError(){
      return json_encode(array('error'=>$this->errorMessage));
    }
  }

  $reqMethod = $_SERVER['REQUEST_METHOD'];
  switch($reqMethod){
    case "GET":

      // PREVENTING SQL INJECTION BY MAKING SURE id IS INTEGER
      if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
        $output = $db->Select();
      }else{
        $info = $db->SelectID($_GET['id']);
        $rss = RssFeed::withJsonArray($info);
        $output = $rss->getFeed();
      }

      break;

    case "POST":
      $request_body =file_get_contents("php://input");
      $payload = json_decode($request_body);
      $url = urldecode($payload->url);
      $feed = RssFeed::withURL($url);
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