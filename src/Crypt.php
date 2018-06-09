<?php

namespace FuzzyMatching;

use FuzzyMatching\Matcher;

class Crypt
{
	private $foregroundAlphabet;

	private $backgroundAlphabet;

	public function __construct(Alphabet $foregroundAlphabet, Alphabet $backgroundAlphabet)
	{
		$this->foregroundAlphabet = $foregroundAlphabet;
		$this->backgroundAlphabet = $backgroundAlphabet;
	}

	public function encrypt(string $phrase)
	{
		$cipher = '';
		$chars = str_split($phrase);
		foreach ($chars as $char) {
			$cipher .= $this->foregroundAlphabet->getLetterFreq()[$char]['char'];
		}

		return $cipher . $this->fillBackground($cipher);
	}

	private function fillBackground(string $cipher)
	{
		$background = '';
		$nChars = Matcher::MAX_ENCRYPTED_STRING_LENGTH - mb_strlen($cipher);
		for ($i = 1; $i <= $nChars; $i++) {
			$background .= $this->backgroundAlphabet->randLetter();
		}

		return $background;
	}
}
