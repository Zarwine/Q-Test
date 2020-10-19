<?php

namespace App\Services;

class Validator
{
    public function isName(string $string): ?string
    {
        if (empty($string) || !preg_match('/^[a-zA-Z0-9- éèêë]+$/', $string)) {
            return "Votre nom n'est pas valide";
        }
        return NULL;
    }
    public function isMail(string $string): ?string
    {
        if (empty($string) || !filter_var($string, FILTER_VALIDATE_EMAIL)) {
            return "Votre email n'est pas valide";
        }
        return NULL;
    }
    public function isMessage(string $string): ?string
    {
        if (empty($string) || !preg_match("/^[a-zA-Z0-9?$@#()'!,+\-=_:.&€£*%éèêë\s]+$/", $string) || strlen($string) < 50) {
            return "Votre message n'est pas valide";
        }   
        return NULL;
    }
}
