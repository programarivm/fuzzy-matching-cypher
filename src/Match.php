<?php

namespace FuzzyMatching;

use FuzzyMatching\Multibyte;
use FuzzyMatching\Alphabet\FuzzyAlphabet;
use FuzzyMatching\Exception\MatchException;

class Match
{
	const MAX_STRING_LENGTH = 64;

	private $fuzzyAlphabet;

	public function __construct(FuzzyAlphabet $fuzzyAlphabet)
	{
		$this->fuzzyAlphabet = $fuzzyAlphabet;
	}

	public function similarity($str1, $str2)
	{
		if (mb_strlen($str1) > self::MAX_STRING_LENGTH) {
			throw new MatchException(self::MAX_STRING_LENGTH);
		} elseif (mb_strlen($str2) > self::MAX_STRING_LENGTH) {
			throw new MatchException(self::MAX_STRING_LENGTH);
		}

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
