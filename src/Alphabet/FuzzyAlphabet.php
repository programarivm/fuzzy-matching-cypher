<?php

namespace FuzzyMatching\Alphabet;

use FuzzyMatching\Alphabet;
use FuzzyMatching\Alphabet\MimickedAlphabet;

class FuzzyAlphabet
{
	private $foreground;

	private $background;

	public function __construct(Alphabet $alphabet)
	{
		$this->foreground = new MimickedAlphabet($alphabet, getenv('FUZZY_MATCHING_FOREGROUND_ALPHABET'));
		$this->background = new MimickedAlphabet($alphabet, getenv('FUZZY_MATCHING_FOREGROUND_ALPHABET'));

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
