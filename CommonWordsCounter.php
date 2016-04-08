<?php

class CommonWordsCounter 
{
	private $words = [];

	public function __construct($fileName) 
	{
		$this->loadFile($fileName);
		$this->removeDuplicates();
	}	

	public function numberOfCommonWords($message) 
	{
		$count = 0;
		foreach($this->words as $word) {			
			if(preg_match('|' . $word . '|', $message)) {
				$count++;							
			}
		}
		return $count > 10 ? '10+' : $count;
	}

	protected function loadFile($fileName)
	{
		$handle = fopen($fileName, "r");
		if ($handle) {
		    while (($line = fgets($handle)) !== false) {		    	
		    	$this->words[] = $line;			        
		    }

		    fclose($handle);
		} else {
		    die('file ' . $fileName . ' do not exists');
		} 
	}

	protected function removeDuplicates()
	{
		$this->words;
		$properWords = $wordsWithoutDuplicates = [];
		foreach($this->words as $word) {
			if (!in_array($word, $wordsWithoutDuplicates)) {
				$properWords[] = $word;
			}
		}
		$this->words = $properWords;
	}
}