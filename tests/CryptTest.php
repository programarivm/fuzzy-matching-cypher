<?php

namespace FuzzyMatching\Tests;

use FuzzyMatching\Crypt;
use FuzzyMatching\Alphabet\EnglishAlphabet;
use FuzzyMatching\Alphabet\MimickedAlphabet;
use FuzzyMatching\Exception\CryptException;
use PHPUnit\Framework\TestCase;

class CryptTest extends TestCase
{
	/**
	 * @test
	 */
	public function encrypt_foobar_not_disjoint_alphabets()
	{
		$items = 'AlchemicalSymbols';

		$foregroundAlphabet = new MimickedAlphabet(
			new EnglishAlphabet,
			$items
		);

		$excludedLetters = $foregroundAlphabet->letters();

		$backgroundAlphabet = new MimickedAlphabet(
			new EnglishAlphabet,
			$items,
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
		$items = 'AlchemicalSymbols';

		$foregroundAlphabet = new MimickedAlphabet(
			new EnglishAlphabet,
			$items
		);

		$items = 'Ethiopic';

		$backgroundAlphabet = new MimickedAlphabet(
			new EnglishAlphabet,
			$items
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

		$items = 'AlchemicalSymbols';

		$foregroundAlphabet = new MimickedAlphabet(
			new EnglishAlphabet,
			$items
		);

		$items = 'AlchemicalSymbols';

		$backgroundAlphabet = new MimickedAlphabet(
			new EnglishAlphabet,
			$items
		);

		$crypt = new Crypt($foregroundAlphabet, $backgroundAlphabet);

		$cipher = $crypt->encrypt('foooooooooooooooooooooooooooooooo');
	}
}
