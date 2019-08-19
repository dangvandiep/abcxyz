<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MobileCard extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'price',
        'bonus',
        'revenue',
        'status',
        'serial',
        'pin',
        'type',
        'gate',
        'user_id',
        'server_id',
        'character_id',
        'note',
    ];

    /**
     * Get the user that owns the mobile card transaction.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
