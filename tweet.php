<?php
// http://bavotasan.com/2009/a-better-twitter-feed-for-your-web-site/
$feedURL = "http://api.twitter.com/1/statuses/user_timeline.rss?screen_name=yarhouse";
$doc = new DOMDocument();
$doc->load($feedURL);
$arrFeeds = array();
foreach ($doc->getElementsByTagName('item') as $node) {
    $itemRSS = array ( 
        'title' => $node->getElementsByTagName('title')->item(0)->nodeValue
        );
    array_push($arrFeeds, $itemRSS);
}
$limit = 1;
for($x=0;$x<$limit;$x++) {
    $title = str_replace('yarhouse: ', '', $arrFeeds[$x]['title']);
    // preg_ was ereg_, but that was old, so I had to use preg_ and added ~'s in the pattern for delimiters
    $str = preg_replace("~[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]~","<a href=\"\\0\">\\0</a>", $title); 
    $pattern = '/[#|@][^\s]*/';
    preg_match_all($pattern, $str, $matches);	
 
    foreach($matches[0] as $keyword) {
        $keyword = str_replace(")","",$keyword);
        $link = str_replace("#","%23",$keyword);
        $link = str_replace("@","",$keyword);
        if(strstr($keyword,"@")) {
            $search = "<a href=\"http://twitter.com/$link\">$keyword</a>";
        } else {
            $link = urlencode($link);
            $search = "<a href=\"http://twitter.com/#search?q=$link\" class=\"tweet\">$keyword</a>";
        }
        
        $str = str_replace($keyword, $search, $str);
    }

    echo $str;
}
?>