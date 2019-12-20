<?php

namespace FuzzyMatching\Tests;

use Dotenv\Dotenv;
use FuzzyMatching\Crypt;
use FuzzyMatching\Match;
use FuzzyMatching\Alphabet\EnglishAlphabet;
use FuzzyMatching\Alphabet\FuzzyAlphabet;
use FuzzyMatching\Alphabet\MimickedAlphabet;
use PHPUnit\Framework\TestCase;

class MatchTest extends TestCase
{
	private $match;

	private $crypt;

	public function __construct()
	{
		$dotenv = Dotenv::createImmutable(__DIR__.'/../');
		$dotenv->load();

		$alphabet = new EnglishAlphabet;

		$foreground = new MimickedAlphabet(
		    $alphabet,
		    getenv('FUZZY_MATCHING_FOREGROUND_ALPHABET')
		);

		$background = new MimickedAlphabet(
		    $alphabet,
		    getenv('FUZZY_MATCHING_BACKGROUND_ALPHABET')
		);

		$fuzzyAlphabet = new FuzzyAlphabet($foreground, $background);

		$this->match = new Match($fuzzyAlphabet);
		$this->crypt = new Crypt($fuzzyAlphabet);
	}

	/**
	 * @test
	 * @expectedException \FuzzyMatching\Exception\MatchException
	 */
	public function similarity_fooo_bar_throws_exception()
	{
		$this->match->similarity(
			'foooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo',
			'bar'
		);
	}

	/**
	 * @test
	 * @expectedException \FuzzyMatching\Exception\MatchException
	 */
	public function similarity_foo_baaar_throws_exception()
	{
		$this->match->similarity(
			'foo',
			'baaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaar'
		);
	}

	/**
	 * @test
	 * @expectedException \FuzzyMatching\Exception\MatchException
	 */
	public function similarity_encrypted_throws_exception()
	{
		$this->match->similarity(
			'🜁🝃🝃🝀🜿🝥🜎🝑🝪🝋🜤🜪🝳🝠🝋🝦🝆🝭🝦🝝🜘🝝🝡🜌🝦🝯🜤🜍🝯🜅🜎🜹🜹🝝🜅🜗🜋🜎🝠🝝🝑🝝🝆🜤🝉🝭🜬🝡🝯🝋🝭🜀🜬🜪🜌🜲🝆🜹🜌🜎🝯🜘🜗🝯🜋🜋🝂🜬🝆🜲🜹🜘🝝🝳🜌🝡🝭🜹🜌🜹',
			'🝌🜃🜃🝕🝁🜘🜌🜎🝤🝍🜎🜌🜆🜍🝠🝠🜌🜎🝠🝇🜴🜎🝳🜆🝄🜴🜴🝟🝦🝡🜴🜔🜴🝄🝡🝄🝧🜴🜺🝦🜴🝄🜣🝇🝧🜴🝩🝟🝠🝤🝄🜥🜌🝦🝬🜥🜺🝇🝩🜼🜣🜌🝧🝤'
		);
	}

	/**
	 * @test
	 */
	public function similarity_foo_bar()
	{
		$this->assertEquals(0, $this->match->similarity('foo', 'bar'));
	}

	/**
	 * @test
	 */
	public function similarity_foo_bar_encrypted()
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
		$this->assertEquals(0.33, $this->match->similarity('foo', 'far'));
	}

	/**
	 * @test
	 */
	public function similarity_foo_far_encrypted()
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
		$this->assertEquals(0.67, $this->match->similarity('foo', 'for'));
	}

	/**
	 * @test
	 */
	public function similarity_foo_for_encrypted()
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
		$this->assertEquals(1, $this->match->similarity('foo', 'foo'));
	}

	/**
	 * @test
	 */
	public function similarity_foo_foo_encrypted()
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
		$this->assertEquals(0, $this->match->similarity('robert', 'susann'));
	}

	/**
	 * @test
	 */
	public function similarity_robert_susann_encrypted()
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
		$this->assertEquals(0.17, $this->match->similarity('robert', 'rusann'));
	}

	/**
	 * @test
	 */
	public function similarity_robert_rusann_encrypted()
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
		$this->assertEquals(0.33, $this->match->similarity('robert', 'rosann'));
	}

	/**
	 * @test
	 */
	public function similarity_robert_rosann_encrypted()
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
		$this->assertEquals(0.5, $this->match->similarity('robert', 'robann'));
	}

	/**
	 * @test
	 */
	public function similarity_robert_robann_encrypted()
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
		$this->assertEquals(0.67, $this->match->similarity('robert', 'robenn'));
	}

	/**
	 * @test
	 */
	public function similarity_robert_robenn_encrypted()
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
		$this->assertEquals(0.83, $this->match->similarity('robert', 'robern'));
	}

	/**
	 * @test
	 */
	public function similarity_robert_robern_encrypted()
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
		$this->assertEquals(1, $this->match->similarity('robert', 'robert'));
	}

	/**
	 * @test
	 */
	public function similarity_robert_robert_encrypted()
	{
		$robert1 = $this->crypt->encrypt('robert');
		$robert2 = $this->crypt->encrypt('robert');

		$this->assertEquals(1, $this->match->similarity($robert1, $robert2));
	}
}
