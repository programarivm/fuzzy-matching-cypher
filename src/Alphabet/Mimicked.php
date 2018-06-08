<?php

namespace FuzzyMatching\Alphabet;

use FuzzyMatching\Alphabet\AlphabetAbstract;
use UnicodeRanges\Randomizer;

class Mimicked
{
	private $alphabet;

	private $unicodeRanges;

	private $letterFreq = [];

	public function __construct(AlphabetAbstract $alphabet, array $unicodeRanges) {
		$this->alphabet = $alphabet;
		$this->unicodeRanges = $unicodeRanges;
	}

	public function letterFreq() {
		$letterFreq = $this->alphabet->letterFreq();
		foreach ($letterFreq as $key => $val) {
			$this->letterFreq[$key] = [
				'char' => Randomizer::printableChar($this->unicodeRanges),
				'freq' => $val
			];
		}

		return $this->letterFreq;
	}
}
