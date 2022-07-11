<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Package
 *
 * @mixin Eloquent
 */

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "bandwidth",
        "user_price",
        "reseller_price",
        "type",
        "status",
    ];

    public function subscriptions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Subscription::class);
    }
}
