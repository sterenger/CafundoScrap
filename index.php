<meta charset="utf-8">
<?php
require __DIR__ . "/vendor/autoload.php";

use Goutte\Client;

$url = "http://www.sciencenews.org/topic/life-evolution";
$client = new Client();
$crawler = $client->request('GET',$url);
$crawler->filter('li.subtopic-listing-3-items')->each(function ($node, $index) {
$imgSrc = $node->filter("img")->attr('data-echo');
$category = $node->filter("span.field-content")->text();
$title = $node->filter("div.views-field-title > span.field-content")->text();
  echo "<img src='$imgSrc' /><br>";
  echo "Category : " . $category."<br>";
  echo "Title : " . $title."<br>";
});
