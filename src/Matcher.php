<?php

namespace FuzzyMatching;

use FuzzyMatching\Exception\StringLengthException;
use FuzzyMatching\Exception\EncryptedStringLengthException;

class Matcher
{
	const MAX_ENCRYPTED_STRING_LENGTH = 64;

	const MAX_STRING_LENGTH = 32;

	const MODE_STRICT = 'strict';

	const MODE_NORMAL = 'normal';

	private $foregroundAlphabet;

	private $backgroundAlphabet;

	public function __construct(Alphabet $foregroundAlphabet, Alphabet $backgroundAlphabet)
	{
		$this->foregroundAlphabet = $foregroundAlphabet;
		$this->backgroundAlphabet = $backgroundAlphabet;
	}

	public function match(string $str1, string $str2, string $mode = self::MODE_NORMAL)
	{
		if (mb_strlen($str1) > self::MAX_STRING_LENGTH) {
			throw new StringLengthException(self::MAX_STRING_LENGTH);
		} elseif (mb_strlen($str2) > self::MAX_STRING_LENGTH) {
			throw new StringLengthException(self::MAX_STRING_LENGTH);
		}

		$minLength = min(mb_strlen($str1), mb_strlen($str2));
		$levenshtein = levenshtein($str1, $str2);

		switch ($mode) {
			case self::MODE_STRICT:
				return $levenshtein < ceil($minLength / 4);
			default:
				return $levenshtein < ceil($minLength / 2);
		}
	}

	public function encryptedMatch(string $str1, string $str2, string $mode = self::MODE_NORMAL)
	{
		if (mb_strlen($str1) > self::MAX_ENCRYPTED_STRING_LENGTH) {
			throw new EncryptedStringLengthException(self::MAX_ENCRYPTED_STRING_LENGTH);
		} elseif (mb_strlen($str2) > self::MAX_ENCRYPTED_STRING_LENGTH) {
			throw new EncryptedStringLengthException(self::MAX_ENCRYPTED_STRING_LENGTH);
		}

		$backgroundAlphabetLetters = implode('', $this->backgroundAlphabet->letters());

		$str1 = preg_replace("/[$backgroundAlphabetLetters]/u", '', $str1);
		$str2 = preg_replace("/[$backgroundAlphabetLetters]/u", '', $str2);

		$minLength = min(mb_strlen($str1), mb_strlen($str2));
		$levenshtein = levenshtein($str1, $str2);

		switch ($mode) {
			case self::MODE_STRICT:
				return $levenshtein < ceil($minLength / 4);
			default:
				return $levenshtein < ceil($minLength / 2);
		}
	}
}
