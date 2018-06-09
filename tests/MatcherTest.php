<?php

namespace FuzzyMatching\Tests;

use FuzzyMatching\Crypt;
use FuzzyMatching\Matcher;
use FuzzyMatching\Alphabet\EnglishAlphabet;
use FuzzyMatching\Alphabet\MimickedAlphabet;
use FuzzyMatching\Exception\MimickedAlphabetException;
use FuzzyMatching\Exception\EncryptedStringLengthException;
use FuzzyMatching\Exception\StringLengthException;
use UnicodeRanges\Range\AlchemicalSymbols;
use PHPUnit\Framework\TestCase;

class MatcherTest extends TestCase
{
	private $matcher;

	private $crypt;

	public function __construct() {

		$this->matcher = new Matcher;

		$foregroundAlphabet = new MimickedAlphabet(
			new EnglishAlphabet, [
				new AlchemicalSymbols
			]
		);

		$excludedLetters = $foregroundAlphabet->letters();

		$backgroundAlphabet = new MimickedAlphabet(
			new EnglishAlphabet,
			$foregroundAlphabet->getUnicodeRanges(),
			$excludedLetters
		);

		$this->crypt = new Crypt($foregroundAlphabet, $backgroundAlphabet);
	}

	/**
	 * @test
	 */
	public function match_throws_foo_length_exception()
	{
		$this->expectException(StringLengthException::class);
		$this->assertEquals(false, $this->matcher->match('foooooooooooooooooooooooooooooooo', 'bar'));
	}

	/**
	 * @test
	 */
	public function match_throws_bar_length_exception()
	{
		$this->expectException(StringLengthException::class);
		$this->assertEquals(false, $this->matcher->match('foo', 'baaaaaaaaaaaaaaaaaaaaaaaaaaaaaaar'));
	}

	/**
	 * @test
	 */
	public function encrypted_match_throws_encrypted_string_length_exception()
	{
		$this->expectException(EncryptedStringLengthException::class);
		$foo = '🜁🝃🝃🝀🜿🝥🜎🝑🝪🝋🜤🜪🝳🝠🝋🝦🝆🝭🝦🝝🜘🝝🝡🜌🝦🝯🜤🜍🝯🜅🜎🜹🜹🝝🜅🜗🜋🜎🝠🝝🝑🝝🝆🜤🝉🝭🜬🝡🝯🝋🝭🜀🜬🜪🜌🜲🝆🜹🜌🜎🝯🜘🜗🝯🜋🜋🝂🜬🝆🜲🜹🜘🝝🝳🜌🝡🝭🜹🜌🜹';
		$bar = '🝌🜃🜃🝕🝁🜘🜌🜎🝤🝍🜎🜌🜆🜍🝠🝠🜌🜎🝠🝇🜴🜎🝳🜆🝄🜴🜴🝟🝦🝡🜴🜔🜴🝄🝡🝄🝧🜴🜺🝦🜴🝄🜣🝇🝧🜴🝩🝟🝠🝤🝄🜥🜌🝦🝬🜥🜺🝇🝩🜼🜣🜌🝧🝤';
		$this->matcher->encryptedMatch($foo, $bar, Matcher::MODE_STRICT);
	}

	/**
     * @test
     */
	public function match_foo_bar_MODE_STRICT()
	{
		$this->assertEquals(false, $this->matcher->match('foo', 'bar', Matcher::MODE_STRICT));
	}

	/**
	 * @test
	 */
	public function encrypted_match_foo_bar_MODE_STRICT_encrypted()
	{
		$foo = $this->crypt->encrypt('foo');
		$bar = $this->crypt->encrypt('bar');

		$this->assertEquals(true, $this->matcher->encryptedMatch($foo, $bar, Matcher::MODE_STRICT));
	}

	/**
	 * @test
	 */
	public function match_foo_bar_MODE_NORMAL()
	{
		$this->assertEquals(false, $this->matcher->match('foo', 'bar'));
	}

