<?php

namespace FuzzyMatching;

use UnicodeRanges\Converter;

class Multibyte
{
	public static function strSplit(string $text): array
	{
		$text = preg_replace('!\s+!', ' ', $text);
		$text = str_replace (' ', '', $text);

		return preg_split('/(?<!^)(?!$)/u', $text);
	}

	public static function strMatches(string $text1, string $text2): int
	{
		$array1 = self::arraySort(self::strSplit($text1));
		$array2 = self::arraySort(self::strSplit($text2));

		return $this->arrMatches($array1, $array2);
	}

	public function arrMatches(array $array1, array $array2)
	{
		$matches = [];
		foreach ($array1 as $key => $val) {
			if (array_key_exists($key, $array2)) {
				$array1[$key] >= $array2[$key] ? $matches[$key] = $array2[$key] : $matches[$key] = $array1[$key];
			};
		}

		return array_sum($matches);
	}

	public static function arraySort(array $chars): array
	{
		$items = [];
		foreach ($chars as $char) {
			$dec = Converter::unicode2dec($char);
			!array_key_exists($dec, $items) ? $items[$dec] = 1 : $items[$dec] += 1;
		}
		ksort($items);

		return $items;
	}
}
