<?php

namespace FuzzyMatchingOpe\Tests;

use FuzzyMatchingOpe\LetterFrequency;
use PHPUnit\Framework\TestCase;

class LetterFrequencyTest extends TestCase
{
	/**
	 * @test
	 */
	public function en()
	{
		$en = LetterFrequency::en();

		$this->assertEquals(12.02, $en['e']);
		$this->assertEquals(9.10, $en['t']);
	}
}
