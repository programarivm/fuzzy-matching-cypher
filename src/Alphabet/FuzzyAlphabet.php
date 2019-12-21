<?php

namespace FuzzyMatching\Alphabet;

use FuzzyMatching\Alphabet\MimickedAlphabet;

class FuzzyAlphabet
{
	private $foreground;

	private $background;

	public function __construct(MimickedAlphabet $foreground, MimickedAlphabet $background)
	{
		$this->foreground = $foreground;
		$this->background = $background;

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
