<?php

namespace App\Observers;

use App\Helpers\TransactionHelper;
use App\Models\Transaction;

class TranscationObserver
{
    //

    public function creating(Transaction $transaction)
    {
        $transaction->booking_trx_id = TransactionHelper::generateUniqueTrxId();
    }
    
    public function created(Transaction $transaction)
    {

    }

    public function updated(Transaction $transaction)
    {

    }

    public function deleted(Transaction $transaction)
    {

    }

    public function restored(Transaction $transaction)
    {

    }

    public function forceDeleted(Transaction $transaction)
    {

    }
}
