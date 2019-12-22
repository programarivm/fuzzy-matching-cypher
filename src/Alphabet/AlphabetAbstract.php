<?php

namespace FuzzyMatching\Alphabet;

use FuzzyMatching\Alphabet;

abstract class AlphabetAbstract implements Alphabet
{
	protected $stats = [];

	abstract protected function calcStats();

	public function getStats()
	{
		return $this->stats;
	}
}
