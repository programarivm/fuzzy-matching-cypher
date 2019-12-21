<?php

namespace FuzzyMatching\Tests;

use FuzzyMatching\Alphabet\EnglishAlphabet;
use FuzzyMatching\Alphabet\MimickedAlphabet;
use FuzzyMatching\Exception\MimickedAlphabetException;
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
		$items = [
			new \UnicodeRanges\Range\AlchemicalSymbols,
			new \UnicodeRanges\Range\Ethiopic,
			new \UnicodeRanges\Range\GreekAndCoptic,
			new \UnicodeRanges\Range\HangulJamo,
			new \UnicodeRanges\Range\Hanunoo,
			new \UnicodeRanges\Range\Hiragana,
			new \UnicodeRanges\Range\Ugaritic,
		];

		$mimic = (new MimickedAlphabet($this->alphabet, $items))->getLetterFreq();

		$this->assertEquals(12.02, $mimic['e']['freq']);
		$this->assertEquals(9.10, $mimic['t']['freq']);
		$this->assertEquals(8.12, $mimic['a']['freq']);
		$this->assertEquals(7.68, $mimic['o']['freq']);
		$this->assertEquals(7.31, $mimic['i']['freq']);
		$this->assertEquals(6.95, $mimic['n']['freq']);
		$this->assertEquals(6.28, $mimic['s']['freq']);
		$this->assertEquals(6.02, $mimic['r']['freq']);
		$this->assertEquals(5.92, $mimic['h']['freq']);
		$this->assertEquals(4.32, $mimic['d']['freq']);
		$this->assertEquals(3.98, $mimic['l']['freq']);
		$this->assertEquals(2.88, $mimic['u']['freq']);
		$this->assertEquals(2.71, $mimic['c']['freq']);
		$this->assertEquals(2.61, $mimic['m']['freq']);
		$this->assertEquals(2.30, $mimic['f']['freq']);
		$this->assertEquals(2.11, $mimic['y']['freq']);
		$this->assertEquals(2.09, $mimic['w']['freq']);
		$this->assertEquals(2.03, $mimic['g']['freq']);
		$this->assertEquals(1.82, $mimic['p']['freq']);
		$this->assertEquals(1.49, $mimic['b']['freq']);
		$this->assertEquals(1.11, $mimic['v']['freq']);
		$this->assertEquals(0.69, $mimic['k']['freq']);
		$this->assertEquals(0.17, $mimic['x']['freq']);
		$this->assertEquals(0.11, $mimic['q']['freq']);
		$this->assertEquals(0.10, $mimic['j']['freq']);
		$this->assertEquals(0.07, $mimic['z']['freq']);
	}

	/**
	 * @test
	 */
	public function disjoint_letters_AlchemicalSymbols()
	{
		$items = [
			new \UnicodeRanges\Range\AlchemicalSymbols,
		];

		$foreground = new MimickedAlphabet($this->alphabet, $items);
		$background = new MimickedAlphabet($this->alphabet, $items, $foreground->letters());

		$this->assertEquals([], array_intersect($foreground->letters(), $background->letters()));
	}

	/**
	 * @test
	 */
	public function disjoint_letters_Ethiopic()
	{
		$items = [
			new \UnicodeRanges\Range\Ethiopic,
		];

		$foreground = new MimickedAlphabet($this->alphabet, $items);
		$background = new MimickedAlphabet($this->alphabet, $items, $foreground->letters());

		$this->assertEquals([], array_intersect($foreground->letters(), $background->letters()));
	}

	/**
	 * @test
	 */
	/* public function disjoint_letters_Ugaritic()
	{
		$items = [
			new \UnicodeRanges\Range\Ugaritic,
		];

		$foreground = new MimickedAlphabet($this->alphabet, $items);
		$background = new MimickedAlphabet($this->alphabet, $items, $foreground->letters());

		$this->assertEquals([], array_intersect($foreground->letters(), $background->letters()));
	}*/
}
