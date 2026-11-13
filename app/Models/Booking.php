<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'service_id',
        'appliance_name',
        'problem_description',
        'booking_date',
        'booking_time',
        'address',
        'city',
        'phone',
        'status',
        'estimated_cost',
    ];

    protected function casts(): array
    {
        return [
            'booking_date' => 'date',
            'estimated_cost' => 'decimal:2',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
