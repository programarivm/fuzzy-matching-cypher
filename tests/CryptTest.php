<?php

namespace FuzzyMatching\Tests;

use FuzzyMatching\Crypt;
use FuzzyMatching\Alphabet\EnglishAlphabet;
use FuzzyMatching\Alphabet\MimickedAlphabet;
use FuzzyMatching\Exception\CryptException;
use PHPUnit\Framework\TestCase;
use UnicodeRanges\Range\AlchemicalSymbols;
use UnicodeRanges\Range\Ethiopic;

class CryptTest extends TestCase
{
	/**
	 * @test
	 */
	public function encrypt_foobar_not_disjoint_alphabets()
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

		$cipher = $crypt->encrypt('foobar');

		$this->assertEquals(64, mb_strlen($cipher));
	}

	/**
	 * @test
	 */
	public function encrypt_foobar_disjoint_alphabets()
	{
		$foregroundAlphabet = new MimickedAlphabet(
			new EnglishAlphabet, [
				new AlchemicalSymbols
			]
		);

		$backgroundAlphabet = new MimickedAlphabet(
			new EnglishAlphabet, [
				new Ethiopic
			]
		);

		$crypt = new Crypt($foregroundAlphabet, $backgroundAlphabet);

		$cipher = $crypt->encrypt('foobar');

		$this->assertEquals(64, mb_strlen($cipher));
	}

	/**
	 * @test
	 */
	public function encrypt_throw_exception()
	{
		$this->expectException(CryptException::class);

		$foregroundAlphabet = new MimickedAlphabet(
			new EnglishAlphabet, [
				new AlchemicalSymbols
			]
		);

		$backgroundAlphabet = new MimickedAlphabet(
			new EnglishAlphabet, [
				new Ethiopic
			]
		);

		$crypt = new Crypt($foregroundAlphabet, $backgroundAlphabet);

		$cipher = $crypt->encrypt('foooooooooooooooooooooooooooooooo');
	}
}
