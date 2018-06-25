<?php

namespace FuzzyMatching\Alphabet;

use FuzzyMatching\Alphabet;

class AlphabetAbstract implements Alphabet
{
	protected $letterFreq = [];

	public function getLetterFreq() {
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
        // TODO look at the letter frequency
        $rand = rand(0, count($this->letters()) - 1);
        $letter = $this->letters()[$rand];

        return $letter;
    }
}
