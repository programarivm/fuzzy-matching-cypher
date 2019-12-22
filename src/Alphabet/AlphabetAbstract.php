<?php

namespace FuzzyMatching\Alphabet;

use FuzzyMatching\Alphabet;

abstract class AlphabetAbstract implements Alphabet
{
	protected $freq = [];

	abstract protected function calcFreq();

	public function getFreq()
	{
		return $this->freq;
	}
}
