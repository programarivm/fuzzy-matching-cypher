<?php

namespace FuzzyMatching\Tests;

use FuzzyMatching\Crypt;
use FuzzyMatching\Alphabet\EnglishAlphabet;
use FuzzyMatching\Alphabet\MimickedAlphabet;
use PHPUnit\Framework\TestCase;
use UnicodeRanges\Range\AlchemicalSymbols;

class CryptTest extends TestCase
{
	/**
	 * @test
	 */
	public function encrypt_foobar()
	{
		$foregroundAlphabet = new MimickedAlphabet(
			new EnglishAlphabet, [
				new AlchemicalSymbols
			]
		);

		$excludedLetters = $foregroundAlphabet->letters();

		$backgroundAlphabet = new MimickedAlphabet(
			new EnglishAlphabet,
			$foregroundAlphabet->getUnicodeRanges(),
			$excludedLetters
		);

		$crypt = new Crypt($foregroundAlphabet, $backgroundAlphabet);

		$cipher = $crypt->encrypt('foobar', $foregroundAlphabet, $backgroundAlphabet);

		$this->assertEquals(64, mb_strlen($cipher));
	}
}
