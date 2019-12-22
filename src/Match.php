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

	public function similarity(string $str1, string $str2)
	{
		// remove the background alphabet
		$letters = implode('', $this->fuzzyAlphabet->getBackground()->letters());
		$str1 = preg_replace("/[$letters]/u", '', $str1);
		$str2 = preg_replace("/[$letters]/u", '', $str2);

		// decode the strings
		$str1Decoded = $this->fuzzyAlphabet->getForeground()->decode($str1);
		$str2Decoded = $this->fuzzyAlphabet->getForeground()->decode($str2);

		// calculate matches
		$matches = Multibyte::strMatches($str1Decoded, $str2Decoded);

		// calculate similarity
		$averageLength = (mb_strlen($str1Decoded) + mb_strlen($str2Decoded)) / 2;
		$similarity = $matches / $averageLength;

		return round($similarity, 2);
	}
}
