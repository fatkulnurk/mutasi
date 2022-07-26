<?php

namespace App\Enums;

class MutationType
{
    CONST DEBIT = 'DB';
    CONST CREDIT = 'CR';

    public static function get()
    {
        $data = [
            self::DEBIT => 'Debit',
            self::CREDIT => 'Credit'
        ];

        return $data;
    }
}