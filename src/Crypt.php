<?php

namespace FuzzyMatching;

use FuzzyMatching\Match;
use FuzzyMatching\Alphabet\FuzzyAlphabet;
use FuzzyMatching\Exception\CryptException;

class Crypt
{
	const MAX_STRING_LENGTH = 32;

	private $fuzzyAlphabet;

	public function __construct(FuzzyAlphabet $fuzzyAlphabet)
	{
		$this->fuzzyAlphabet = $fuzzyAlphabet;
	}

	public function encrypt(string $str)
	{
		if (mb_strlen($str) > self::MAX_STRING_LENGTH) {
			throw new CryptException(self::MAX_STRING_LENGTH);
		}

		$cipher = '';
		$chars = str_split($str);
		foreach ($chars as $char) {
			$cipher .= $this->fuzzyAlphabet->getForeground()->getLetterFreq()[$char]['char'];
		}

		return $cipher . $this->fillBackground($cipher);
	}

	private function fillBackground(string $cipher)
	{
		$background = '';
		$nChars = Match::MAX_STRING_LENGTH - mb_strlen($cipher);
		for ($i = 1; $i <= $nChars; $i++) {
			$background .= $this->fuzzyAlphabet->getBackground()->randLetter();
		}

		return $background;
	}
}
