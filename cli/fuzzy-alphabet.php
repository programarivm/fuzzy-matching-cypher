<?php

namespace FuzzyMatching\Cli;

use FuzzyMatching\Alphabet\EnglishAlphabet;
use FuzzyMatching\Alphabet\FuzzyAlphabet;

require_once __DIR__ . '/../vendor/autoload.php';

$english = new EnglishAlphabet;

new FuzzyAlphabet($english);
