<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    protected $dates = [
        'accepted_at',
        'amounts_updated_at',
    ];

    /**
     * Saves user's choice to accept the refund
     *
     * @return bool
     */
    public function accept(){
        $this->accepted_at = Carbon::now();
        $this->accepted_ip = request()->ip();
        return $this->save();
    }

    /**
     * Saves user's choice to reject the refund
     *
     * @return bool
     */
    public function reject(){
        $this->accepted_at = null;
        return $this->save();
    }

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
     * Limits results to only unprocessed refunds
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeOnlyUnprocessed(Builder $query)
    {
        return $query->whereNull('amounts_updated_at');
    }

    /**
     * Eliminates refunds with no ETH value
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeOnlyWithValue(Builder $query)
    {
        return $query->where('ether', '>', 0);
    }

}
