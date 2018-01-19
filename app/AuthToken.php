<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class AuthToken extends Model
{
    const TTL = 3600 * 24 * 30;
    protected $dates = ['expires_at', 'used_at'];

    public function __construct()
    {
        parent::__construct();

        self::creating(function (AuthToken $authToken) {
            $authToken->key = self::generateKey();
            $authToken->expires_at = Carbon::now()->addHours(12);
            $authToken->ip = app('request')->ip();
        });
    }

    public static function generateKey()
    {
        return str_random(128);
    }

    public function refreshKey()
    {
        $this->key = self::generateKey();
        $this->save();
    }

    public function invalidate()
    {
        $this->key = self::generateKey();
        $this->expires_at = Carbon::now()->subMinute();
        $this->save();
    }

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function canAuthenticate()
    {
        return $this->used_at instanceof Carbon && $this->used_at->copy()->addSeconds(self::TTL)->isFuture();
    }

    public function isUsable()
    {
        return $this->expires_at->isFuture() && empty($this->used_at);
    }

    public function use()
    {
        $this->used_at = Carbon::now();
        $this->key = self::generateKey();
        $this->save();
    }

    public function scopeByKey(Builder $query, $key)
    {
        return $query->where('key', '=', $key);
    }

    public function scopeByIp(Builder $query, $ip)
    {
        return $query->where('ip', '=', $ip);
    }

    public function scopeLastHour(Builder $query)
    {
        return $query->where('created_at', '>', Carbon::now()->subHour());
    }
}
