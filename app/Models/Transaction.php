<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model

{
    //
    use \Illuminate\Database\Eloquent\SoftDeletes;
    protected $fillable = [
        'code',
        'boarding_house_id',
        'room_id',
        'name',
        'email',
        'phone_number',
        'payment_method',
        'status',
        'start_date',
        'total_amount',
        'transaction_date',
        'duration',
    ];

    public function boardingHouse()
    {
        return $this->belongsTo(BoardingHouse::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
