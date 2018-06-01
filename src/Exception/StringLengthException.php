<?php

namespace FuzzyMatching\Exception;

use FuzzyMatching\Exception;

final class StringLengthException extends \UnexpectedValueException implements Exception
{
    private $limit;

    protected $message;

    public function __construct(int $limit) {
        $this->limit = $limit;
        $this->message = "The string exceeded de limit of $this->limit characters.";
    }
}
