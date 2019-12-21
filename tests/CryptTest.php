<?php

namespace FuzzyMatching\Tests;

use FuzzyMatching\Crypt;
use FuzzyMatching\Alphabet\EnglishAlphabet;
use FuzzyMatching\Alphabet\FuzzyAlphabet;
use FuzzyMatching\Alphabet\MimickedAlphabet;
use FuzzyMatching\Exception\CryptException;
use PHPUnit\Framework\TestCase;

class CryptTest extends TestCase
{
	private $alphabet;

	public function __construct()
	{
		$this->alphabet = new EnglishAlphabet;
	}

	/**
	 * @test
	 */
	public function encrypt_foobar_not_disjoint_alphabets()
	{
		$foreground = new MimickedAlphabet($this->alphabet, 'AlchemicalSymbols');
		$background = new MimickedAlphabet($this->alphabet, 'AlchemicalSymbols', $foreground->letters());

		$cipher = (new Crypt(new FuzzyAlphabet($foreground, $background)))->encrypt('foobar');

		$this->assertEquals(64, mb_strlen($cipher));
	}

	/**
	 * @test
	 */
	public function encrypt_foobar_disjoint_alphabets()
	{
		$foreground = new MimickedAlphabet($this->alphabet, 'AlchemicalSymbols');
		$background = new MimickedAlphabet($this->alphabet, 'Ethiopic');

		$cipher = (new Crypt(new FuzzyAlphabet($foreground, $background)))->encrypt('foobar');

		$this->assertEquals(64, mb_strlen($cipher));
	}

	/**
	 * @test
	 */
	public function encrypt_throw_exception()
	{
		$this->expectException(CryptException::class);

		$foreground = $background = new MimickedAlphabet($this->alphabet, 'AlchemicalSymbols');

		$cipher = (new Crypt(new FuzzyAlphabet($foreground, $background)))->encrypt('foooooooooooooooooooooooooooooooo');
	}
}
