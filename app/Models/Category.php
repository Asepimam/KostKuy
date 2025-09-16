<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    use \Illuminate\Database\Eloquent\SoftDeletes;
    protected $fillable = ['name', 'slug', 'image'];

    public function boardinghouses()
    {
        return $this->hasMany(BoardingHouse::class);
    }
}
