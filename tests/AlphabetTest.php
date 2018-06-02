<?php

namespace FuzzyMatching\Tests;

use FuzzyMatching\Alphabet;
use FuzzyMatching\Language;
use PHPUnit\Framework\TestCase;

class AlphabetTest extends TestCase
{
	/**
	 * @test
	 */
	public function get()
	{
		$alphabet = (new Alphabet(Language::EN))->get();

		$this->assertEquals(12.02, $alphabet['e']['freq']);
	}
}
