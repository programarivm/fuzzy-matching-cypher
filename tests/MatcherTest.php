<?php

namespace FuzzyMatching\Tests;

use FuzzyMatching\Crypt;
use FuzzyMatching\Matcher;
use FuzzyMatching\Alphabet\EnglishAlphabet;
use FuzzyMatching\Alphabet\MimickedAlphabet;
use FuzzyMatching\Exception\MatcherException;
use UnicodeRanges\Range\AlchemicalSymbols;
use UnicodeRanges\Range\Ethiopic;
use UnicodeRanges\Range\HangulJamo;
use PHPUnit\Framework\TestCase;

class MatcherTest extends TestCase
{
	private $foregroundAlphabet;

	private $backgroundAlphabet;

	private $matcher;

	private $crypt;

	public function __construct() {

		$this->foregroundAlphabet = new MimickedAlphabet(
			new EnglishAlphabet, [
				new AlchemicalSymbols,
				// new HangulJamo,
			]
		);

		$this->backgroundAlphabet = new MimickedAlphabet(
			new EnglishAlphabet, [
				new Ethiopic
			]
		);

		$this->matcher = new Matcher($this->foregroundAlphabet, $this->backgroundAlphabet);
		$this->crypt = new Crypt($this->foregroundAlphabet, $this->backgroundAlphabet);
	}

	/**
	 * @test
	 */
	public function similarity_throws_foo_exception()
	{
		$this->expectException(MatcherException::class);
		$this->assertEquals(false, $this->matcher->similarity(
			'foooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo',
			'bar'
		));
	}

	/**
	 * @test
	 */
	public function similarity_throws_bar_exception()
	{
		$this->expectException(MatcherException::class);
		$this->assertEquals(false, $this->matcher->similarity(
			'foo',
			'baaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaar'
		));
	}

	/**
	 * @test
	 */
	public function encrypted_similarity_throws_exception()
	{
		$this->expectException(MatcherException::class);
		$foo = '🜁🝃🝃🝀🜿🝥🜎🝑🝪🝋🜤🜪🝳🝠🝋🝦🝆🝭🝦🝝🜘🝝🝡🜌🝦🝯🜤🜍🝯🜅🜎🜹🜹🝝🜅🜗🜋🜎🝠🝝🝑🝝🝆🜤🝉🝭🜬🝡🝯🝋🝭🜀🜬🜪🜌🜲🝆🜹🜌🜎🝯🜘🜗🝯🜋🜋🝂🜬🝆🜲🜹🜘🝝🝳🜌🝡🝭🜹🜌🜹';
		$bar = '🝌🜃🜃🝕🝁🜘🜌🜎🝤🝍🜎🜌🜆🜍🝠🝠🜌🜎🝠🝇🜴🜎🝳🜆🝄🜴🜴🝟🝦🝡🜴🜔🜴🝄🝡🝄🝧🜴🜺🝦🜴🝄🜣🝇🝧🜴🝩🝟🝠🝤🝄🜥🜌🝦🝬🜥🜺🝇🝩🜼🜣🜌🝧🝤';
		$this->matcher->similarity($foo, $bar);
	}

	/**
	 * @test
	 */
	public function similarity_foo_bar()
	{
		$this->assertEquals(0, $this->matcher->similarity('foo', 'bar'));
	}

	/**
	 * @test
	 */
	public function similarity_foo_bar_encrypted()
	{
		$foo = $this->crypt->encrypt('foo');
		$bar = $this->crypt->encrypt('bar');

		$this->assertEquals(0, $this->matcher->similarity($foo, $bar));
	}

	/**
	 * @test
	 */
	public function similarity_foo_far()
	{
		$this->assertEquals(0.33, $this->matcher->similarity('foo', 'far'));
	}

	/**
	 * @test
	 */
	public function similarity_foo_far_encrypted()
	{
		$foo = $this->crypt->encrypt('foo');
		$far = $this->crypt->encrypt('far');

		$this->assertEquals(0.33, $this->matcher->similarity($foo, $far));
	}

