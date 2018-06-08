<?php

namespace FuzzyMatching\Alphabet;

use UnicodeRanges\Randomizer;
use UnicodeRanges\Range\AlchemicalSymbols;
use UnicodeRanges\Range\Ethiopic;
use UnicodeRanges\Range\GreekAndCoptic;
use UnicodeRanges\Range\HangulJamo;
use UnicodeRanges\Range\Hanunoo;
use UnicodeRanges\Range\Hiragana;
use UnicodeRanges\Range\Ugaritic;

class Mimicked
{
	private $alphabet;

	private $unicodeRanges;

	private $letterFreq = [];

	public function __construct($alphabet) {
		$this->alphabet = $alphabet;
		$this->unicodeRanges = [
			new AlchemicalSymbols,
			new Ethiopic,
			new GreekAndCoptic,
			new HangulJamo,
			new Hanunoo,
			new Hiragana,
			new Ugaritic,
		];
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
