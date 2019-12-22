<?php

namespace FuzzyMatching;

use FuzzyMatching\Multibyte;
use FuzzyMatching\Alphabet\FuzzyAlphabet;

class Match
{
	private $crypt;

	public function __construct(Crypt $crypt)
	{
		$this->crypt = $crypt;
	}

	public function similarity(string $str1, string $str2)
	{
		// remove the background alphabet
		$str1 = implode('', $this->crypt->getFuzzyAlphabet()->foreground(Multibyte::strSplit($str1)));
		$str2 = implode('', $this->crypt->getFuzzyAlphabet()->foreground(Multibyte::strSplit($str2)));

		// decrypt the strings
		// TODO remove decryption
		$stats = $this->crypt->getFuzzyAlphabet()->getForeground()->getStats();
		$str1Decoded = $this->crypt->decrypt($str1, $stats);
		$str2Decoded = $this->crypt->decrypt($str2, $stats);

		// calculate matches
		$matches = Multibyte::strMatches($str1Decoded, $str2Decoded);

		// calculate similarity
		$averageLength = (mb_strlen($str1Decoded) + mb_strlen($str2Decoded)) / 2;
		$similarity = $matches / $averageLength;

		return round($similarity, 2);
	}
}
