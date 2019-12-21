<?php

namespace FuzzyMatching\Cli;

use Dotenv\Dotenv;
use FuzzyMatching\Alphabet\EnglishAlphabet;
use FuzzyMatching\Alphabet\FuzzyAlphabet;
use FuzzyMatching\Alphabet\MimickedAlphabet;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

$alphabet = new EnglishAlphabet;

$foreground = new MimickedAlphabet($alphabet, getenv('FUZZY_MATCHING_FOREGROUND_ALPHABET'));
$background = new MimickedAlphabet($alphabet, getenv('FUZZY_MATCHING_BACKGROUND_ALPHABET'));

$fuzzyAlphabet = new FuzzyAlphabet($foreground, $background);

file_put_contents('.fuzzy-alphabet', serialize($fuzzyAlphabet));
