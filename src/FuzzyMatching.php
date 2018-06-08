<?php

namespace FuzzyMatching;

use FuzzyMatching\Exception\StringLengthException;

class FuzzyMatching
{
	const MAX_STRING_LENGTH = 32;

	const MODE_STRICT = 'strict';

	const MODE_NORMAL = 'normal';

	public function generateKey()
	{
		// TODO

		return $key;
	}

	public function encrypt(string $phrase, Alphabet $foregroundAlphabet, Alphabet $backgroundAlphabet)
	{
		$cipher = '';
		$chars = str_split($phrase);
		foreach ($chars as $char) {
			$cipher .= $foregroundAlphabet->letterFreq()[$char]['char'];
		}

		// TODO: add background alphabet letters

		return $cipher;
	}

	public function equal(string $str1, string $str2, string $mode = self::MODE_NORMAL)
	{
		if (strlen($str1) > self::MAX_STRING_LENGTH) {
			throw new StringLengthException(self::MAX_STRING_LENGTH);
		}
		if (strlen($str2) > self::MAX_STRING_LENGTH) {
			throw new StringLengthException(self::MAX_STRING_LENGTH);
		}

		$minLength = min(strlen($str1), strlen($str2));
		$levenshtein = levenshtein($str1, $str2);

		switch ($mode) {
			case self::MODE_STRICT:
				return $levenshtein < ceil($minLength / 4);
			default:
				return $levenshtein < ceil($minLength / 2);
		}
	}
}
