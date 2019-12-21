<?php

namespace FuzzyMatching\Cli;

use FuzzyMatching\Crypt;
use FuzzyMatching\Match;

require_once __DIR__ . '/../vendor/autoload.php';

$fuzzyAlphabet = unserialize(file_get_contents(__DIR__ . '/../.fuzzy-alphabet'));

$crypt = new Crypt($fuzzyAlphabet);
$match = new Match($fuzzyAlphabet);

$a = $crypt->encrypt($argv[1]);
$b = $crypt->encrypt($argv[2]);

echo "{$argv[1]}: $a" . PHP_EOL;
echo "{$argv[2]}: $b" . PHP_EOL;
echo 'Similarity: ' . $match->similarity($a, $b) . PHP_EOL;
