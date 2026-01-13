<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Order extends Model
{
    protected $fillable = [
        'amount',
        'status',
        'user_id',
        'orderable_id',
        'orderable_type',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    /**
     * Relation avec User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation polymorphique
     */
    public function orderable(): MorphTo
    {
        return $this->morphTo();
    }
}