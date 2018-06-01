<?php

namespace FuzzyMatching\Tests;

use FuzzyMatching\FuzzyMatching;
use FuzzyMatching\Exception\StringLengthException;
use PHPUnit\Framework\TestCase;

class FuzzyMatchingTest extends TestCase
{
	private $fuzzyMatching;

	public function __construct() {
		$this->fuzzyMatching = new FuzzyMatching;
	}

	/**
	 * @test
	 */
	public function generate_key()
	{
		// TODO

		$this->assertEquals('todo', $this->fuzzyMatching->generateKey());
	}

	/**
	 * @test
	 */
	public function encrypt_foo()
	{
		// TODO

		$this->assertEquals('todo', $this->fuzzyMatching->encrypt('foo'));
	}

	/**
	 * @test
	 */
	public function equal_throws_foo_length_exception()
	{
		$this->expectException(StringLengthException::class);
		$this->assertEquals(false, $this->fuzzyMatching->equal('foooooooooooooooooooooooooooooooo', 'bar'));
	}

	/**
	 * @test
	 */
	public function equal_throws_bar_length_exception()
	{
		$this->expectException(StringLengthException::class);
		$this->assertEquals(false, $this->fuzzyMatching->equal('foo', 'baaaaaaaaaaaaaaaaaaaaaaaaaaaaaaar'));
	}

	/**
     * @test
     */
	public function equal_foo_bar_MODE_STRICT()
	{
		$this->assertEquals(false, $this->fuzzyMatching->equal('foo', 'bar', FuzzyMatching::MODE_STRICT));
	}

	/**
	 * @test
	 */
	public function equal_foo_bar_MODE_NORMAL()
	{
		$this->assertEquals(false, $this->fuzzyMatching->equal('foo', 'bar'));
	}

	/**
	 * @test
	 */
	public function equal_foo_far_MODE_STRICT()
	{
		$this->assertEquals(false, $this->fuzzyMatching->equal('foo', 'far', FuzzyMatching::MODE_STRICT));
	}

	/**
	 * @test
	 */
	public function equal_foo_far_MODE_NORMAL()
	{
		$this->assertEquals(false, $this->fuzzyMatching->equal('foo', 'far'));
	}

	/**
	 * @test
	 */
	public function equal_foo_for_MODE_STRICT()
	{
		$this->assertEquals(false, $this->fuzzyMatching->equal('foo', 'for', FuzzyMatching::MODE_STRICT));
	}

	/**
	 * @test
	 */
	public function equal_foo_for_MODE_NORMAL()
	{
		$this->assertEquals(true, $this->fuzzyMatching->equal('foo', 'for'));
	}

	/**
	 * @test
	 */
	public function equal_foo_foo_MODE_STRICT()
	{
		$this->assertEquals(true, $this->fuzzyMatching->equal('foo', 'foo', FuzzyMatching::MODE_STRICT));
	}

	/**
	 * @test
	 */
	public function equal_foo_foo_MODE_NORMAL()
	{
		$this->assertEquals(true, $this->fuzzyMatching->equal('foo', 'foo'));
	}

	/**
	 * @test
	 */
	public function equal_robert_susann_MODE_STRICT()
	{
		$this->assertEquals(false, $this->fuzzyMatching->equal('robert', 'susann', FuzzyMatching::MODE_STRICT));
	}

	/**
	 * @test
	 */
	public function equal_robert_susann_MODE_NORMAL()
	{
		$this->assertEquals(false, $this->fuzzyMatching->equal('robert', 'susann'));
	}

	/**
	 * @test
	 */
	public function equal_robert_rusann_MODE_STRICT()
	{
		$this->assertEquals(false, $this->fuzzyMatching->equal('robert', 'rusann', FuzzyMatching::MODE_STRICT));
	}

	/**
	 * @test
	 */
	public function equal_robert_rusann_MODE_NORMAL()
	{
		$this->assertEquals(false, $this->fuzzyMatching->equal('robert', 'rusann'));
	}

	/**
	 * @test
	 */
	public function equal_robert_rosann_MODE_STRICT()
	{
		$this->assertEquals(false, $this->fuzzyMatching->equal('robert', 'rosann', FuzzyMatching::MODE_STRICT));
	}

	/**
	 * @test
	 */
	public function equal_robert_rosann_MODE_NORMAL()
	{
		$this->assertEquals(false, $this->fuzzyMatching->equal('robert', 'rosann'));
	}

	/**
	 * @test
	 */
	public function equal_robert_robann_MODE_STRICT()
	{
		$this->assertEquals(false, $this->fuzzyMatching->equal('robert', 'robann', FuzzyMatching::MODE_STRICT));
	}

	/**
	 * @test
	 */
	public function equal_robert_robann_MODE_NORMAL()
	{
		$this->assertEquals(false, $this->fuzzyMatching->equal('robert', 'robann'));
	}

	/**
	 * @test
	 */
	public function equal_robert_robenn_MODE_STRICT()
	{
		$this->assertEquals(false, $this->fuzzyMatching->equal('robert', 'robenn', FuzzyMatching::MODE_STRICT));
	}

	/**
	 * @test
	 */
	public function equal_robert_robenn_MODE_NORMAL()
	{
		$this->assertEquals(true, $this->fuzzyMatching->equal('robert', 'robenn'));
	}

	/**
	 * @test
	 */
	public function equal_robert_robern_MODE_STRICT()
	{
		$this->assertEquals(true, $this->fuzzyMatching->equal('robert', 'robern', FuzzyMatching::MODE_STRICT));
	}

	/**
	 * @test
	 */
	public function equal_robert_robern_MODE_NORMAL()
	{
		$this->assertEquals(true, $this->fuzzyMatching->equal('robert', 'robern'));
	}

	/**
	 * @test
	 */
	public function equal_robert_robert_MODE_STRICT()
	{
		$this->assertEquals(true, $this->fuzzyMatching->equal('robert', 'robert', FuzzyMatching::MODE_STRICT));
	}

	/**
	 * @test
	 */
	public function equal_robert_robert_MODE_NORMAL()
	{
		$this->assertEquals(true, $this->fuzzyMatching->equal('robert', 'robert'));
	}
}
