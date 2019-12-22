<?php

namespace FuzzyMatching\Alphabet\Real;

use FuzzyMatching\Alphabet\AlphabetAbstract;

class NumbersAlphabet extends AlphabetAbstract
{
	public function __construct()
	{
		$this->calcStats();
	}

	protected function calcStats()
	{
		$this->stats = [
			'0' => null,
			'1' => null,
			'2' => null,
			'3' => null,
			'4' => null,
			'5' => null,
			'6' => null,
			'7' => null,
			'8' => null,
			'9' => null,
		];
	}
}
