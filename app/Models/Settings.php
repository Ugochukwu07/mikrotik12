<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Settings
 *
 * @mixin Eloquent
 */

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        "using_reseller",
        "using_staff",
        "using_mikrotik",
        "using_customer_manager",
        "using_service_zone",
        "mikrotik_ip",
        "mikrotik_login_username",
        "mikrotik_login_password",
        "package_expires_in",
        "last_pay_day",
        "invoice_before_expire",
        "using_stripe",
    ];

    protected $casts = [
        "using_reseller" => "boolean",
        "using_staff" => "boolean",
        "using_mikrotik" => "boolean",
        "using_customer_manager" => "boolean",
        "using_service_zone" => "boolean",
        "using_stripe" => "boolean",
        "using_role" => "boolean",
    ];
}
