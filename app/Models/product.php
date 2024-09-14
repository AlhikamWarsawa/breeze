<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name_prod',
        'image',
        'desc_prod',
        'price',
        'stock',
    ];

    public function categories(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }
}
