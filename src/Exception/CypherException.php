<?php

namespace FuzzyMatching\Exception;

use FuzzyMatching\Cypher;
use FuzzyMatching\Exception;

final class CypherException extends \UnexpectedValueException implements Exception
{
    protected $message;

    public function __construct() {
        $this->message = 'The plaintext exceeded the limit of ' . Cypher::MAX_LENGTH_PLAINTEXT . ' characters.';
    }
}
