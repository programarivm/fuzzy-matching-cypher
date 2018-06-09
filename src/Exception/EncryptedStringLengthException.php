<?php

namespace FuzzyMatching\Exception;

use FuzzyMatching\Exception;

final class EncryptedStringLengthException extends \UnexpectedValueException implements Exception
{
    private $limit;

    protected $message;

    public function __construct(int $limit) {
        $this->limit = $limit;
        $this->message = "The encrypted string exceeded de limit of $this->limit characters.";
    }
}
