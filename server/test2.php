<?php

  function getItemInfo($xmlElement){
    $childs = $xmlElement->childNodes;
    foreach($childs as $i) {
      switch($i->nodeName){
        case "description":
          $desc = $i->nodeValue;
          break;
        case "title":
          $title = $i->nodeValue;
          break;
        case "link":
          $link = $i->nodeValue;
          break;
      }
    }

    return array(
      "title" => $title,
      "desc" => $desc,
      "link" => $link
    );
  }

  $xml = "http://news.google.com/news?ned=us&topic=h&output=rss";
  $xml = "http://newsrss.bbc.co.uk/rss/newsonline_uk_edition/front_page/rss.xml";
  $xmlDoc = new DOMDocument();
  $xmlDoc->load($xml);
  $channel=$xmlDoc->getElementsByTagName('channel')->item(0);

  $info = getItemInfo($channel);

  echo "title=> " .$info['title'] . "<br />";
  echo "link=> " .$info['link'] . "<br />";
  echo "desc=> " .$info['desc'] . "<br />";

  $items=$xmlDoc->getElementsByTagName('item');
  foreach($items as $item){
    $i = getItemInfo($item);
    echo "title=> " .$i['title'] . "<br />";
    echo "link=> " .$i['link'] . "<br />";
    echo "desc=> " .$i['desc'] . "<br />";
  }
?>