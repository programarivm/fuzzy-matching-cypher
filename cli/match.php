<?php

namespace PGNChess\Cli;

use Dotenv\Dotenv;
use FuzzyMatching\Crypt;
use FuzzyMatching\Match;
use FuzzyMatching\Alphabet\EnglishAlphabet;
use FuzzyMatching\Alphabet\MimickedAlphabet;

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
$match = new Match($foregroundAlphabet, $backgroundAlphabet);

$a = $crypt->encrypt($argv[1]);
$b = $crypt->encrypt($argv[2]);

$result = [
    $argv[1] => $a,
    $argv[2] => $b,
    'similarity' => $match->similarity($a, $b)
];

print_r($result);
