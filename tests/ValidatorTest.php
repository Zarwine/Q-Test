<?php

namespace App\Tests;

use App\Services\Validator;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{
    /**
     *  public function isName(string $string): ?string
     *
     *  public function isMail(string $string): ?string
     *
     *  public function isMessage(string $string): ?string
     */

    private Validator $validator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->validator = new Validator();
    }

    public function testEmptyIsName(): void
    {
        $value = "";
        $expected = "Votre nom n'est pas valide";
        $response = $this->validator->IsName($value);
        $this->assertEquals($expected, $response);
    }

    public function testRegexErrorIsName(): void
    {
        $value = "'/>";
        $expected = "Votre nom n'est pas valide";
        $response = $this->validator->IsName($value);
        $this->assertEquals($expected, $response);
    }

    public function testSimpleStringIsName(): void
    {
        $value = "Bonjour";
        $response = $this->validator->IsName($value);
        $this->assertEquals(null, $response);
    }

    public function testEmptyIsMail(): void
    {
        $value = "";
        $expected = "Votre email n'est pas valide";
        $response = $this->validator->IsMail($value);
        $this->assertEquals($expected, $response);
    }

    public function testRegexErrorIsMail(): void
    {
        $value = "'/>";
        $expected = "Votre email n'est pas valide";
        $response = $this->validator->IsMail($value);
        $this->assertEquals($expected, $response);
    }

    public function testSimpleStringIsMail(): void
    {
        $value = "Bonjour";
        $expected = "Votre email n'est pas valide";
        $response = $this->validator->IsMail($value);
        $this->assertEquals($expected, $response);
    }

    public function testTrueEmailIsMail(): void
    {
        $value = "monmail@domaine.com";
        $response = $this->validator->IsMail($value);
        $this->assertEquals(null, $response);
    }

    public function testEmptyIsMessage(): void
    {
        $value = "";
        $expected = "Votre message n'est pas valide";
        $response = $this->validator->IsMessage($value);
        $this->assertEquals($expected, $response);
    }

    public function testRegexErrorIsMessage(): void
    {
        $value = "'/>";
        $expected = "Votre message n'est pas valide";
        $response = $this->validator->IsMessage($value);
        $this->assertEquals($expected, $response);
    }

    public function testToeShortStringIsMessage(): void
    {
        $value = "Bonjour";
        $expected = "Votre message n'est pas valide";
        $response = $this->validator->IsMessage($value);
        $this->assertEquals($expected, $response);
    }

    public function testLongMessageIsMessage(): void
    {
        $value =    "Ceci est un message de plus de 50 caractères,
                    Ceci est un message de plus de 50 caractères,
                    Ceci est un message de plus de 50 caractères, ";
        $response = $this->validator->IsMessage($value);
        $this->assertEquals(null, $response);
    }
}
