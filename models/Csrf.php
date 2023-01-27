<?php

class Csrf
{
    private static function generateToken()
    {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = base64_encode(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
    public function csrfField()
    {
        return '<input type="hidden" name="csrf_token" value="' . self::generateToken() . '">';   
    }
}
