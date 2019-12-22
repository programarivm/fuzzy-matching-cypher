<?php

namespace FuzzyMatching\Alphabet;

use FuzzyMatching\Alphabet;
use FuzzyMatching\Alphabet\MimickedAlphabet;
use UnicodeRanges\PowerRanges;

class FuzzyAlphabet
{
	private $unicodeRanges;

	private $foreground;

	private $background;

	public function __construct(Alphabet $alphabet)
	{
		// get 255 unicode ranges
		$this->unicodeRanges = (new PowerRanges)->ranges();
		shuffle($this->unicodeRanges);
		$this->foreground = new MimickedAlphabet($alphabet, array_slice($this->unicodeRanges, 0, 127));
		$this->background = new MimickedAlphabet($alphabet, array_slice($this->unicodeRanges, 128, 254));

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
