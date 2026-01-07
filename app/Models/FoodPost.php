<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodPost extends Model
{
    protected $fillable = [
        'food_name',
        'location',
        'quantity',
        'status',
        'user_id',
        'reserved_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reserver()
    {
        return $this->belongsTo(User::class, 'reserved_by');
    }
}
