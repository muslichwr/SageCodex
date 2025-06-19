<?php

namespace App\Repository;

interface TransactionRepositoryInterface
{
    public function findByBookingId(string $bookingId);
    public function create(array $data);
    public function getUserTransactions(int $userId);
}

