<?php
  ini_set('display_errors', 'On');
  // http://sauron/rssToJson.php?url=http%3A%2F%2Fslashdot.org%2Frss%2Fslashdot.rss

  $url = urldecode($_GET['url']);

  // CHECK URL IS AN RSS FEED.  
  // MUST MAKE SURE THAT ITS NOT A FORM OF CODE INJECTION (e.g. download a virus)

  echo $url; 
  echo "<br />";
  $xml = new DOMDocument();
  $xml->load($url);

  //get elements from "<channel>"
  $channel=$xml->getElementsByTagName('channel')->item(0);
  $channel_title = $channel->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
  $channel_link = $channel->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
  $channel_desc = $channel->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;

  $debug = $channel_title;

  echo $channel_title;
  echo "<br />";
  echo $channel_link;
  echo "<br />";
  echo $channel_desc;
  echo "<br />";
  
  echo var_dump(get_object_vars($debug));
  echo "<br />";
  echo var_dump(get_class_methods($debug));
  echo "<br />";

?>