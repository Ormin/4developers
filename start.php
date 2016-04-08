<?php
$startTime = microtime(TRUE);
require 'CommonWordsCounter.php';

$counter = new CommonWordsCounter('words.txt');
$articles = glob("articles/*.txt");

foreach($articles as $articleName) {
	
	$article = file_get_contents($articleName);
	echo "\n" . 'file ' . $articleName . ' has ' . $counter->numberOfCommonWords($article) . ' common words';
}

$endTime = microtime(TRUE);
echo "\n\n" . 'time: ' . ($endTime - $startTime) . 's';

?>