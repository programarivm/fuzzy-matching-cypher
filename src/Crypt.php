<?php

namespace FuzzyMatching;

use FuzzyMatching\Alphabet\FuzzyAlphabet;
use FuzzyMatching\Exception\CypherException;
use FuzzyMatching\Exception\MimickedAlphabetException;
use UnicodeRanges\Randomizer;
use UnicodeRanges\Utils\Multibyte;

class Crypt
{
	private $fuzzyAlphabet;

	public function __construct(FuzzyAlphabet $fuzzyAlphabet)
	{
		$this->fuzzyAlphabet = $fuzzyAlphabet;
	}

	public function getFuzzyAlphabet()
	{
		return $this->fuzzyAlphabet;
	}

	public function encrypt(string $str)
	{
		if (mb_strlen($str) > Cypher::MAX_LENGTH_PLAINTEXT) {
			throw new CypherException();
		}

		$cipher = '';
		$chars = str_split($str);
		foreach ($chars as $char) {
			$cipher .= $this->fuzzyAlphabet->getForeground()->getStats()[$char]['chars'][rand(0,Cypher::LENGTH_TOTAL-1)];
		}

		$array = Multibyte::strSplit($cipher.$this->fillBackground($cipher));
		shuffle($array);

		return implode('', $array);
	}

	private function fillBackground(string $cipher)
	{
		$background = '';
		$length = Cypher::LENGTH_TOTAL - mb_strlen($cipher);
		for ($i = 1; $i <= $length; $i++) {
			$background .= $this->fuzzyAlphabet->getBackground()->randLetter();
		}

		return $background;
	}

	public function writeSecret($filepath = null)
	{
		$foreground = [];
        foreach ($this->fuzzyAlphabet->getForeground()->getStats() as $key => $value) {
            $foreground[] = $value['chars'];
        }

        $background = [];
        foreach ($this->fuzzyAlphabet->getBackground()->getStats() as $key => $value) {
            $background[] = $value['chars'];
        }

        shuffle($foreground);
        shuffle($background);

        $secret = (object) [
            'foreground' => $foreground,
            'background' => $background,
        ];

		$filepath == null ? $filepath = __DIR__.'/../.fuzzy-matching-secret' : false;

        file_put_contents($filepath, serialize($secret));
	}
}
