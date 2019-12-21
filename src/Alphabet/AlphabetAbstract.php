<?php

namespace FuzzyMatching\Alphabet;

use FuzzyMatching\Alphabet;

abstract class AlphabetAbstract implements Alphabet
{
	protected $letterFreq = [];

	abstract protected function calcLetterFreq();

	public function getLetterFreq()
	{
		return $this->letterFreq;
	}

	public function letters()
    {
        $letters = array_map(
            function ($char) {
                return $char['char'];
            },
            $this->letterFreq
        );

        return array_values($letters);
    }

    public function randLetter()
    {
        $rand = rand(0, count($this->letters()) - 1);
        $letter = $this->letters()[$rand];

        return $letter;
    }

	public function hasLetter(string $letter)
	{
		return mb_stripos(implode('', $this->letters()), $letter) !== false;
	}
}
