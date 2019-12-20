<?php

namespace PGNChess\Cli;

use Dotenv\Dotenv;
use FuzzyMatching\Crypt;
use FuzzyMatching\Alphabet\MimickedAlphabet;
use FuzzyMatching\Alphabet\EnglishAlphabet;
use UnicodeRanges\Range\AlchemicalSymbols;
use UnicodeRanges\Range\Ethiopic;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

$foregroundAlphabet = new MimickedAlphabet(
    new EnglishAlphabet,
    getenv('FUZZY_MATCHING_FOREGROUND_ALPHABET')
);

$backgroundAlphabet = new MimickedAlphabet(
    new EnglishAlphabet,
    getenv('FUZZY_MATCHING_BACKGROUND_ALPHABET')
);

$crypt = new Crypt($foregroundAlphabet, $backgroundAlphabet);

echo $crypt->encrypt($argv[1]) . PHP_EOL;
