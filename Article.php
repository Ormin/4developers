<?php

class Article {

	private $path;

	private $content;

	private $initialized;

	public function __construct($path) {
		$this->path = $path;
	}

	public function getWords() {
		if(!$this->initialized) {
			$this->initialize();
		}

                $normalized = preg_replace("/[^A-Za-z0-9 ]/", '', $this->content);
                return explode(" ",$normalized);
	
	}

	private function initialize() {
		$this->content = file_get_contents($this->path);
	}


}
