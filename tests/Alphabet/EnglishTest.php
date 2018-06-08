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
	}
}
