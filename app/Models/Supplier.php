<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Supplier extends Model
{
    use HasFactory;

    protected $table='supplier';
    
    protected $fillable = [
        'name',
        'alamat',
        'no_telepon',
        'email',
    ];

    public function Logs():HasMany
    {
        return $this->hasMany(Log::class, "supplier_id");
    }

}
