<?php

namespace FuzzyMatching\Tests;

use FuzzyMatching\Language;
use FuzzyMatching\LetterFrequency;
use PHPUnit\Framework\TestCase;

class LetterFrequencyTest extends TestCase
{
	/**
	 * @test
	 */
	public function en()
	{
		$letterFreq = new LetterFrequency(Language::EN);

		$this->assertEquals(12.02, $letterFreq->get()['e']);
		$this->assertEquals(9.10, $letterFreq->get()['t']);
	}
}
