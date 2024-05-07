<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Product extends Model
{
    use HasFactory;

    protected $table='product';
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

    public function Logs():HasMany
    {
        return $this->hasMany(Log::class, "product_id");
    }

}
