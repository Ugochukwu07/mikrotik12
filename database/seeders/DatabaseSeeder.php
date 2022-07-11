<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Package;
use App\Models\Reseller;
use App\Models\Settings;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Settings::factory()->create();
        $this->call(MikrotikServiceSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(RoleSeeder::class);
    }
}
