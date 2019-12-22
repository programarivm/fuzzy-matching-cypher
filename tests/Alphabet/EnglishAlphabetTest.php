<?php

namespace FuzzyMatching\Tests\Alphabet;

use FuzzyMatching\Alphabet\Real\EnglishAlphabet;
use PHPUnit\Framework\TestCase;

class EnglishAlphabetTest extends TestCase
{
	/**
	 * @test
	 */
	public function en()
	{
		$stats = (new EnglishAlphabet)->getStats();

		$this->assertEquals(12.02, $stats['e']);
		$this->assertEquals(9.10, $stats['t']);
		$this->assertEquals(8.12, $stats['a']);
		$this->assertEquals(7.68, $stats['o']);
		$this->assertEquals(7.31, $stats['i']);
		$this->assertEquals(6.95, $stats['n']);
		$this->assertEquals(6.28, $stats['s']);
		$this->assertEquals(6.02, $stats['r']);
		$this->assertEquals(5.92, $stats['h']);
		$this->assertEquals(4.32, $stats['d']);
		$this->assertEquals(3.98, $stats['l']);
		$this->assertEquals(2.88, $stats['u']);
		$this->assertEquals(2.71, $stats['c']);
		$this->assertEquals(2.61, $stats['m']);
		$this->assertEquals(2.30, $stats['f']);
		$this->assertEquals(2.11, $stats['y']);
		$this->assertEquals(2.09, $stats['w']);
		$this->assertEquals(2.03, $stats['g']);
		$this->assertEquals(1.82, $stats['p']);
		$this->assertEquals(1.49, $stats['b']);
		$this->assertEquals(1.11, $stats['v']);
		$this->assertEquals(0.69, $stats['k']);
		$this->assertEquals(0.17, $stats['x']);
		$this->assertEquals(0.11, $stats['q']);
		$this->assertEquals(0.10, $stats['j']);
		$this->assertEquals(0.07, $stats['z']);
	}
}
