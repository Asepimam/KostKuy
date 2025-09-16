<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    //
    use \Illuminate\Database\Eloquent\SoftDeletes;
    protected $fillable = [
        'boarding_house_id', 
        'photo', 
        'rating', 
        'content',
        'name'
    ];
    public function boardingHouse()
    {
        return $this->belongsTo(BoardingHouse::class);
    }
}
