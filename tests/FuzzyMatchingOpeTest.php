<?php
namespace FuzzyMatchingOpe\Tests;

use FuzzyMatchingOpe\FuzzyMatchingOpe;
use PHPUnit\Framework\TestCase;

class FuzzyMatchingOpeTest extends TestCase
{
	private $fuzzyMatchingOpe;

	public function __construct()
	{
		$this->fuzzyMatchingOpe = new FuzzyMatchingOpe;
	}

	/**
     * @test
     */
	public function compare_foo_bar()
	{
		$this->assertNotEquals(true, $this->fuzzyMatchingOpe->compare('foo', 'bar'));
	}
}
