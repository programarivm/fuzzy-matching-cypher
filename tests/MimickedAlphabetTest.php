<?php

namespace FuzzyMatching\Tests;

use FuzzyMatching\MimickedAlphabet;
use FuzzyMatching\Lang;
use PHPUnit\Framework\TestCase;

class MimickedAlphabetTest extends TestCase
{
	/**
	 * @test
	 */
	public function get()
	{
		$alphabet = (new MimickedAlphabet(Lang::EN))->get();

		$this->assertEquals(12.02, $alphabet['e']['freq']);
	}
}
