<?php
$feed_url = "http://www.php.net/news.rss";
$feed_url = "http://slashdot.org/rss/slashdot.rss";
$content = file_get_contents($feed_url);
$x = new SimpleXmlElement($content);
echo "<ul>";
 
foreach($x->channel->item as $entry) {
    echo "<li><a href='$entry->link' title='$entry->title'>" . $entry->title . "</a></li>";
}
echo "</ul>";

/*
$bbc = "http://newsrss.bbc.co.uk/rss/newsonline_uk_edition/front_page/rss.xml";
$url = "http://slashdot.org/rss/slashdot.rss";
$rss = simplexml_load_file($bbc);
// print_r($rss);
foreach($rss->channel->item as $item){
	echo "<p>" . (string)$item->title . "</p>";
}

*/


/*
class RSSElement {
	public $link, $title, $media, $thumb, $url, $width, $height;
}

class RSSFeed {
	public $feed;
	
	function RSSFeed($feed){
		$this->feed = $feed;
	}
	
	function parse(){
		// requires PHP5+
		$rss = simplexml_load_file($this->feed);

		echo "hi";

		return $rss;
		$items = array();
		
		foreach($rss->channel->item as $item){
			$link = (string) $item->link;
			$title = (string) $item->title;

			$items[] = $item;
		}
		
		return $items;
	}
}

$F = new RSSFeed($url);
echo $F->parse();
*/
?>