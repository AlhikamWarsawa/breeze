<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_cat',
        'desc_cat',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(product::class);
    }
}
