<?php

namespace App\Models;

use Bavix\Wallet\Traits\HasWallet;
use Bavix\Wallet\Interfaces\Wallet;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements Wallet
{
    use Notifiable, HasWallet;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'password_strength',
        'api_token',
        'is_active',
        'banned_to',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'password_strength',
        'api_token',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active'         => 'boolean',
        'banned_to'         => 'datetime',
    ];

    /**
     * Get the phone associated with the user.
     */
    public function phone(): HasOne
    {
        return $this->hasOne(PhoneNumber::class);
    }

    /**
     * Get the profile associated with the user.
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Get social accounts associated with the user.
     */
    public function socialAccounts(): HasMany
    {
        return $this->hasMany(SocialAccount::class);
    }

    /**
     * Get authentication logs associated with the user.
     */
    public function authenticationLogs(): HasMany
    {
        return $this->hasMany(AuthenticationLog::class);
    }

    /**
     * Get mobile card transactions associated with the user.
     */
    public function mobileCards(): HasMany
    {
        return $this->hasMany(MobileCard::class);
    }

    /**
     * Get withdraw transactions associated with the user.
     */
    public function withdraws(): HasMany
    {
        return $this->hasMany(Withdraw::class);
    }

    /**
     * Get giftcodes associated with the user.
     */
    public function giftcodes(): HasMany
    {
        return $this->hasMany(Giftcode::class);
    }

    /**
     * Get giftcode logs associated with the user.
     */
    public function giftcodeLogs(): HasMany
    {
        return $this->hasMany(GiftcodeLog::class);
    }
}
