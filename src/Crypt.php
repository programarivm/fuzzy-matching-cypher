<?php

namespace FuzzyMatching;

use FuzzyMatching\Match;
use FuzzyMatching\Exception\CryptException;
use FuzzyMatching\Alphabet\EnglishAlphabet;
use FuzzyMatching\Alphabet\MimickedAlphabet;
use UnicodeRanges\Range\AlchemicalSymbols;
use UnicodeRanges\Range\Ethiopic;

class Crypt
{
	const MAX_STRING_LENGTH = 32;

	private $alphabets;

	public function __construct(string $filepath = null)
	{
		if (empty($file)) {
			// TODO create random, disjoint alphabets
			$this->alphabets['foreground'] = new MimickedAlphabet(
				new EnglishAlphabet, [
					new AlchemicalSymbols
				]
			);
			$this->alphabets['background'] = new MimickedAlphabet(
				new EnglishAlphabet, [
					new Ethiopic
				]
			);
		} else {
			// TODO: Read alphabets from file

			return false;
		}
	}

	public function getAlphabets()
	{
		return $this->alphabets;
	}

	public function encrypt(string $str)
	{
		if (mb_strlen($str) > self::MAX_STRING_LENGTH) {
			throw new CryptException(self::MAX_STRING_LENGTH);
		}

		$cipher = '';
		$chars = str_split($str);
		foreach ($chars as $char) {
			$cipher .= $this->alphabets['foreground']->getLetterFreq()[$char]['char'];
		}

		return $cipher . $this->fillBackground($cipher);
	}

	private function fillBackground(string $cipher)
	{
		$background = '';
		$nChars = Match::MAX_STRING_LENGTH - mb_strlen($cipher);
		for ($i = 1; $i <= $nChars; $i++) {
			$background .= $this->alphabets['background']->randLetter();
		}

		return $background;
	}
}
