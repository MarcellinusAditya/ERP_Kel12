<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'stock',
        'initial_price',
        'selling_price',
        'category',
        'barcode',
    ];

    public function logs()
    {
        return $this->hasMany(Log::class);
    }

}
