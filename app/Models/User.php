<?php

namespace App\Models;

use App\Traits\CheckUserRole;
use App\Traits\CheckUserStatus;
use Eloquent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Spatie\Permission\Traits\HasRoles;

/**
 * User
 *
 * @mixin Eloquent
 */
class User extends Authenticatable
{
    use Billable, HasFactory, Notifiable, HasRoles, CheckUserStatus, CheckUserRole;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name",
        "email",
        "password",
        "reseller_id",
        "status",
        "company",
        "phone",
        "address",
        "city",
        "postcode",
        "emergency",
        "birth",
        "customer_id",
        "manager_id",
        "national_id",
        "service_zone_id",
        "mikrotik_user",
        "mikrotik_connection_type",
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ["password", "remember_token"];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        "email_verified_at" => "datetime",
    ];

    public function due_amount($id)
    {
        $user = self::where('id', $id)->firstOrFail();

        $payments = Transaction::where('user_id', $user->id)->where('type', 1)->get();
        $total_payment = $payments->sum('amount');

        $subscriptions = Transaction::where('user_id', $user->id)->where('type', 0)->get();
        $total_subscrirption = $subscriptions->sum('amount');

        return $total_payment - $total_subscrirption;
    }

    public function reseller(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(__CLASS__, "reseller_id");
    }

    public function manager(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(__CLASS__, "manager_id");
    }

    public function serviceZone(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ServiceZone::class, 'service_zone_id');
    }

    public function subscription(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Subscription::class)->latestOfMany();
    }

    public function subscriptions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    public function payments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function payment(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Payment::class)->latestOfMany();
    }
}
