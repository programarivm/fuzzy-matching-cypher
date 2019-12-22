<?php

namespace FuzzyMatching\Alphabet;

use FuzzyMatching\Alphabet;
use FuzzyMatching\Alphabet\MimickedAlphabet;

class FuzzyAlphabet
{
	private $unicodeRanges;

	private $foreground;

	private $background;

	public function __construct(Alphabet $alphabet)
	{
		// a random selection of printable unicode ranges
		$this->unicodeRanges = [
			new \UnicodeRanges\Range\AlchemicalSymbols,
			new \UnicodeRanges\Range\AncientGreekNumbers,
			new \UnicodeRanges\Range\Arabic,
			new \UnicodeRanges\Range\ArabicSupplement,
			new \UnicodeRanges\Range\Arrows,
			new \UnicodeRanges\Range\BlockElements,
			new \UnicodeRanges\Range\BoxDrawing,
			new \UnicodeRanges\Range\BraillePatterns,
			new \UnicodeRanges\Range\CombiningDiacriticalMarks,
			new \UnicodeRanges\Range\Cherokee,
			new \UnicodeRanges\Range\CJKCompatibility,
			new \UnicodeRanges\Range\CJKCompatibilityForms,
			new \UnicodeRanges\Range\CJKSymbolsAndPunctuation,
			new \UnicodeRanges\Range\CJKUnifiedIdeographs,
			new \UnicodeRanges\Range\CJKUnifiedIdeographsExtensionA,
			new \UnicodeRanges\Range\Emoticons,
			new \UnicodeRanges\Range\GeometricShapes,
			new \UnicodeRanges\Range\HangulJamo,
			new \UnicodeRanges\Range\IpaExtensions,
			new \UnicodeRanges\Range\Kanbun,
			new \UnicodeRanges\Range\Katakana,
			new \UnicodeRanges\Range\KatakanaPhoneticExtensions,
			new \UnicodeRanges\Range\KayahLi,
			new \UnicodeRanges\Range\KhmerSymbols,
			new \UnicodeRanges\Range\LatinExtendedA,
			new \UnicodeRanges\Range\LatinExtendedB,
			new \UnicodeRanges\Range\LatinExtendedC,
			new \UnicodeRanges\Range\LetterlikeSymbols,
			new \UnicodeRanges\Range\Lisu,
			new \UnicodeRanges\Range\MathematicalOperators,
			new \UnicodeRanges\Range\MiscellaneousMathematicalSymbolsA,
			new \UnicodeRanges\Range\MiscellaneousMathematicalSymbolsB,
			new \UnicodeRanges\Range\MiscellaneousSymbols,
			new \UnicodeRanges\Range\MiscellaneousSymbolsAndPictographs,
			new \UnicodeRanges\Range\MiscellaneousTechnical,
			new \UnicodeRanges\Range\ModifierToneLetters,
			new \UnicodeRanges\Range\OrnamentalDingbats,
			new \UnicodeRanges\Range\PhoneticExtensions,
			new \UnicodeRanges\Range\PhoneticExtensionsSupplement,
			new \UnicodeRanges\Range\SpacingModifierLetters,
			new \UnicodeRanges\Range\SupplementalArrowsA,
			new \UnicodeRanges\Range\SupplementalArrowsB,
			new \UnicodeRanges\Range\Tibetan,
			new \UnicodeRanges\Range\Ugaritic,
			new \UnicodeRanges\Range\UnifiedCanadianAboriginalSyllabics,
			new \UnicodeRanges\Range\YijingHexagramSymbols,
		];

		shuffle($this->unicodeRanges);

		$this->foreground = new MimickedAlphabet($alphabet, array_slice($this->unicodeRanges, 0, 22));
		$this->background = new MimickedAlphabet($alphabet, array_slice($this->unicodeRanges, 23, 45));

		file_put_contents(__DIR__.'/../../.fuzzy-alphabet', serialize($this));
	}

	public function getForeground()
	{
		return $this->foreground;
	}

	public function getBackground()
	{
		return $this->background;
	}
}
