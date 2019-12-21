<?php

namespace FuzzyMatching\Alphabet;

use FuzzyMatching\Alphabet;
use FuzzyMatching\Alphabet\MimickedAlphabet;

class FuzzyAlphabet
{
	private $unicodeRanges;

	private $foreground;

	private $background;

	public function __construct(Alphabet $alphabet)
	{
		// a random selection of printable unicode ranges
		$this->unicodeRanges = [
			new \UnicodeRanges\Range\AegeanNumbers,
			new \UnicodeRanges\Range\AlchemicalSymbols,
			new \UnicodeRanges\Range\AncientGreekMusicalNotation,
			new \UnicodeRanges\Range\Arabic,
			new \UnicodeRanges\Range\Armenian,
			new \UnicodeRanges\Range\Cherokee,
			new \UnicodeRanges\Range\Coptic,
			new \UnicodeRanges\Range\EgyptianHieroglyphs,
			new \UnicodeRanges\Range\Ethiopic,
			new \UnicodeRanges\Range\HangulJamo,
			new \UnicodeRanges\Range\Hebrew,
			new \UnicodeRanges\Range\Hiragana,
			new \UnicodeRanges\Range\Kanbun,
			new \UnicodeRanges\Range\LetterlikeSymbols,
			new \UnicodeRanges\Range\Runic,
			new \UnicodeRanges\Range\Ugaritic,
		];

		shuffle($this->unicodeRanges);

		$this->foreground = new MimickedAlphabet($alphabet, array_slice($this->unicodeRanges, 0, 4));
		$this->background = new MimickedAlphabet($alphabet, array_slice($this->unicodeRanges, 5, 9));

		file_put_contents(__DIR__.'/../../.fuzzy-alphabet', serialize($this));
	}

	public function getForeground()
	{
		return $this->foreground;
	}

	public function getBackground()
	{
		return $this->background;
	}
}
