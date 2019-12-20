<?php

namespace FuzzyMatching\Alphabet;

use FuzzyMatching\Alphabet;
use FuzzyMatching\Exception\MimickedAlphabetException;
use UnicodeRanges\Randomizer;

class MimickedAlphabet extends AlphabetAbstract
{
    private $sourceAlphabet;

    private $unicodeRanges = [];

    private $excludedLetters;

    public function __construct(Alphabet $sourceAlphabet, string $items, array $excludedLetters = [])
    {
        $items = explode(',', $items);

        foreach ($items as $item) {
            $unicodeRange = "\UnicodeRanges\Range\\$item";
            if (!class_exists($unicodeRange)) {
                throw new MimickedAlphabetException(
                    "Whoops! The $unicodeRange class does not exist."
                );
            }
            $this->unicodeRanges[] = new $unicodeRange();
        }

        if (($this->availableChars($this->unicodeRanges) - count($excludedLetters)) < count($sourceAlphabet->getLetterFreq())) {
            throw new MimickedAlphabetException(
                'Whoops! The are not enough Unicode characters left to mimic the source alphabet.'
            );
        }

        $this->sourceAlphabet = $sourceAlphabet;
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

    private function availableChars($unicodeRanges) {
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
