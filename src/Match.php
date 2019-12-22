<?php

namespace FuzzyMatching;

use FuzzyMatching\Alphabet\FuzzyAlphabet;
use UnicodeRanges\Utils\Multibyte;

class Match
{
	private $secret;

	public function __construct($secret)
	{
		$this->secret = $secret;
	}

	public function similarity(string $str1, string $str2)
	{
		// remove the background noise
		$a = $this->extractForeground(Multibyte::strSplit($str1));
		$b = $this->extractForeground(Multibyte::strSplit($str2));

		// calculate matches
		$matches = Multibyte::arrMatches($this->count($a), $this->count($b));

		// calculate similarity
		$averageLength = (count($a) + count($b)) / 2;
		$similarity = $matches / $averageLength;

		return round($similarity, 2);
	}

	private function extractForeground(array $array)
	{
		foreach ($this->secret->background as $keyB => $valB) {
			foreach ($valB as $char) {
				foreach ($array as $keyA => $valA) {
					if ($char == $valA) {
						unset($array[$keyA]);
					}
				}
			}
		}

		return $array;
	}

	private function count(array $array)
	{
		$count = [];
		foreach ($this->secret->foreground as $keyF => $valF) {
			foreach ($valF as $char) {
				foreach ($array as $keyA => $valA) {
					if ($char == $valA) {
						!isset($count[$keyF]) ? $count[$keyF] = 1 : $count[$keyF] += 1;
					}
				}
			}
		}

		return $count;
	}
}
