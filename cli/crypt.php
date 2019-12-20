<?php

namespace PGNChess\Cli;

use Dotenv\Dotenv;
use FuzzyMatching\Crypt;
use FuzzyMatching\Alphabet\FuzzyAlphabet;
use FuzzyMatching\Alphabet\MimickedAlphabet;
use FuzzyMatching\Alphabet\EnglishAlphabet;

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

echo $crypt->encrypt($argv[1]) . PHP_EOL;
