<?php

namespace FuzzyMatching\Tests;

use FuzzyMatching\Lang;
use FuzzyMatching\LetterFreq;
use PHPUnit\Framework\TestCase;

class LetterFreqTest extends TestCase
{
	/**
	 * @test
	 */
	public function en()
	{
		$letterFreq = (new LetterFreq(Lang::EN))->get();

		$this->assertEquals(12.02, $letterFreq['e']);
		$this->assertEquals(9.10, $letterFreq['t']);
	}
}
