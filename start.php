<?php

$startTime = microtime(TRUE);
require 'Article.php';
require 'CommonWordsCounter.php';

$counter = new CommonWordsCounter('words.txt') ;
$articles = glob("articles/*.txt");

foreach($articles as $articlePath) {
	$article = new Article($articlePath);
	echo "\n" . 'file ' . $articlePath . ' has ' . $counter->numberOfCommonWords($article) . ' common words';
}

$endTime = microtime(TRUE);
echo "\n\n" . 'time: ' . ($endTime - $startTime) . 's';

?>
