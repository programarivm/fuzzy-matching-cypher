<?php

namespace FuzzyMatching\Alphabet;

use FuzzyMatching\Alphabet;
use UnicodeRanges\Randomizer;

class MimickedAlphabet implements Alphabet
{
    private $sourceAlphabet;

    private $unicodeRanges;

    private $excludedLetters;

    private $letterFreq = [];

    public function __construct(Alphabet $sourceAlphabet, array $unicodeRanges, array $excludedLetters = [])
    {
        $this->sourceAlphabet = $sourceAlphabet;
        $this->unicodeRanges = $unicodeRanges;
        $this->excludedLetters = $excludedLetters;

        foreach ($this->sourceAlphabet->getLetterFreq() as $key => $val) {
            do {
                $char = Randomizer::printableChar($this->unicodeRanges);
            } while ($this->hasLetter($char) || in_array($char, $excludedLetters));
            $this->letterFreq[$key] = [
                'char' => $char,
                'freq' => $val,
            ];
        }
    }

    public function getLetterFreq()
    {
        return $this->letterFreq;
    }

    public function getUnicodeRanges()
    {
        return $this->unicodeRanges;
    }

    public function hasLetter($letter)
    {
        $letters = $this->letters();

        return mb_stripos(implode('', $letters), $letter) !== false;
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
}
