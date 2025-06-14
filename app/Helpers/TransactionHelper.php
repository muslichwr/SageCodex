<?php

namespace App\Helpers;

use App\Models\Transaction;

class TransactionHelper
{
    public static function generateUniqueTrxId(): string
    {
        $prefix = 'SGCD';
        do {
            $randomstring = $prefix . mt_rand(100000, 999999);
        } while (Transaction::where('booking_trx_id', $randomstring)->exists());

        return $randomstring;
    }
}