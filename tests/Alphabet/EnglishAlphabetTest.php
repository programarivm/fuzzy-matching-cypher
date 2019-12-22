<?php

namespace FuzzyMatching\Tests\Alphabet;

use FuzzyMatching\Alphabet\EnglishAlphabet;
use PHPUnit\Framework\TestCase;

class EnglishAlphabetTest extends TestCase
{
	/**
	 * @test
	 */
	public function en()
	{
		$freq = (new EnglishAlphabet)->getFreq();

		$this->assertEquals(12.02, $freq['e']);
		$this->assertEquals(9.10, $freq['t']);
		$this->assertEquals(8.12, $freq['a']);
		$this->assertEquals(7.68, $freq['o']);
		$this->assertEquals(7.31, $freq['i']);
		$this->assertEquals(6.95, $freq['n']);
		$this->assertEquals(6.28, $freq['s']);
		$this->assertEquals(6.02, $freq['r']);
		$this->assertEquals(5.92, $freq['h']);
		$this->assertEquals(4.32, $freq['d']);
		$this->assertEquals(3.98, $freq['l']);
		$this->assertEquals(2.88, $freq['u']);
		$this->assertEquals(2.71, $freq['c']);
		$this->assertEquals(2.61, $freq['m']);
		$this->assertEquals(2.30, $freq['f']);
		$this->assertEquals(2.11, $freq['y']);
		$this->assertEquals(2.09, $freq['w']);
		$this->assertEquals(2.03, $freq['g']);
		$this->assertEquals(1.82, $freq['p']);
		$this->assertEquals(1.49, $freq['b']);
		$this->assertEquals(1.11, $freq['v']);
		$this->assertEquals(0.69, $freq['k']);
		$this->assertEquals(0.17, $freq['x']);
		$this->assertEquals(0.11, $freq['q']);
		$this->assertEquals(0.10, $freq['j']);
		$this->assertEquals(0.07, $freq['z']);
	}
}