	/**
	 * @test
	 */
	public function similarity_foo_for()
	{
		$this->assertEquals(0.67, $this->matcher->similarity('foo', 'for'));
	}

	/**
	 * @test
	 */
	public function similarity_foo_for_encrypted()
	{
		$foo = $this->crypt->encrypt('foo');
		$for = $this->crypt->encrypt('for');

		$this->assertEquals(0.67, $this->matcher->similarity($foo, $for));
	}

	/**
	 * @test
	 */
	public function similarity_foo_foo()
	{
		$this->assertEquals(1, $this->matcher->similarity('foo', 'foo'));
	}

	/**
	 * @test
	 */
	public function similarity_foo_foo_encrypted()
	{
		$foo1 = $this->crypt->encrypt('foo');
		$foo2 = $this->crypt->encrypt('foo');

		$this->assertEquals(1, $this->matcher->similarity($foo1, $foo2));
	}

	/**
	 * @test
	 */
	public function similarity_robert_susann()
	{
		$this->assertEquals(0, $this->matcher->similarity('robert', 'susann'));
	}

	/**
	 * @test
	 */
	public function similarity_robert_susann_encrypted()
	{
		$robert = $this->crypt->encrypt('robert');
		$susann = $this->crypt->encrypt('susann');

		$this->assertEquals(0, $this->matcher->similarity($robert, $susann));
	}

	/**
	 * @test
	 */
	public function similarity_robert_rusann()
	{
		$this->assertEquals(0.17, $this->matcher->similarity('robert', 'rusann'));
	}

	/**
	 * @test
	 */
	public function similarity_robert_rusann_encrypted()
	{
		$robert = $this->crypt->encrypt('robert');
		$rusann = $this->crypt->encrypt('rusann');

		$this->assertEquals(0.17, $this->matcher->similarity($robert, $rusann));
	}

	/**
	 * @test
	 */
	public function similarity_robert_rosann()
	{
		$this->assertEquals(0.33, $this->matcher->similarity('robert', 'rosann'));
	}

	/**
	 * @test
	 */
	public function similarity_robert_rosann_encrypted()
	{
		$robert = $this->crypt->encrypt('robert');
		$rosann = $this->crypt->encrypt('rosann');

		$this->assertEquals(0.33, $this->matcher->similarity($robert, $rosann));
	}

	/**
	 * @test
	 */
	public function similarity_robert_robann()
	{
		$this->assertEquals(0.5, $this->matcher->similarity('robert', 'robann'));
	}

	/**
	 * @test
	 */
	public function similarity_robert_robann_encrypted()
	{
		$robert = $this->crypt->encrypt('robert');
		$robann = $this->crypt->encrypt('robann');

		$this->assertEquals(0.5, $this->matcher->similarity($robert, $robann));
	}

	/**
	 * @test
	 */
	public function similarity_robert_robenn()
	{
		$this->assertEquals(0.67, $this->matcher->similarity('robert', 'robenn'));
	}

	/**
	 * @test
	 */
	public function similarity_robert_robenn_encrypted()
	{
		$robert = $this->crypt->encrypt('robert');
		$robenn = $this->crypt->encrypt('robenn');

		$this->assertEquals(0.67, $this->matcher->similarity($robert, $robenn));
	}

	/**
	 * @test
	 */
	public function similarity_robert_robern()
	{
		$this->assertEquals(0.83, $this->matcher->similarity('robert', 'robern'));
	}

	/**
	 * @test
	 */
	public function similarity_robert_robern_encrypted()
	{
		$robert = $this->crypt->encrypt('robert');
		$robern = $this->crypt->encrypt('robern');

		$this->assertEquals(0.83, $this->matcher->similarity($robert, $robern));
	}

	/**
	 * @test
	 */
	public function similarity_robert_robert()
	{
		$this->assertEquals(1, $this->matcher->similarity('robert', 'robert'));
	}

	/**
	 * @test
	 */
	public function similarity_robert_robert_encrypted()
	{
		$robert1 = $this->crypt->encrypt('robert');
		$robert2 = $this->crypt->encrypt('robert');

		$this->assertEquals(1, $this->matcher->similarity($robert1, $robert2));
	}
}
