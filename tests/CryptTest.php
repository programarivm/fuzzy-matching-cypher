<?php

namespace FuzzyMatching\Tests;

use FuzzyMatching\Crypt;
use FuzzyMatching\Alphabet\EnglishAlphabet;
use FuzzyMatching\Alphabet\MimickedAlphabet;
use FuzzyMatching\Exception\StringLengthException;
use PHPUnit\Framework\TestCase;
use UnicodeRanges\Range\AlchemicalSymbols;
use UnicodeRanges\Range\Oriya;
use UnicodeRanges\Range\PhaistosDisc;

class CryptTest extends TestCase
{
	/**
	 * @test
	 */
	public function encrypt_foobar()
	{
		$english = new EnglishAlphabet;

		$foregroundAlphabet = new MimickedAlphabet($english, [
			new AlchemicalSymbols
		]);

		$excludedLetters = $foregroundAlphabet->letters();

		$backgroundAlphabet = new MimickedAlphabet(
			$english,
			$foregroundAlphabet->getUnicodeRanges(),
			$excludedLetters
		);

		$crypt = new Crypt($foregroundAlphabet, $backgroundAlphabet);

		$cipher = $crypt->encrypt('foobar', $foregroundAlphabet, $backgroundAlphabet);

		$this->assertTrue(false); // TODO
	}
}
