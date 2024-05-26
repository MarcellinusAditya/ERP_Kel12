<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Log extends Model
{
    use HasFactory;

    protected $table='logs';

    protected $fillable = [
        'product_id',
        'status',
        'stock',
        'nota',
        'user_id',
        'description',
        'final_stock'
    ];

    public function Product():BelongsTo
    {
        return $this->belongsTo(Product::class, "product_id");
    }

    public function User():BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
