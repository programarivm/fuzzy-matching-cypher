<?php

namespace FuzzyMatching\Tests;

use FuzzyMatching\Alphabet\English;
use FuzzyMatching\Alphabet\Mimicked;
use PHPUnit\Framework\TestCase;

class MimickedAlphabetTest extends TestCase
{
	/**
	 * @test
	 */
	public function letter_freq()
	{
		$english = new English;
		$mimickedEnglish = (new Mimicked($english))->letterFreq();

		$this->assertEquals(12.02, $mimickedEnglish['e']['freq']);
	}
}
