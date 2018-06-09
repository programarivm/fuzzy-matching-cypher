<?php

namespace FuzzyMatching;

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

		// TODO: add background alphabet letters

		return $cipher;
	}
}
