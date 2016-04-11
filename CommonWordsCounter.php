<?php

class CommonWordsCounter 
{
	/**
	 * Index of words.
	 * Key - strtolower word optimized to an internal php hashcode
	 */
	private $words = [];

	public function __construct($fileName) 
	{
		$this->loadFile($fileName);
	}	

	public function numberOfCommonWords(Article $article) 
	{
		$count = 0;
		$words = $article->getWords();
		$wordsFound = [];
		foreach($words as $word) {

			if(isset($this->words[$word]) && !isset($wordsFound[$word])) {
				$count++;
				$wordsFound[$word] = true;
			}
		}
		return $count;
	}

	protected function loadFile($fileName)
	{
		$handle = fopen($fileName, "r");
		if ($handle) {
		    while (($line = fgets($handle)) !== false) {		    	
		    	$this->words[trim($line)] = true;			        
		    }

		    fclose($handle);
		} else {
		    die('file ' . $fileName . ' do not exists');
		} 
	}

}
