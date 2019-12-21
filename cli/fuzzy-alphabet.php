<?php

namespace FuzzyMatching\Cli;

use Dotenv\Dotenv;
use FuzzyMatching\Alphabet\EnglishAlphabet;
use FuzzyMatching\Alphabet\FuzzyAlphabet;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

$english = new EnglishAlphabet;

new FuzzyAlphabet($english);
