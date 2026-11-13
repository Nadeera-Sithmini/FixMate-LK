<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category',
        'description',
        'base_price',
        'estimated_duration',
        'image',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'base_price' => 'decimal:2',
            'estimated_duration' => 'integer',
            'is_active' => 'boolean',
        ];
    }
}
