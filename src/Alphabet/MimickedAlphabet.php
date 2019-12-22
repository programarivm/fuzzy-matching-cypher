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

        $this->calcStats();
    }

    public function getUnicodeRanges()
    {
        return $this->unicodeRanges;
    }

    protected function calcStats()
    {
        foreach ($this->alphabet->getStats() as $key => $val) {
            $chars = [];
            for ($i = 0; $i < Cypher::LENGTH_TOTAL * 4; $i++) {
                do {
                    $char = Randomizer::printableChar($this->unicodeRanges);
                } while (in_array($char, $this->letters) || in_array($char, $this->excludedLetters));
                $chars[] = $char;
                $this->letters[] = $char;
            }
            $this->stats[$key] = [
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

    public function decode(string $str)
    {
        $decoded = '';
        foreach (Multibyte::strSplit($str) as $char) {
            foreach ($this->stats as $key => $val) {
                if (in_array($char, $val['chars'])) {
                    $decoded .= $key;
                    break;
                }
            }
        }

        return $decoded;
    }
}
