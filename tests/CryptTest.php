<?php

namespace FuzzyMatching\Tests;

use FuzzyMatching\Crypt;
use FuzzyMatching\Exception\CryptException;
use PHPUnit\Framework\TestCase;

class CryptTest extends TestCase
{
	/**
	 * @test
	 */
	public function encrypt_throw_exception()
	{
		$this->expectException(CryptException::class);
		$crypt = new Crypt;
		$cipher = $crypt->encrypt('foooooooooooooooooooooooooooooooo');
	}

	/**
	 * @test
	 */
	public function encrypt_with_persisted_alphabets()
	{
		// TODO: read persisted alphabets
		$alphabets = 'todo';
		$crypt = new Crypt($alphabets);

		$this->assertTrue(false);
	}
}
