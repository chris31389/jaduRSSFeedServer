<?php
  // SQL INJECTION CAUTION!!! - option: change to NoSQL DB.
  // FIX = NO VARIABLES ARE PASSED THAT HAVEN'T BEEN GENERATED. E.G. NO DIRECT LINK FROM USER VARIABLE TO SQL QUERY.

  ini_set('display_errors', 'On');
  include 'rssDb.php';
  include 'getRssSummary.php';
  $output = "";
  $db = new RssDb("test.db");

  $reqMethod = $_SERVER['REQUEST_METHOD'];
  switch($reqMethod){
    case "GET":
      $output = $db->Select();
      break;

    case "POST":
      $request_body =file_get_contents("php://input");
      $payload = json_decode($request_body);
      $url = urldecode($payload->url);
      $summary = new RssSummary($url);
      if($summary->Validate()){
        $output = $db->Insert($summary->info);
      }
      else{
        $output = $summary->GetError();
      }
      break;

    case "DELETE":
      $output = $db->Delete();
    
    default:
      $output = $db->Select();
  }
  echo $output;
?>