<?php

namespace App\Interfaces;

interface TransactionRepositoryInterface extends BaseRepositoryInterface
{
    // You can add transaction-specific methods here if needed
    // find booking with id bookingId
    public function findBooking($bookingId = null, $email = null, $phone = null);
}