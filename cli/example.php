<?php

namespace FuzzyMatching\Cli;

use FuzzyMatching\Crypt;
use FuzzyMatching\Match;
use FuzzyMatching\Alphabet\FuzzyAlphabet;
use FuzzyMatching\Alphabet\Real\EnglishAlphabet;

echo 'This will generate a new fuzzy matching secret and the previous data will be lost.' . PHP_EOL;
echo 'Do you want to proceed? (y/n): ';
$handle = fopen ('php://stdin','r');
$line = fgets($handle);
if (trim($line) != 'Y' && trim($line) != 'y') {
    exit;
}
fclose($handle);

require_once __DIR__ . '/../vendor/autoload.php';

$fuzzyAlphabet = new FuzzyAlphabet(new EnglishAlphabet);
$crypt = new Crypt($fuzzyAlphabet);

$crypt->writeSecret(); // generates a new .fuzzy-matching-secret file

$secret = unserialize(file_get_contents(__DIR__ . '/../.fuzzy-matching-secret'));
$match = new Match($secret);

$pairs = [
    ['foo', 'foo'],
    ['foo', 'bar'],
    ['foo', 'for'],
    ['stjohnst', 'stjohnstreet'],
    ['stjohnst', 'saintjohnst'],
];

foreach ($pairs as $pair) {
    $a = $crypt->encrypt($pair[0]);
    $b = $crypt->encrypt($pair[1]);
    echo "{$pair[0]} is $a" . PHP_EOL;
    echo "{$pair[1]} is $b" . PHP_EOL;
    echo 'Similarity ' . $match->similarity($a, $b) . PHP_EOL;
    echo '---------------------------------------------------------------------------------------------' . PHP_EOL;
}
