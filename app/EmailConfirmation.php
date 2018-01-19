<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class EmailConfirmation extends Model
{
    protected $dates = ['expires_at'];

    /**
     * User relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Returns true if current confirmation token is expired
     *
     * @return mixed
     */
    public function isExpired()
    {
        return $this->expires_at->isPast();
    }

    /**
     * Returns true if given token matches the one saved in model
     *
     * @param $token
     * @return mixed
     */
    public function tokenValid($token)
    {
        return Hash::check($token, $this->token);
    }

    /**
     * Limits results to a given email
     *
     * @param Builder $query
     * @param $email
     * @return Builder
     */
    public function scopeWithEmail(Builder $query, $email)
    {
        return $query->where('email', '=', $email);
    }

    /**
     * Limits results to expired confirmations
     *
     * @param Builder $query
     * @param $email
     * @return Builder
     */
    public function scopeOnlyExpired(Builder $query)
    {
        return $query->where('expires_at', '<', Carbon::now());
    }
}
