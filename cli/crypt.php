<?php

namespace FuzzyMatching\Cli;

use FuzzyMatching\Crypt;

require_once __DIR__ . '/../vendor/autoload.php';

$fuzzyAlphabet = unserialize(file_get_contents(__DIR__ . '/../.fuzzy-alphabet'));

$crypt = new Crypt($fuzzyAlphabet);

echo $crypt->encrypt($argv[1]) . PHP_EOL;
