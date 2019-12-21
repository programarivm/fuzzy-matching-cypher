<?php

namespace FuzzyMatching;

use FuzzyMatching\Alphabet\FuzzyAlphabet;
use FuzzyMatching\Exception\CypherException;
use FuzzyMatching\Exception\MimickedAlphabetException;
use UnicodeRanges\Randomizer;

class Crypt
{
	private $fuzzyAlphabet;

	public function __construct(FuzzyAlphabet $fuzzyAlphabet)
	{
		$this->fuzzyAlphabet = $fuzzyAlphabet;
	}

	public function encrypt(string $str)
	{
		if (mb_strlen($str) > Cypher::MAX_LENGTH_PLAINTEXT) {
			throw new CypherException();
		}

		$cipher = '';
		$chars = str_split($str);
		foreach ($chars as $char) {
			$cipher .= $this->fuzzyAlphabet->getForeground()->getLetterFreq()[$char]['char'];
		}

		$array = Multibyte::strSplit($cipher.$this->fillBackground($cipher));
		shuffle($array);

		return implode('', $array);
	}

	private function fillBackground(string $cipher)
	{
		$background = '';
		$nChars = Cypher::LENGTH_TOTAL - mb_strlen($cipher);
		for ($i = 1; $i <= $nChars; $i++) {
			$background .= $this->fuzzyAlphabet->getBackground()->randLetter();
		}

		return $background;
	}
}
