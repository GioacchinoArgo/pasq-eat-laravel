<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['restaurant_id', 'name', 'lastname', 'email', 'address', 'phone', 'total'];

    public function dishes()
    {
        return $this->belongsToMany(Dish::class);
    }
}
