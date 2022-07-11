<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("settings", function (Blueprint $table) {
            $table->id();
            $table->boolean("using_reseller")->default(0); // false
            $table->boolean("using_staff")->default(0); // false
            $table->boolean("using_mikrotik")->default(0); // false
            $table->boolean("using_customer_manager")->default(0); // false
            $table->boolean("using_service_zone")->default(0); // false
            $table->boolean("using_stripe")->default(0); // false
            $table->ipAddress("mikrotik_ip")->nullable();
            $table->string("mikrotik_login_username")->nullable();
            $table->string("mikrotik_login_password")->nullable();
            $table->unsignedInteger("package_expires_in")->default(30); // days
            $table->unsignedInteger("last_pay_day")->default(7); // days
            $table->unsignedInteger("invoice_before_expire")->default(3); // days
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("settings");
    }
}
