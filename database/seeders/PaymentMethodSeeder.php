<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            ['name' => 'Visa'],
            ['name' => 'Mastercard'],
            ['name' => 'PayPal'],
            ['name' => 'Stripe'],
            ['name' => 'Cash'],
            ['name' => 'Discovery'],
            ['name' => 'Other'],
            ['name' => 'Direct deposit'],
            ['name' => 'Google pay'],
            ['name' => 'Credit card'],
            ['name' => 'Debit card'],
            ['name' => 'Mobile payment'],
            ['name' => 'Bank transfer'],
            ['name' => 'Payoneer'],
            ['name' => 'Amazon pay'],
            ['name' => 'WePay'],
            ['name' => 'Apple card'],
            ['name' => 'American Express'],
            ['name' => 'Square'],
            ['name' => 'Visa checkout'],
            ['name' => 'bKash'],
        ]);
    }
}
