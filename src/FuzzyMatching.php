<?php

namespace FuzzyMatching;

use FuzzyMatching\Exception\StringLengthException;

class FuzzyMatching
{
	const MAX_STRING_LENGTH = 32;

	const MODE_STRICT = 'strict';

	const MODE_NORMAL = 'normal';

	public function encrypt(string $phrase)
	{
		// TODO

		return $phrase;
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