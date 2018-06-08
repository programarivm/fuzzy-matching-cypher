<?php

namespace FuzzyMatching\Tests\Alphabet;

use FuzzyMatching\Alphabet\English;
use PHPUnit\Framework\TestCase;

class EnglishTest extends TestCase
{
	/**
	 * @test
	 */
	public function en()
	{
		$letterFreq = (new English)->letterFreq();

		$this->assertEquals(12.02, $letterFreq['e']);
		$this->assertEquals(9.10, $letterFreq['t']);
		$this->assertEquals(12.02, $letterFreq['e']);
		$this->assertEquals(9.10, $letterFreq['t']);
		$this->assertEquals(8.12, $letterFreq['a']);
		$this->assertEquals(7.68, $letterFreq['o']);
		$this->assertEquals(7.31, $letterFreq['i']);
		$this->assertEquals(6.95, $letterFreq['n']);
		$this->assertEquals(6.28, $letterFreq['s']);
		$this->assertEquals(6.02, $letterFreq['r']);
		$this->assertEquals(5.92, $letterFreq['h']);
		$this->assertEquals(4.32, $letterFreq['d']);
		$this->assertEquals(3.98, $letterFreq['l']);
		$this->assertEquals(2.88, $letterFreq['u']);
		$this->assertEquals(2.71, $letterFreq['c']);
		$this->assertEquals(2.61, $letterFreq['m']);
		$this->assertEquals(2.30, $letterFreq['f']);
		$this->assertEquals(2.11, $letterFreq['y']);
		$this->assertEquals(2.09, $letterFreq['w']);
		$this->assertEquals(2.03, $letterFreq['g']);
		$this->assertEquals(1.82, $letterFreq['p']);
		$this->assertEquals(1.49, $letterFreq['b']);
		$this->assertEquals(1.11, $letterFreq['v']);
		$this->assertEquals(0.69, $letterFreq['k']);
		$this->assertEquals(0.17, $letterFreq['x']);
		$this->assertEquals(0.11, $letterFreq['q']);
		$this->assertEquals(0.10, $letterFreq['j']);
		$this->assertEquals(0.07, $letterFreq['z']);
	}
}
