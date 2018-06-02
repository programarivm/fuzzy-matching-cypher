<?php

namespace FuzzyMatching;

use FuzzyMatching\Language;
use FuzzyMatching\LetterFrequency;

class Alphabet
{
	private $lang;

	private $alphabet = [];

	public function __construct(string $lang) {
		$this->lang = $lang;
	}

	public function get() {
		$letterFreq = (new LetterFrequency(Language::EN))->get();

		foreach ($letterFreq as $key => $val) {
			$this->alphabet[$key] = [
				'char' => 'todo', // TODO random unicode character
				'freq' => $val
			];
		}

		return $this->alphabet;
	}
}
