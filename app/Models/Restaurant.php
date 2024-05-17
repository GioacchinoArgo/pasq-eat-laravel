<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['restaurant_name', 'address', 'phone', 'vat', 'image'];

    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function getFormattedDate($column, $format = 'd-m-Y')
    {
        return Carbon::create($this->$column)->format($format);
    }

    // Accessor
    public function image(): Attribute
    {
        return Attribute::make(fn ($value) => $value && app('request')->is('api/*') ? url('storage/' . $value) : $value);
    }
}
