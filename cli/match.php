<?php

namespace PGNChess\Cli;

use Dotenv\Dotenv;
use FuzzyMatching\Crypt;
use FuzzyMatching\Match;
use FuzzyMatching\Alphabet\FuzzyAlphabet;
use FuzzyMatching\Alphabet\EnglishAlphabet;
use FuzzyMatching\Alphabet\MimickedAlphabet;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

$alphabet = new EnglishAlphabet;

$foreground = new MimickedAlphabet(
    $alphabet,
    getenv('FUZZY_MATCHING_FOREGROUND_ALPHABET')
);

$background = new MimickedAlphabet(
    $alphabet,
    getenv('FUZZY_MATCHING_BACKGROUND_ALPHABET')
);

$fuzzyAlphabet = new FuzzyAlphabet($foreground, $background);

$crypt = new Crypt($fuzzyAlphabet);
$match = new Match($fuzzyAlphabet);

$a = $crypt->encrypt($argv[1]);
$b = $crypt->encrypt($argv[2]);

$result = [
    $argv[1] => $a,
    $argv[2] => $b,
    'similarity' => $match->similarity($a, $b)
];

print_r($result);
