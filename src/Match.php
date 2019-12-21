<?php

namespace FuzzyMatching;

use FuzzyMatching\Multibyte;
use FuzzyMatching\Alphabet\FuzzyAlphabet;

class Match
{
	private $fuzzyAlphabet;

	public function __construct(FuzzyAlphabet $fuzzyAlphabet)
	{
		$this->fuzzyAlphabet = $fuzzyAlphabet;
	}

	public function similarity($str1, $str2)
	{
		// remove the background alphabet letters
		$letters = implode('', $this->fuzzyAlphabet->getBackground()->letters());
		$str1 = preg_replace("/[$letters]/u", '', $str1);
		$str2 = preg_replace("/[$letters]/u", '', $str2);

		// calculate matches
		$matches = Multibyte::strMatches($str1, $str2);

		// calculate similarity
		$averageLength = (mb_strlen($str1) + mb_strlen($str2)) / 2;
		$similarity = $matches / $averageLength;

		return round($similarity, 2);
	}
}
