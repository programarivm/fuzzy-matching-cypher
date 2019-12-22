<?php

namespace FuzzyMatching\Alphabet;

use FuzzyMatching\Alphabet;
use FuzzyMatching\Alphabet\MimickedAlphabet;
use UnicodeRanges\PowerRanges;

class FuzzyAlphabet
{
	private $foreground;

	private $background;

	public function __construct(Alphabet $alphabet)
	{
		$unicodeRanges = (new PowerRanges)->ranges();
		shuffle($unicodeRanges);
		$this->foreground = new MimickedAlphabet($alphabet, array_slice($unicodeRanges, 0, 127));
		$this->background = new MimickedAlphabet($alphabet, array_slice($unicodeRanges, 128, 254));
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
