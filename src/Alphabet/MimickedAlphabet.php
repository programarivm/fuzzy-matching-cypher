<?php

namespace FuzzyMatching\Alphabet;

use FuzzyMatching\Alphabet;
use FuzzyMatching\Exception\MimickedAlphabetException;
use UnicodeRanges\Randomizer;

class MimickedAlphabet extends AlphabetAbstract
{
    private $alphabet;

    private $unicodeRanges;

    private $excludedLetters;

    public function __construct(Alphabet $alphabet, array $unicodeRanges, array $excludedLetters = [])
    {
        if (($this->availableChars($unicodeRanges) - count($excludedLetters)) < count($alphabet->getLetterFreq())) {
            throw new MimickedAlphabetException('Whoops! There are no characters left to mimic the alphabet.');
        }

        $this->alphabet = $alphabet;
        $this->unicodeRanges = $unicodeRanges;
        $this->excludedLetters = $excludedLetters;

        $this->calcLetterFreq();
    }

    public function getUnicodeRanges()
    {
        return $this->unicodeRanges;
    }

    protected function calcLetterFreq()
    {
        foreach ($this->alphabet->getLetterFreq() as $key => $val) {
            do {
                $char = Randomizer::printableChar($this->unicodeRanges);
            } while ($this->hasLetter($char) || in_array($char, $this->excludedLetters));

            $this->letterFreq[$key] = [
                'char' => $char,
                'freq' => $val,
            ];
        }
    }

    private function availableChars(array $unicodeRanges) {
        $availableChars = 0;
        foreach ($unicodeRanges as $unicodeRange) {
            foreach ($unicodeRange->chars() as $char) {
                if (preg_match('/(\p{L}|\p{N}|\p{P}|\p{S})/u', $char)) {
                    $availableChars += 1;
                }
            }
        }

        return $availableChars;
    }
}
