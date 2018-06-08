<?php

namespace FuzzyMatching;

class Crypt
{
	public function encrypt(string $phrase, Alphabet $foregroundAlphabet, Alphabet $backgroundAlphabet)
	{
		$cipher = '';
		$chars = str_split($phrase);
		foreach ($chars as $char) {
			$cipher .= $foregroundAlphabet->getLetterFreq()[$char]['char'];
		}

		// TODO: add background alphabet letters

		return $cipher;
	}
}
