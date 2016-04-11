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

	public function numberOfCommonWords($articlePath) 
	{
		$count = 0;
		$data = file_get_contents($articlePath);
		$normalized = preg_replace("/[^A-Za-z0-9 ]/", '', $data);
		$words = explode(" ",$normalized);
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
