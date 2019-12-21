<?php

namespace FuzzyMatching\Tests;

use FuzzyMatching\Crypt;
use FuzzyMatching\Match;
use PHPUnit\Framework\TestCase;

class MatchTest extends TestCase
{
	private $match;

	private $crypt;

	public function __construct()
	{
		$fuzzyAlphabet = unserialize(file_get_contents(__DIR__ .'/.fuzzy-alphabet'));
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

	/**
	 * @test
	 */
	public function similarity_stjohnrd_stjohnroad()
	{
		$this->assertEquals(0.89, $this->match->similarity('stjohnrd', 'stjohnroad'));
	}

	/**
	 * @test
	 */
	public function similarity_stjohnrd_stjohnrd()
	{
		$this->assertEquals(1, $this->match->similarity('stjohnrd', 'stjohnrd'));
	}

	/**
	 * @test
	 */
	public function similarity_stjohnroad_stjohnroad()
	{
		$this->assertEquals(1, $this->match->similarity('stjohnroad', 'stjohnroad'));
	}

	/**
	 * @test
	 */
	public function similarity_stjohnrd_stjohnroad_async_encrypted()
	{
		$this->assertEquals(0.89, $this->match->similarity(
			'࿈🜑؞🜁࿔🜣🜙🜁࿈🝠🜣࿔🜄🝆༡🜙🝞🝠🝟༓🝟🜀🝢🝙ཤ࿈🜰འ🜓ᇊڠᇔ🜑༳༳ཤ༳🝠🜣🝟🝙༳🝠ཤའ🜜༳𐤒༓ᆄ🜀࿔𐤌🜙🝠🜀🝢🝙🝟🜜🜣𐤏🜄࿈',
			'🜣ཋ🜀༳؞འ🜄࿔🜑🜁🜰འ🝠🝙🜣ཋ🝟༳༥🜰𐤏🝆🜰ཋᆄ🜄࿋ڠ🜜🜰𐤒🜑࿔🜄𐤍🜜🝙🜓🝠𐤌࿈🜣ཋ🜄འᇔ༓ᇊཋ🝆ᇊ🜣🜰འ🜑🝙🜰🜣🜓🜁༡ཋ🜜ཤ'
		));
	}

	/**
	 * @test
	 */
	public function similarity_stjohnrd_stjohnrd_async_encrypted()
	{
		$this->assertEquals(1, $this->match->similarity(
			'༥🜣༡ᆄ🝆༳🜑🜣🝙🝞༡🜰འ༥༥🝆ཋ༡🜣🜣༓🜣🜜🝙🜓࿔🝟🝆༡🜙ᇔ🝞ཤ࿔🝙؞🜓࿔ᇊڠཎ🜓🝠🝢🜙🝠🝙࿔🜁🜣𐤏࿈འ🝞𐤒🜜𐤌࿈🜣🜓🜣🜄༓ཎ',
			'🜓🝞ཤ🜙؞🜰🜓🜑🝢࿋🜄🝟🜰༓🜄ᆄ🜣🜰🜜࿈🜜🝆🜣༡༳🝞🝢࿋🝙🝞🜜༳༳🜀𐤌🜀࿔🜀🜄🝟༳ڠ🜁🜰🝞ཎ🝞🝟࿈𐤒ᇊ🜀🜣🜣🝢ཋཋᇔ🝢𐤏༡ཤ🜙🝆'
		));
	}

	public function similarity_stjohnroad_stjohnroad_async_encrypted()
	{
		$this->assertEquals(1, $this->match->similarity(
			'ཎ🝆🜜ཤ🝙࿔𐤒🝆🜜🝟🝞༡ᇔ༡🝢🝢༡༡🜜🜓𐤌🜰ཤ༡🜓ڠᇊ࿔ཤ🜀🜀༓🜙འཤ𐤍🜁🜙༡ཎ🜄؞🝆🜀ᆄ🜙ཎཎཋའ🝙🜜ཎᇊ🝙ཤ🝟࿋𐤏🜣འ🜀འཤ',
			'🜰🜑🝆🝞🝠ᆄᇊ𐤍𐤏࿔🜄࿋🜁🝠🜑🜰ཎཋཋ🜑༳𐤌🝠🝢༓༓࿔🜑ཤ🝞ཤ🜓🝆࿔🜙🜑🜓འڠ🝞🝆🝢༡🝆࿔🜰ཤ🝢𐤒འ༓ᇔ࿋؞༳࿔🜄ཋᇊ🝟༡🜑🜓🜑'
		));
	}
}
