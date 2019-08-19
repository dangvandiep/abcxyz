<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GiftcodeLog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'giftcode_id',
        'user_id',
        'character_id',
        'server_id',
    ];

    /**
     * Get the giftcode that owns the log.
     */
    public function giftcode(): BelongsTo
    {
        return $this->belongsTo(Giftcode::class);
    }

    /**
     * Get the user that owns the log.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
