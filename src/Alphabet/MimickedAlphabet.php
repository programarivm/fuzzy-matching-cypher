<?php

namespace FuzzyMatching\Alphabet;

use FuzzyMatching\Alphabet;
use FuzzyMatching\Cypher;
use FuzzyMatching\Multibyte;
use FuzzyMatching\Exception\MimickedAlphabetException;
use UnicodeRanges\Randomizer;

class MimickedAlphabet extends AlphabetAbstract
{
    private $alphabet;

    private $unicodeRanges;

    private $excludedLetters;

    private $letters;

    public function __construct(Alphabet $alphabet, array $unicodeRanges, array $excludedLetters = [])
    {
        $this->alphabet = $alphabet;
        $this->unicodeRanges = $unicodeRanges;
        $this->excludedLetters = $excludedLetters;
        $this->letters = [];

        $this->calcFreq();
    }

    public function getUnicodeRanges()
    {
        return $this->unicodeRanges;
    }

    protected function calcFreq()
    {
        foreach ($this->alphabet->getFreq() as $key => $val) {
            $chars = [];
            for ($i = 0; $i < Cypher::LENGTH_TOTAL; $i++) {
                do {
                    $char = Randomizer::printableChar($this->unicodeRanges);
                } while (in_array($char, $this->letters) || in_array($char, $this->excludedLetters));
                $chars[] = $char;
                $this->letters[] = $char;
            }
            $this->freq[$key] = [
               'chars' => $chars,
               'freq' => $val,
           ];
        }
    }

    public function letters()
    {
        return $this->letters;
    }

    public function randLetter()
    {
        shuffle($this->letters);

        return $this->letters[0];
    }
}
