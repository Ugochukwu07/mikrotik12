<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Subscription
 *
 * @mixin Eloquent
 */
class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_name',
        'user_price',
        'reseller_price',
        'subscription_expires',
        'payment_last_day',
        'billing_day',
        'user_status',
        'payment_status',
        'user_id',
        'package_id',
        'invoice',
        'created_by',
        'name',
        'stripe_id',
        'stripe_status',
        'stripe_plan',
        'quantity',
        'trial_ends_at',
        'ends_at',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function createdBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function package(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Package::class);
    }
}
