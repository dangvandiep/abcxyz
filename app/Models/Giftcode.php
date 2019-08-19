<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Giftcode extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'amount',
        'items',
        'type',
        'mail_title',
        'mail_content',
        'mail_description',
        'tag',
        'begin_time',
        'end_time',
        'user_id',
        'server_id',
        'used',
    ];

    /**
     * Get logs associated with the giftcode.
     */
    public function logs(): HasMany
    {
        return $this->hasMany(GiftcodeLog::class);
    }

    /**
     * Get the user that owns the giftcode.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
