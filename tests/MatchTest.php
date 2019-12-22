<?php

namespace FuzzyMatching\Tests;

use FuzzyMatching\Crypt;
use FuzzyMatching\Match;
use FuzzyMatching\Alphabet\FuzzyAlphabet;
use FuzzyMatching\Alphabet\Real\EnglishAlphabet;
use PHPUnit\Framework\TestCase;

class MatchTest extends TestCase
{
	const FILE_SECRET = __DIR__ . '/.fuzzy-matching-secret';

	private $crypt;

	private $match;

	public function __construct()
	{
		$fuzzyAlphabet = new FuzzyAlphabet(new EnglishAlphabet);
		$this->crypt = new Crypt($fuzzyAlphabet);
		$this->crypt->writeSecret(self::FILE_SECRET); // generates a new .fuzzy-matching-secret file
		$secret = unserialize(file_get_contents(self::FILE_SECRET));
		$this->match = new Match($secret);
	}

	/**
	 * @test
	 */
	public function similarity_foo_bar()
	{
		$foo = $this->crypt->encrypt('foo');
		$bar = $this->crypt->encrypt('bar');

		$this->assertEquals(0, $this->match->similarity($foo, $bar));
	}

	/**
	 * @test
	 */
	public function similarity_foo_far()
	{
		$foo = $this->crypt->encrypt('foo');
		$far = $this->crypt->encrypt('far');

		$this->assertEquals(0.33, $this->match->similarity($foo, $far));
	}

	/**
	 * @test
	 */
	public function similarity_foo_for()
	{
		$foo = $this->crypt->encrypt('foo');
		$for = $this->crypt->encrypt('for');

		$this->assertEquals(0.67, $this->match->similarity($foo, $for));
	}

	/**
	 * @test
	 */
	public function similarity_foo_foo()
	{
		$foo1 = $this->crypt->encrypt('foo');
		$foo2 = $this->crypt->encrypt('foo');

		$this->assertEquals(1, $this->match->similarity($foo1, $foo2));
	}

	/**
	 * @test
	 */
	public function similarity_robert_susann()
	{
		$robert = $this->crypt->encrypt('robert');
		$susann = $this->crypt->encrypt('susann');

		$this->assertEquals(0, $this->match->similarity($robert, $susann));
	}

	/**
	 * @test
	 */
	public function similarity_robert_rusann()
	{
		$robert = $this->crypt->encrypt('robert');
		$rusann = $this->crypt->encrypt('rusann');

		$this->assertEquals(0.17, $this->match->similarity($robert, $rusann));
	}

	/**
	 * @test
	 */
	public function similarity_robert_rosann()
	{
		$robert = $this->crypt->encrypt('robert');
		$rosann = $this->crypt->encrypt('rosann');

		$this->assertEquals(0.33, $this->match->similarity($robert, $rosann));
	}

	/**
	 * @test
	 */
	public function similarity_robert_robann()
	{
		$robert = $this->crypt->encrypt('robert');
		$robann = $this->crypt->encrypt('robann');

		$this->assertEquals(0.5, $this->match->similarity($robert, $robann));
	}

	/**
	 * @test
	 */
	public function similarity_robert_robenn()
	{
		$robert = $this->crypt->encrypt('robert');
		$robenn = $this->crypt->encrypt('robenn');

		$this->assertEquals(0.67, $this->match->similarity($robert, $robenn));
	}

	/**
	 * @test
	 */
	public function similarity_robert_robern()
	{
		$robert = $this->crypt->encrypt('robert');
		$robern = $this->crypt->encrypt('robern');

		$this->assertEquals(0.83, $this->match->similarity($robert, $robern));
	}

	/**
	 * @test
	 */
	public function similarity_robert_robert()
	{
		$robert1 = $this->crypt->encrypt('robert');
		$robert2 = $this->crypt->encrypt('robert');

		$this->assertEquals(1, $this->match->similarity($robert1, $robert2));
	}

	/**
	 * @test
	 */
	public function similarity_stjohnrd_stjohnroad_async()
	{
		$a = $this->crypt->encrypt('stjohnrd');
		$b = $this->crypt->encrypt('stjohnrd');

		$c = $this->crypt->encrypt('stjohnroad');
		$d = $this->crypt->encrypt('stjohnroad');

		$this->assertEquals(0.89, $this->match->similarity($b, $d));
	}

	/**
	 * @test
	 */
	public function similarity_stjohnrd_stjohnrd_async()
	{
		$a = $this->crypt->encrypt('stjohnrd');
		$b = $this->crypt->encrypt('stjohnrd');

		$this->assertEquals(1, $this->match->similarity($a, $b));
	}

	public function similarity_stjohnroad_stjohnroad_async()
	{
		$a = $this->crypt->encrypt('stjohnroad');
		$b = $this->crypt->encrypt('stjohnroad');

		$this->assertEquals(1, $this->match->similarity($a, $b));
	}
}
