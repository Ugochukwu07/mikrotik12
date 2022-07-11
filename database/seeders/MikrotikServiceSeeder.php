<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MikrotikServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mikrotik_services')->insert([
            ['name' => 'any'],
            ['name' => 'async'],
            ['name' => 'isdn'],
            ['name' => 'l2tp'],
            ['name' => 'pppoe'],
            ['name' => 'pptp'],
            ['name' => 'ovpn'],
            ['name' => 'sstp'],
        ]);
    }
}
