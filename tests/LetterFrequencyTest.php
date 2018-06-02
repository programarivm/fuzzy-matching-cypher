<?php

namespace FuzzyMatching\Tests;

use FuzzyMatching\Lang;
use FuzzyMatching\LetterFrequency;
use PHPUnit\Framework\TestCase;

class LetterFrequencyTest extends TestCase
{
	/**
	 * @test
	 */
	public function en()
	{
		$letterFreq = (new LetterFrequency(Lang::EN))->get();

		$this->assertEquals(12.02, $letterFreq['e']);
		$this->assertEquals(9.10, $letterFreq['t']);
	}
}
