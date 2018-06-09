<?php

namespace FuzzyMatching\Tests;

use FuzzyMatching\Alphabet\EnglishAlphabet;
use FuzzyMatching\Alphabet\MimickedAlphabet;
use FuzzyMatching\Exception\MimickedAlphabetException;
use UnicodeRanges\Range\AlchemicalSymbols;
use UnicodeRanges\Range\Ethiopic;
use UnicodeRanges\Range\GreekAndCoptic;
use UnicodeRanges\Range\HangulJamo;
use UnicodeRanges\Range\Hanunoo;
use UnicodeRanges\Range\Hiragana;
use UnicodeRanges\Range\Ugaritic;
use PHPUnit\Framework\TestCase;

class MimickedAlphabetTest extends TestCase
{
	private $alphabet;

	public function __construct()
	{
		$this->alphabet = new EnglishAlphabet;
	}

	/**
	 * @test
	 */
	public function letter_freq()
	{
		$unicodeRanges = [
			new AlchemicalSymbols,
			new Ethiopic,
			new GreekAndCoptic,
			new HangulJamo,
			new Hanunoo,
			new Hiragana,
			new Ugaritic,
		];
		$mimickedEnglish = (new MimickedAlphabet($this->alphabet, $unicodeRanges))->getLetterFreq();

		$this->assertEquals(12.02, $mimickedEnglish['e']['freq']);
		$this->assertEquals(9.10, $mimickedEnglish['t']['freq']);
		$this->assertEquals(8.12, $mimickedEnglish['a']['freq']);
		$this->assertEquals(7.68, $mimickedEnglish['o']['freq']);
		$this->assertEquals(7.31, $mimickedEnglish['i']['freq']);
		$this->assertEquals(6.95, $mimickedEnglish['n']['freq']);
		$this->assertEquals(6.28, $mimickedEnglish['s']['freq']);
		$this->assertEquals(6.02, $mimickedEnglish['r']['freq']);
		$this->assertEquals(5.92, $mimickedEnglish['h']['freq']);
		$this->assertEquals(4.32, $mimickedEnglish['d']['freq']);
		$this->assertEquals(3.98, $mimickedEnglish['l']['freq']);
		$this->assertEquals(2.88, $mimickedEnglish['u']['freq']);
		$this->assertEquals(2.71, $mimickedEnglish['c']['freq']);
		$this->assertEquals(2.61, $mimickedEnglish['m']['freq']);
		$this->assertEquals(2.30, $mimickedEnglish['f']['freq']);
		$this->assertEquals(2.11, $mimickedEnglish['y']['freq']);
		$this->assertEquals(2.09, $mimickedEnglish['w']['freq']);
		$this->assertEquals(2.03, $mimickedEnglish['g']['freq']);
		$this->assertEquals(1.82, $mimickedEnglish['p']['freq']);
		$this->assertEquals(1.49, $mimickedEnglish['b']['freq']);
		$this->assertEquals(1.11, $mimickedEnglish['v']['freq']);
		$this->assertEquals(0.69, $mimickedEnglish['k']['freq']);
		$this->assertEquals(0.17, $mimickedEnglish['x']['freq']);
		$this->assertEquals(0.11, $mimickedEnglish['q']['freq']);
		$this->assertEquals(0.10, $mimickedEnglish['j']['freq']);
		$this->assertEquals(0.07, $mimickedEnglish['z']['freq']);
	}

	/**
	 * @test
	 */
	public function disjoint_letters_English_AlchemicalSymbols()
	{
		$foregroundAlphabet = new MimickedAlphabet($this->alphabet, [
				new AlchemicalSymbols,
			]
		);

		$excludedLetters = $foregroundAlphabet->letters();

		$backgroundAlphabet = new MimickedAlphabet($this->alphabet, [
				new AlchemicalSymbols,
			],
			$excludedLetters
		);

		$this->assertEquals([], array_intersect($excludedLetters, $backgroundAlphabet->letters()));
	}

	/**
	 * @test
	 */
	public function disjoint_letters_English_Ethiopic()
	{
		$foregroundAlphabet = new MimickedAlphabet($this->alphabet, [
				new Ethiopic,
			]
		);

		$excludedLetters = $foregroundAlphabet->letters();

		$backgroundAlphabet = new MimickedAlphabet($this->alphabet, [
				new Ethiopic,
			],
			$excludedLetters
		);

		$this->assertEquals([], array_intersect($excludedLetters, $backgroundAlphabet->letters()));
	}

	/**
	 * @test
	 */
	public function disjoint_letters_English_Ugaritic()
	{
        $this->expectException(MimickedAlphabetException::class);

		$foregroundAlphabet = new MimickedAlphabet($this->alphabet,	[
				new Ugaritic,
			]
		);

		$backgroundAlphabet = new MimickedAlphabet($this->alphabet,	[
				new Ugaritic,
			],
			$foregroundAlphabet->letters()
		);
	}
}
