<?php
$startTime = microtime(TRUE);
require 'CommonWordsCounter.php';

$counter = new CommonWordsCounter('words.txt') ;
$articles = glob("articles/*.txt");

foreach($articles as $articlePath) {
	echo "\n" . 'file ' . $articlePath . ' has ' . $counter->numberOfCommonWords($articlePath) . ' common words';
}

$endTime = microtime(TRUE);
echo "\n\n" . 'time: ' . ($endTime - $startTime) . 's';

?>