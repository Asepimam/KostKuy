<?php

namespace App\Repositories;

use App\Interfaces\TransactionRepositoryInterface;
use App\Models\Transaction;

class TransactionRepository implements TransactionRepositoryInterface {
    public function all()
    {
     return Transaction::all();
    }

    public function find($id)
    {
        return Transaction::find($id);
    }

    public function create(array $data)
    {
        return Transaction::create($data);
    }

    public function update($id, array $data)
    {
        $transaction = Transaction::find($id);
        if($transaction){
            $transaction->update($data);
            return $transaction;
        }
        return null;
    }

    public function delete($id)
    {
        $transaction = Transaction::find($id);
        if($transaction){
            return $transaction->delete();
        }
        return null;
    }

    public function findBooking($bookingId=null, $email = null, $phone = null)
    {
        $query = Transaction::query();
        if($bookingId){
            $query->where('id', $bookingId);
        }
        if($email){
            $query->where('email', $email);
        }
        if($phone){
            $query->where('phone', $phone);
        }
        return $query->first();
    }
}