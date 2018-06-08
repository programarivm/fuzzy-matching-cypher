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
	private $crypt;

	public function __construct() {
		$this->crypt = new Crypt;
	}

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

		$cipher = $this->crypt->encrypt('foobar', $foregroundAlphabet, $backgroundAlphabet);

		$this->assertTrue(false); // TODO
	}
}
