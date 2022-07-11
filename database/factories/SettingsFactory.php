<?php

namespace Database\Factories;

use App\Models\Settings;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Settings::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "using_reseller" => 0,
            "using_mikrotik" => 0,
            "mikrotik_ip" => '192.168.3.174',
            "mikrotik_login_username" => 'admin',
            "mikrotik_login_password" => null,
            "package_expires_in" => 30,
            "last_pay_day" => 7,
            "invoice_before_expire" => 3,
        ];
    }
}