	/**
	 * @test
	 */
	public function match_foo_far_MODE_STRICT()
	{
		$this->assertEquals(false, $this->matcher->match('foo', 'far', Matcher::MODE_STRICT));
	}

	/**
	 * @test
	 */
	public function match_foo_far_MODE_NORMAL()
	{
		$this->assertEquals(false, $this->matcher->match('foo', 'far'));
	}

	/**
	 * @test
	 */
	public function match_foo_for_MODE_STRICT()
	{
		$this->assertEquals(false, $this->matcher->match('foo', 'for', Matcher::MODE_STRICT));
	}

	/**
	 * @test
	 */
	public function match_foo_for_MODE_NORMAL()
	{
		$this->assertEquals(true, $this->matcher->match('foo', 'for'));
	}

	/**
	 * @test
	 */
	public function match_foo_foo_MODE_STRICT()
	{
		$this->assertEquals(true, $this->matcher->match('foo', 'foo', Matcher::MODE_STRICT));
	}

	/**
	 * @test
	 */
	public function match_foo_foo_MODE_NORMAL()
	{
		$this->assertEquals(true, $this->matcher->match('foo', 'foo'));
	}

	/**
	 * @test
	 */
	public function match_robert_susann_MODE_STRICT()
	{
		$this->assertEquals(false, $this->matcher->match('robert', 'susann', Matcher::MODE_STRICT));
	}

	/**
	 * @test
	 */
	public function match_robert_susann_MODE_NORMAL()
	{
		$this->assertEquals(false, $this->matcher->match('robert', 'susann'));
	}

	/**
	 * @test
	 */
	public function match_robert_rusann_MODE_STRICT()
	{
		$this->assertEquals(false, $this->matcher->match('robert', 'rusann', Matcher::MODE_STRICT));
	}

	/**
	 * @test
	 */
	public function match_robert_rusann_MODE_NORMAL()
	{
		$this->assertEquals(false, $this->matcher->match('robert', 'rusann'));
	}

	/**
	 * @test
	 */
	public function match_robert_rosann_MODE_STRICT()
	{
		$this->assertEquals(false, $this->matcher->match('robert', 'rosann', Matcher::MODE_STRICT));
	}

	/**
	 * @test
	 */
	public function match_robert_rosann_MODE_NORMAL()
	{
		$this->assertEquals(false, $this->matcher->match('robert', 'rosann'));
	}

	/**
	 * @test
	 */
	public function match_robert_robann_MODE_STRICT()
	{
		$this->assertEquals(false, $this->matcher->match('robert', 'robann', Matcher::MODE_STRICT));
	}

	/**
	 * @test
	 */
	public function match_robert_robann_MODE_NORMAL()
	{
		$this->assertEquals(false, $this->matcher->match('robert', 'robann'));
	}

	/**
	 * @test
	 */
	public function match_robert_robenn_MODE_STRICT()
	{
		$this->assertEquals(false, $this->matcher->match('robert', 'robenn', Matcher::MODE_STRICT));
	}

	/**
	 * @test
	 */
	public function match_robert_robenn_MODE_NORMAL()
	{
		$this->assertEquals(true, $this->matcher->match('robert', 'robenn'));
	}

	/**
	 * @test
	 */
	public function match_robert_robern_MODE_STRICT()
	{
		$this->assertEquals(true, $this->matcher->match('robert', 'robern', Matcher::MODE_STRICT));
	}

	/**
	 * @test
	 */
	public function match_robert_robern_MODE_NORMAL()
	{
		$this->assertEquals(true, $this->matcher->match('robert', 'robern'));
	}

	/**
	 * @test
	 */
	public function match_robert_robert_MODE_STRICT()
	{
		$this->assertEquals(true, $this->matcher->match('robert', 'robert', Matcher::MODE_STRICT));
	}

	/**
	 * @test
	 */
	public function match_robert_robert_MODE_NORMAL()
	{
		$this->assertEquals(true, $this->matcher->match('robert', 'robert'));
	}
}
